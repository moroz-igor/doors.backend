<?php
namespace frontend\models;
use Yii;
/**
 *
 */
class Actions
{
    public static function getActionsTitles()
    {
        $sql = "SELECT * FROM actions WHERE status=1";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
}
