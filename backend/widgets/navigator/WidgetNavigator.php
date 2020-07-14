<?php
    namespace backend\widgets\navigator;

    use yii\base\Widget;
    /**
    *
    *
    * @author I.Moroz
    */

    class WidgetNavigator extends Widget
    {

        public function run()
        {
            return $this->render('navigator');
        }
    }
