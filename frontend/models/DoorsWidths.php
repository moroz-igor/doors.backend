<?php
namespace frontend\models;
use Yii;
/**
 *
 */
class DoorsWidths extends \yii\db\ActiveRecord
{
    public static function getWidthsByBrand($brand)
    {
        return  self::find()->select('width')
                            ->where(['brand' => $brand])
                            ->andWhere(['status' => 1])
                            ->all();
    }
}
