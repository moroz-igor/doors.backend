<?php
namespace frontend\models;
use Yii;
use yii\db\ActiveRecord;
/**
 *
 */
class Isotope extends ActiveRecord
{
    public static function getProducts()
    {
        $popularList = Isotope::find()->where(['status' => 1])->all();
        return $popularList ;
    }

    public static function getFiltersClasses()
    {
        $sql = "SELECT  class, category FROM isotope_filters";
        $filtersList = Yii::$app->db->createCommand($sql)->queryAll();
        return $filtersList ;
    }
}
