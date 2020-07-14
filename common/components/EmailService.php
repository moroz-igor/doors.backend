<?php

namespace common\components;

use Yii;
use yii\base\Component;

/**
 * @author I.Moroz
 */
 class EmailService extends Component
 {
    public static function noticeUserRegiser($data)
    {
        $useremail = $data['email'];
        $username = $data['username'];
        $result = Yii::$app->mailer->compose()
                ->setFrom(['vin.ukr.doors@ukr.net' => 'Реєстрація успішна!'])
                ->setTo($useremail)
                ->setSubject('Ukr.Doors')
                ->setHtmlBody('
                <div style="font-style:italic">
                    <h2>Вітаємо Вас '. $username .' </h2>
                    <h3>Дякуємо Вам за реєстрацію на нашму сайті!</h3>
                    <div style="font-size:16px;
                                color:blue;">
                        <p> Ми не розповсюджуємо ваші особисті дані третім особам. Ваші
                        дані, заповненні при реєстації, зроблять більш зручним замовлення товарів в нашому інтернет-магазині. </p>
                        <p> Доповнити або редагувати Ваші дані Ви можете в <a href="doors/user/edit"> Вашому особистому кабінеті</a>. Перейти в нього можливо після реєстрації, потрібно клікути по Вашому логіну - <span style="font-size:16px; color: gray;">'.$username.'</span>, в шапці сайту.</p>
                        <p style="color:maroon;">З повагою адміністрація UKR.DOORS</p>
                    </div>
                </div> ')
                ->send();
    }
    public static function noticeAdminRegiser($data)
    {
        $useremail = $data['email'];
        $username = $data['username'];
        $result = Yii::$app->mailer->compose()
                ->setFrom(['vin.ukr.doors@ukr.net' => 'Новий користувач!'])
                ->setTo('vin.ukr.doors@ukr.net')
                ->setSubject('Ukr.Doors')
                ->setHtmlBody('
                <div style="font-style:italic">
                    <h2>Нова реєстрація на сайті</h2>
                    <h3>Пошта нового користувача - '.$useremail.'!</h3>
                    <div style="font-size:16px;
                                color:blue;">
                        <p> Логін - <span style="font-size:16px; color: gray;">'.$username.'</span>.</p>
                    </div>
                </div> ')
                ->send();
    }
    public static function noticeAdminOrder($order)
    {
        $useremail = $order->email;
        $username = $order->name;
        $phone = $order->phone;
        $sum = $order->sum;
        $result = Yii::$app->mailer->compose()
                ->setFrom(['vin.ukr.doors@ukr.net' => 'Нове замовлення!'])
                ->setTo('vin.ukr.doors@ukr.net')
                ->setSubject('Ukr.Doors')
                ->setHtmlBody('
                <div style="font-style:italic">
                    <h2>Нове замовлення на сайті</h2>
                    <h3>Пошта замовника - '.$useremail.'!</h3>
                    <h3>Звуть замовника - '.$username.'!</h3>
                    <h3>Телефон замовника - '.$phone.'!</h3>
                    <div style="font-size:16px;
                                color:blue;">
        <p> Сумма замовлення - <span style="font-size:16px; color: gray;">'.$sum.' грн</span>.</p>
                    </div>
                </div> ')
                ->send();
    }
    public static function noticeCustomer($order)
    {
        $useremail = $order->email;
        $username = $order->name;
        $sum = $order->sum;
        $qty = $_SESSION['cart.qty'];
        $result = Yii::$app->mailer->compose()
                ->setFrom(['vin.ukr.doors@ukr.net' => 'Ukr.Doors'])
                ->setTo($useremail)
                ->setSubject('Ваше замовлення № '.$order->id)
                ->setHtmlBody('
        <div style="font-style:italic">
            <h3>Дякуємо за замовлення в магазині Ukr.Doors</h3>
            <div style="font-size:16px;
                        color:green;">
        <p> Кількісь одиниць - <span style="font-size:18px; color: blue;">'.$qty.' </span>шт.</p>
        <p> Сумма замовлення - <span style="font-size:18px; color: blue;">'.$sum.' </span>грн.</p>
        <p> Про деталі оплати та доставки Вам буде повідомлено телефоном, у найближчі години.<br> З повагою адміністрація. </p>
        <p>
            Наш  e-mail - <span style="font-size:16px; color: blue;">vin.ukr.doors@ukr.net</span>.
        </p>
            </div>
        </div> ')
                ->send();


    }

 }
