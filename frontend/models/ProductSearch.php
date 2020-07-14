<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 *
 */
class ProductSearch
{

    public function simpleSearch($keyword, $delta)
    {
    $keyword = preg_quote($keyword);
    $params = [
        ':keyword' => '%'.$keyword.'%',
    ];
    $limit = SEARCH_AMOUNT;
    if(!$delta) $sql = "SELECT * FROM products WHERE title LIKE :keyword LIMIT ".$limit;
    else $sql = "SELECT * FROM products
                WHERE title LIKE :keyword ORDER BY id LIMIT $limit OFFSET ".$delta;

        return Yii::$app->db->createCommand($sql)->bindValues($params)->queryAll();
    }
    public static function getTheError($errors)
    {
        $error;
        foreach ($errors as $name => $value) {
                foreach ($value as $key => $valueError) {
                    $error = $valueError;
                }
        }
        return $error;
    }




}
