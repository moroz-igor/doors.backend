<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "add_doors".
 *
 * @property int $id
 * @property int $id_product
 * @property string|null $default
 * @property int $category
 * @property string|null $title
 * @property int|null $width
 * @property int|null $height
 * @property int|null $price
 * @property int|null $complect
 * @property int|null $doorstep
 * @property int|null $status
 */
class AddDoors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'add_doors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['complect', 'doorstep', 'status'], 'boolean'],
            [['id_product', 'category'], 'required'],
            [['id_product', 'category', 'width', 'height', 'price'], 'integer'],
            [['default', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Id Product',
            'default' => 'Default',
            'category' => 'Category',
            'title' => 'Title',
            'width' => 'Width',
            'height' => 'Height',
            'price' => 'Price',
            'complect' => 'Complect',
            'doorstep' => 'Doorstep',
            'status' => 'Status',
        ];
    }
}
