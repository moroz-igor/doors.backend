<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use frontend\models\ProductSearch;

/**
 * This is the model class for table "search".
 *
 * @property int|null $id
 * @property string|null $title
 */
class Search extends Model
{
    public $keyword;
    public $offset = SEARCH_AMOUNT/2;

    public function rules()
    {
        return [
            ['keyword', 'trim'],
            ['keyword', 'required'],
            ['keyword', 'string', 'min' => 3 ],
        ];
    }
    public function search($key)
    {
        $delta = null;
        $session = Yii::$app->session;
            $word = Yii::$app->session->get('word');
            if($word)
            {
                $session->remove('word');
                $session->set('word', $key);
                if($word == $key)
                {
                    $count = Yii::$app->session->get('count');
                    if($count)
                    {
                        $count = $count + $this->offset;
                        $session->remove('count');
                        $session->set('count', $count);
                        $delta =  $count;
                    }
                    if(!$count){
                        $count = $session->set('count', $this->offset * 2);
                        $delta = $this->offset * 2;
                    }
                }
                else{$session->remove('count');}
            }
            else {
                $session->set('word', $key);
            }
        if ($this->validate()) {
            $modelSearch = new ProductSearch();
            $productList = $modelSearch->simpleSearch($this->keyword, $delta);
            if(!count($productList))
            {
                $session->remove('count');
                $session->remove('world');
                $productList = $modelSearch->simpleSearch($this->keyword, null);
            }
            return $productList;
        }
    }

}
