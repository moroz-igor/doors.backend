<?php
    namespace frontend\widgets\discount;

    use yii\base\Widget;
    use frontend\models\Actions;
    /**
    *
    *
    * @author I.Moroz
    */

    class Discount extends Widget
    {
        public function run()
        {
            $titles = Actions::getActionsTitles();
            return $this->render('discount', [
                'titles' => $titles,
            ]);
        }
    }
