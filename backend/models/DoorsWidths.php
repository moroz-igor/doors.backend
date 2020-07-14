<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "doors_widths".
 *
 * @property int $id
 * @property int $width
 * @property string|null $brand
 * @property int|null $status
 */
class DoorsWidths extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doors_widths';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'boolean'],
            [['width'], 'required'],
            [['width'], 'integer', 'max' => 4],
            [['brand'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'width' => 'Width',
            'brand' => 'Brand',
            'status' => 'Status',
        ];
    }
}
