<?php

namespace common\components;

use Yii;
use yii\base\Component;

/**
 * @author I.Moroz
 */
 class Preventions extends Component
 {
    public static function preventionDoubleSend()
    {
        if ($_POST['_csrf-frontend'] == $_SESSION['_csrf'] )
        {
            return true;
        }
         else {
             $_SESSION['_csrf'] = $_POST['_csrf-frontend'];
        }
        return false;
    }
 }
