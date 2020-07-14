<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sections".
 *
 * @property int $number
 * @property string $title
 * @property int|null $dropdown
 * @property string $view
 * @property int|null $display
 */
class Sections extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'view'], 'required'],
            [['dropdown', 'display'], 'boolean'],
            [['title', 'view'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'number' => 'Number',
            'title' => 'Title',
            'dropdown' => 'Dropdown',
            'view' => 'View',
            'display' => 'Display',
        ];
    }
}
