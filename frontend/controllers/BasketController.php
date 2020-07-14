<?php
namespace frontend\controllers;
use common\components\EmailService;
use common\components\Preventions;

use Yii;
use yii\web\Controller;
use frontend\models\Basket;
use frontend\models\Products;
use frontend\models\AddDoors;
use frontend\models\User;
use frontend\models\Order;
use frontend\models\OrderItems;
use yii\db\ActiveRecord;

class BasketController extends Controller
{
    public function actionBasket()
    {
        $this->layout = 'pages';
            $session =  Yii::$app->session;
        return $this->render('basket', compact('session'));
    }
    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
            $product =  Products::findOne($id);
            if(empty($product)) return false;
            $session =  Yii::$app->session;
            $session->open();
                $cart = new Basket();
                $cart->addToCart($product);
        return $this->render('basket', compact('session'));
    }
    private function addSessionAdditional($search_method)
    {
        $id = Yii::$app->request->get('id');
            $sql = "SELECT brand, title FROM products WHERE id=".$id;
            $product = Yii::$app->db->createCommand($sql)->queryOne();
                $brand = $product['brand'];
                $title = $product['title'];
            $addProductId = AddDoors::getDefaultId($id, $brand);
            $addProduct = AddDoors::$search_method($addProductId);
            if(empty($addProduct)) return false;
                $session =  Yii::$app->session;
                $session->open();
                    $addcart = new Basket();
                    $addcart->addProductAdd($addProduct, $id, $title);
            return true;
    }
    /* adding the additional elements of the doorway */
    public function actionAddextra()
    {
        $result = self::addSessionAdditional('getAddDoorway');
        if(!$result) return false;
        return $this->render('basket', compact('session'));
    }
    /* adding the jambs of the door */
    public function actionJambadd()
    {


        $result = self::addSessionAdditional('getAddJamb');
        if(!$result) return false;
        return $this->render('basket', compact('session'));
    }
    /* adding the additional boards of the doorway */
    public function actionAddboard()
    {
        $result = self::addSessionAdditional('getAddBoard');
        if(!$result) return false;
        return $this->render('basket', compact('session'));
    }
    /* Clearing of the cart in general */
    public function actionClearcart()
    {
        Basket::clearCart();
        return $this->redirect(['basket']);
    }
    /* Deleting one element of the cart */
    public function actionDelete()
    {
        $session =  Yii::$app->session;
        $id = $_GET['id'];
        $productArray = $_GET['arr'];
        if(!isset($session[$productArray][$id])) return false;
            $delete = new Basket();
            $delete->deleteCartElement();
    }
    /* the variation in the qty of separate the cart element */
    public function actionVariation()
    {
        $session =  Yii::$app->session;
        $id = $_GET['id'];
        $trend =$_GET['trend'];
        if(isset($session['cart'][$id]) || isset($session['addcart'][$id]) )
        {
            $variation = new Basket();
            $variation->variationNumber();
        }
        else return false;
    }
    public function actionFormvariation()
    {
        $session =  Yii::$app->session;
        $id = $_GET['id'];
        $ARR = $_GET['arr'];
            $price = $session[$ARR][$id]['price'];
        if(isset($session['cart'][$id]) || isset($session['addcart'][$id]) )
        {
            $variation = new Basket();
            $variation->variationFormNumber($price);
        }
        else return false;
    }
    public function actionOrder()
    {
        $this->layout = 'pages';
        $session = Yii::$app->session;
        $session->open();
        $order = new Order();
        ($session['cart'] && !$session['addcart']) ? $cartList = $session['cart'] : $cartList['addcart'];
        (isset($session['addcart']) && isset($session['cart'])) ?
            $cartList = array_merge($session['cart'], $session['addcart']) : $cartList;
            $this->isGuest($order);
        if( $order->load(Yii::$app->request->post())  )
        {
            if(Preventions::preventionDoubleSend())
             {
                Yii::$app->session->setFlash('preventions', 'Запит вже був відправлений!');
             }
            else{

                $order->qty =  $session['cart.qty'];
                $order->sum =  $session['cart.sum'];
                $order->created_at = date("Y-m-d H:i:s");
                $order->updated_at = date("Y-m-d H:i:s");
                if($order->save())
                {
                    $this->saveOrderItems($cartList, $order->id);
                    EmailService::noticeAdminOrder($order);
                    EmailService::noticeCustomer($order);
                    Basket::clearCart();
                    Yii::$app->session->setFlash('success', 'ВАШЕ ЗАМОВЛЕННЯ ОФОРМЛЕНО!
                    <br><span class="_it _20 _lora">Ми зателуфонуємо Вам найближчими годинами!<span>');
                    return $this->refresh();
                }
                else{
                    Yii::$app->session->setFlash('error', 'Помилка оформлення замовлення!');
                }
            }
        }
        return $this->render('order', compact('session', 'order'));
    }
    protected function isGuest($order){
        if(!Yii::$app->user->isGuest)
        {
            $user_id = $_SESSION['__id'];
            $data = User::findOne($user_id);
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->sellphone;
            $order->address = $data->address;
        }
    }
    protected function saveOrderItems($items, $order_id)
    {
        foreach ($items as $id => $item)
        {
            $order_items =  new OrderItems();
            $order_items->order_id = $order_id;
            $order_items->product_id = $item['id'];
            $order_items->title = $item['title'];
            $order_items->session_id = $id;
            $order_items->price = $item['price'];
            $order_items->qty_item = $item['qty'];
            $order_items->sum_item = $item['qty'] * $item['price'];
            $order_items->save();

        }
    }
}
