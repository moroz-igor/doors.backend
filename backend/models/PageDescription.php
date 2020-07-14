<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "page_description".
 *
 * @property int $id
 * @property string|null $description
 * @property int $category_id
 * @property int|null $status
 */
class PageDescription extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page_description';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'boolean'],
            [['description'], 'string'],
            [['category_id'], 'required'],
            [['category_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'status' => 'Status',
        ];
    }
}
