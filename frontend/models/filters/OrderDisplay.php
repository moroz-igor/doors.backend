<?php

namespace frontend\models\filters;

use Yii;

class OrderDisplay
{
    public static function ordered($id)
    {
        $orderStatus = false;
        $session =  Yii::$app->session;
        if(!empty($session['cart']))
        {
            foreach ($session['cart'] as $key => $value) {
                $id_in_session = intval(substr($key, 0, strrpos($key, "w")));
                ($id_in_session == $id) ? $orderStatus = true : $orderStatus;
            }
        }
        return $orderStatus;
    }
}
