<?php

namespace frontend\models\filters;

use Yii;
use frontend\models\Product_model;

/**
 * This is the model class for table "filters".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $filter
 * @property string|null $selector_1
 * @property string|null $selector_2
 * @property int|null $status
 */
class Filters extends \yii\db\ActiveRecord
{
    public static function getFilters($id)
    {
        $num =intval($id);
        $filterList = Filters::find()->where(['category_id' => $num])
                                ->all();
        return $filterList;
    }

}
