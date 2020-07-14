<?php
    namespace frontend\widgets\Filter;

    use yii\base\Widget;
    use frontend\models\filters\Filters;
    /**
    *
    *
    * @author I.Moroz
    */

    class Filter extends Widget
    {

        public $categoryId = null;

        public function run()
        {
            $filterList = Filters::getFilters($this->categoryId);
            return $this->render('filter', [
               'filterList' => $filterList,
           ]);
        }
    }
