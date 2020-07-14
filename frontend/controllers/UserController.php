<?php
namespace frontend\controllers;
use common\components\Preventions;
use Yii;
use frontend\models\forms\RegisterForm;
use frontend\models\forms\LoginForm;
use frontend\models\forms\EditForm;
use frontend\models\forms\SendEmailForm;
use frontend\models\forms\ResetPasswordForm;
use frontend\models\User;
use frontend\models\Order;
use frontend\models\OrderItems;

use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;

class UserController extends \yii\web\Controller
{
    public function actionRegister()
    {
        $user = new User;

        $this->layout = 'pages';
        $model = new RegisterForm();
        if($model->load(Yii::$app->request->post()) && $user = $model->save())
        {
            Yii::$app->user->login($user);
            Yii::$app->session->setFlash('register', 'ВИ УСПІШНО ЗАРЕЄСТРОВАНІ!');
            return $this->redirect(['/user/edit']);
        }
        return $this->render('register', [
            'model' => $model,
        ]);
    }
    public function actionLogin()
    {
        $this->layout = 'pages';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/']);
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['/']);
    }

    public function actionEdit()
    {
        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }
        $this->layout = 'pages';

        $model = new EditForm();
            $id = Yii::$app->user->identity->id;
        if($model->load(Yii::$app->request->post()) && $user = $model->update($id))
        {
            Yii::$app->session->setFlash('info', 'Дані оновлено!');
            return $this->goHome();

        }
        $email = Yii::$app->user->identity->email;
        $ordersNew = Order::getOrdersByIdNew($email);
        $ordersProcess = Order::getOrdersByIdProcess($email);
        $ordersClosed = Order::getOrdersByIdClosed($email);
        return $this->render('edit', [
            'model' => $model,
            'ordersNew' => $ordersNew,
            'ordersProcess' => $ordersProcess,
            'ordersClosed' => $ordersClosed,
        ]);
    }
    /*
    * Sending an email to reset the password
    */
    public function actionSendEmail()
    {
        $this->layout = 'pages';
        $model = new SendEmailForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if(Preventions::preventionDoubleSend())
                 {
                    Yii::$app->getSession()->setFlash('preventions', 'Запит вже був відправлений!');
                    Yii::$app->getSession()->setFlash('warning', 'Перевірте Вашу поштову скриньку!');
                }
                else{

                    $email = $model->sendEmail();
                    if($email):
                        Yii::$app->getSession()->setFlash('warning', 'Перевірте Вашу поштову скриньку!');
                        return $this->redirect(['/send-email']);
                    else:
                        Yii::$app->getSession()->setFlash('error', 'Помилка відновлення данних!.');
                    endif;
                }
            }
        }
        return $this->render('send-email', [
            'model' => $model,
        ]);
    }
    public function actionResetPassword($key)
    {
        $this->layout = 'pages';
        $timeLimit = ResetPasswordForm::timeLimit($key);
        if($timeLimit)
        {
            Yii::$app->getSession()->setFlash('time_limit', 'Перевищено час очікування!');
            Yii::$app->getSession()->setFlash('time_hint', 'Відправте запит на відновлення пароля повторно!');
            return $this->redirect(['/send-email']);
        }
        try
        {
            $model = new ResetPasswordForm($key);
        }
        catch (InvalidParamException $e)
        {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ( $model->load(Yii::$app->request->post()) && $model->validate() )
        {
            if(Preventions::preventionDoubleSend())
            {
                Yii::$app->getSession()->setFlash('preventions', 'Запит вже був відправлений!');
                Yii::$app->getSession()->setFlash('warning', 'Перевірте Вашу поштову скриньку!');

            }elseif($model->resetPassword()){
                    Yii::$app->getSession()->setFlash('warning', 'Пароль змінено.');
                    return $this->redirect(['/login']);
            }
        }
        return $this->render('reset-password', [
            'model' => $model,
        ]);
    }
    public function actionUserOrder($order_id)
    {
        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }

        $this->layout = 'pages';
            $order = Order::getOrderByID($order_id);
            $orderItems = OrderItems::getOrderItemsByID($order_id);


        return $this->render('user-order', [
            'order' => $order,
            'orderItems' => $orderItems,
        ]);
    }

}
