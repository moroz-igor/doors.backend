<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $section
 * @property int $page_number
 * @property string $title
 * @property int|null $display
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section', 'page_number', 'title'], 'required'],
            [['section', 'page_number', 'display'], 'integer'],
            [['title'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section' => 'Section',
            'page_number' => 'Page Number',
            'title' => 'Title',
            'display' => 'Display',
        ];
    }
}
