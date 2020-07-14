<?php
    namespace frontend\widgets\search;
    use yii\base\Widget;
    use Yii;
    /**
    *
    *
    * @author I.Moroz
    */

    class Search extends Widget
    {
        public $value = null;
        public function run()
        {
          echo '<div class="_search">
                     <div class="topnav">
                        <div class="search-container">
                            <form  method="post">
                                <input type="text" name="keyword"
                                    placeholder="Пошук по сайту..."
                                        value="'.$this->value.'">
                                <button type="submit"><i class="fa fa-search"></i></button>
                                    <input id="form-token" type="hidden"
                                        name="'.Yii::$app->request->csrfParam.'"
                                            value="'.Yii::$app->request->csrfToken.'">
                            </form>
                        </div>
                    </div>
                </div>
                <br/><br/>';
        }
    }
