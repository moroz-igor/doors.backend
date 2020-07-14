<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "about_shop".
 *
 * @property int $ID
 * @property string|null $title
 * @property int|null $section
 * @property string|null $subtitle
 * @property string|null $paragraph_1
 * @property string|null $paragraph_2
 * @property string|null $paragraph_3
 */
class AboutShop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about_shop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section'], 'integer'],
            [['paragraph_1', 'paragraph_2', 'paragraph_3'], 'string'],
            [['title', 'subtitle'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'title' => 'Title',
            'section' => 'Section',
            'subtitle' => 'Subtitle',
            'paragraph_1' => 'Paragraph 1',
            'paragraph_2' => 'Paragraph 2',
            'paragraph_3' => 'Paragraph 3',
        ];
    }
}
