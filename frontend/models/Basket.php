<?php

namespace frontend\models;
use yii\db\ActiveRecord;

use Yii;

/**
 *
 */
class Basket extends ActiveRecord
{
    private function addDoorArray($product, $qty = 1, $width)
    {
        $_SESSION['cart'][$product->id.'w'.$width] = [
            'qty' => $qty,
            'id' => $product->id,
            'category_id' => $product->category_id,
            'title' => $product->title,
            'brand' => $product->brand,
            'img_way_1' => $product->img_way_1,
            'price'  => $product->price,
            'width'  => $width,
            'sum'  => $product->price,
        ];
    }
    private function overallSumQty($product, $qty = 1)
    {
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ?
        $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ?
        $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;
    }
    public function addToCart($product, $qty = 1)
    {
        $width = intval($_GET['width']);

        if(isset($_SESSION['cart'][$product->id.'w'.$width]) && $width)
        {
            $_SESSION['cart'][$product->id.'w'.$width]['qty'] += $qty;

            $_SESSION['cart'][$product->id.'w'.$width]['sum'] =
            $_SESSION['cart'][$product->id.'w'.$width]['price'] *
            $_SESSION['cart'][$product->id.'w'.$width]['qty'];
                self::overallSumQty($product, $qty = 1);
        }
        else if(isset($_SESSION['cart'][$product->id.'w'.$width]) && !$width)
        {
            $_SESSION['cart'][$product->id.'w'.$width]['qty'] += $qty;

            $_SESSION['cart'][$product->id.'w'.$width]['sum'] =
            $_SESSION['cart'][$product->id.'w'.$width]['price'] *
            $_SESSION['cart'][$product->id.'w'.$width]['qty'];
                self::overallSumQty($product, $qty = 1);
        }
        else
        {
            self::addDoorArray($product, $qty = 1, $width);
            self::overallSumQty($product, $qty = 1);
            $_SESSION['cart.width'] = $width;
        }
    }
    /*
    * adding additional products of the door to cart
    */
    public function addProductAdd($addProduct, $id, $title, $qty = 1)
    {
        $id = intval($id);
        $default_id = intval($addProduct->id_product);
        if(isset($_SESSION['addcart'][$id.'a'.$addProduct->id]) )
        {
            $_SESSION['addcart'][$id.'a'.$addProduct->id]['qty'] += $qty;

            $_SESSION['addcart'][$id.'a'.$addProduct->id]['sum'] =
            $_SESSION['addcart'][$id.'a'.$addProduct->id]['price'] *
            $_SESSION['addcart'][$id.'a'.$addProduct->id]['qty'];

            self::overallSumQty($addProduct, $qty = 1);
        }
        else{
            $_SESSION['addcart'][$id.'a'.$addProduct->id] = [
                'qty' => $qty,
                'id' => $addProduct->id,
                'base_id' => $id,
                'base_title' => $title,
                'title' => $addProduct->title,
                'price' => $addProduct->price,
                'sum' => $addProduct->price,
            ];
            self::overallSumQty($addProduct, $qty = 1);
        }
    }
    public function deleteCartElement()
    {
        $id = $_GET['id'];
        $productArray = $_GET['arr'];
            $qty = intval($_GET['qty']);
            $sum = intval($_GET['sum']);
                unset($_SESSION[$productArray][$id]);
                $_SESSION['cart.qty'] -= $qty;
                $_SESSION['cart.sum'] -= $sum;
    }
    public function variationNumber()
    {
        $ARR = $_GET['arr'];
        $id = $_GET['id'];
        $trend = $_GET['trend'];
        if($trend == 'aplus')
        {
            $_SESSION[$ARR][$id]['qty']++;
            $_SESSION[$ARR][$id]['sum'] += $_SESSION[$ARR][$id]['price'];

            $_SESSION['cart.qty']++;
            $_SESSION['cart.sum'] += $_SESSION[$ARR][$id]['price'];
        }
        if($trend == 'minus')
        {
            if($_SESSION[$ARR][$id]['qty']>1)
            {
                $_SESSION[$ARR][$id]['qty']--;
                $_SESSION[$ARR][$id]['sum'] -= $_SESSION[$ARR][$id]['price'];

                $_SESSION['cart.qty']--;
                $_SESSION['cart.sum'] -= $_SESSION[$ARR][$id]['price'];
            }
        }
    }
    public function variationFormNumber($price)
    {
        $ARR = $_GET['arr'];
        $id = $_GET['id'];
        $qty = $_GET['qty'];
        $sum = $_GET['sum'];
        $price = intval($price);
        $sum_prev = $_SESSION[$ARR][$id]['sum'];
        $qty_prev = $_SESSION[$ARR][$id]['qty'];

        $_SESSION[$ARR][$id]['qty'] = $qty;
        $_SESSION[$ARR][$id]['sum'] = $price * $qty;
        $_SESSION['cart.qty'] = $_SESSION['cart.qty']  + $qty - $qty_prev;
        $_SESSION['cart.sum'] = $_SESSION['cart.sum'] + $_SESSION[$ARR][$id]['sum'] - $sum_prev;
    }
    public static function clearCart()
    {
        $session =  Yii::$app->session;
        unset($session['cart']);
        unset($session['addcart']);
        unset($session['cart.qty']);
        unset($session['cart.sum']);
    }
}
