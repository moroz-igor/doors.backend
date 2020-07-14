<?php

namespace frontend\controllers\behaviors;
use Yii;
use yii\base\Behavior;
use yii\web\Controller;
/**
 * @author admin
 */
class LayoutBehavior extends Behavior
{
    public $layout;

    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'layoutPage'
        ];
    }
    public function layoutPage()
    {
        if (Yii::$app->user->isGuest) {
            return Yii::$app->controller->redirect(['/']);
        }

    }
}
