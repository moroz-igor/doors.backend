<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "logo".
 *
 * @property string|null $main
 * @property string $title_1
 * @property string $title_2
 * @property string|null $title_3
 * @property string|null $title_4
 * @property int $ID
 */
class Logo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_1', 'title_2', 'ID'], 'required'],
            [['ID'], 'integer'],
            [['main', 'title_1', 'title_2', 'title_3', 'title_4'], 'string', 'max' => 32],
            [['ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'main' => 'Main',
            'title_1' => 'Title 1',
            'title_2' => 'Title 2',
            'title_3' => 'Title 3',
            'title_4' => 'Title 4',
            'ID' => 'ID',
        ];
    }
}
