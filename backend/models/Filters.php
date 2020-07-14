<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "filters".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $filter
 * @property string|null $input_name
 * @property string|null $brand
 * @property string|null $color
 * @property int|null $status
 */
class Filters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'filters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'status'], 'integer'],
            [['filter', 'input_name', 'brand', 'color'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'filter' => 'Filter',
            'input_name' => 'Input Name',
            'brand' => 'Brand',
            'color' => 'Color',
            'status' => 'Status',
        ];
    }
}
