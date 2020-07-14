<?php
    namespace frontend\widgets\headers;

    use yii\base\Widget;
    use frontend\models\Header;
    /**
    *
    *
    * @author I.Moroz
    */

    class Headers extends Widget
    {

        public $categoryId = null;

        public function run()
        {
            $title = Header::getCategory($this->categoryId);

            return $this->render('headers', [
               'title' => $title,
            ]);
        }
    }
