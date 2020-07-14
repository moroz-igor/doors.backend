<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "partners".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $brand_img
 * @property int|null $status
 */
class Partners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['status'], 'boolean'],
            [['status'], 'trim'],
            [['title', 'brand_img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'brand_img' => 'Brand Img',
            'status' => 'Status',
        ];
    }
    public function saveImage($fileName)
    {
        $this->brand_img = $fileName;

        return $this->save(false);
    }

}
