<?php
    namespace frontend\widgets\logo;

    use yii\base\Widget;
    use frontend\models\Footer;
    /**
    *
    *
    * @author I.Moroz
    */

    class Logo extends Widget
    {
        public function run()
        {
            $titles = Footer::getLogoTitles();
            return $this->render('logo', [
                'titles' => $titles,
            ]);
        }
    }
