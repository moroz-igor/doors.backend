<?php
namespace frontend\models;
use Yii;

/**
 *
 */
class Footer
{
    public static function getLogoTitles()
    {
        $sql = "SELECT * FROM logo";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
    public static function getDataFooter()
    {
        $sql = "SELECT * FROM footer";
        $result = Yii::$app->db->createCommand($sql)->queryAll();
        return $result;
    }
}
