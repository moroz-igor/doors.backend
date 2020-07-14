<?php
namespace frontend\models;
use Yii;
/**
 *
 */
class Nav
{
    public static function getSections()
    {
        $sql = "SELECT * FROM sections WHERE display=1";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
    public static function getCategories()
    {
        $sql = "SELECT * FROM category WHERE display=1";
            $category = Yii::$app->db->createCommand($sql)->queryAll();
        return $category;
    }

}
