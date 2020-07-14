<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cube".
 *
 * @property int $id
 * @property string $img_path
 * @property int $product_id
 */
class Cube extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cube';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img_path', 'product_id'], 'required'],
            [['product_id'], 'integer'],
            [['img_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img_path' => 'Img Path',
            'product_id' => 'Product ID',
        ];
    }
    public function saveImage($fileName)
    {
        $this->img_path = $fileName;

        return $this->save(false);
    }
    public static function cubeProductId($id)
    {
        return  self::find()->select('product_id')
                            ->where(['id' => $id])
                            ->one();
    }

}
