<?php
namespace frontend\models;
use Yii;
/**
 *
 */
class Header
{
    public static function getCategory($id)
    {
        $num =intval($id);
        $sql = "SELECT title FROM category WHERE id = $num";
        $result = Yii::$app->db->createCommand($sql)->queryOne();

        return $result;
    }
}
