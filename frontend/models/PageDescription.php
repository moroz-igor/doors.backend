<?php

namespace frontend\models;
use yii\db\ActiveRecord;

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
    public static function getCategoryDescription($category_id)
    {
        $category_id = intval($category_id);
            $description =  self::find()->select('description')
                                    ->where(['category_id' => $category_id])
                                    ->andWhere(['status' => 1])
                                    ->one();
        return $description;

    }
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
            [['description'], 'string'],
            [['category_id'], 'required'],
            [['category_id', 'status'], 'integer'],
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
