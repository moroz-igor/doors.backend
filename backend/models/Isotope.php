<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "isotope".
 *
 * @property int $id
 * @property string $class
 * @property string $name
 * @property string $brand
 * @property string $price
 * @property string|null $discount
 * @property string $img_way
 * @property int|null $status
 * @property int $this_id
 */
class Isotope extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'isotope';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'class', 'name', 'brand', 'price', 'img_way'], 'required'],
            [['id'], 'integer'],
            [['class', 'name', 'brand', 'price', 'discount', 'img_way'], 'string', 'max' => 255],

            [['status'], 'trim'],
            [['status'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class' => 'Class',
            'name' => 'Name',
            'brand' => 'Brand',
            'price' => 'Price',
            'discount' => 'Discount',
            'img_way' => 'Img Way',
            'status' => 'Status',
            'this_id' => 'This ID',
        ];
    }
    public function saveImage($fileName)
    {
        $this->img_way = $fileName;

        return $this->save(false);
    }
    public static function isotopeProductId($this_id)
    {
        return  self::find()->select('id')
                            ->where(['this_id' => $this_id])
                            ->one();
    }


}
