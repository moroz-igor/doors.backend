<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $ID
 * @property string|null $title
 * @property string|null $adress
 * @property string|null $adress_des
 * @property string|null $sub_title
 * @property string|null $description
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['title', 'adress', 'adress_des', 'sub_title'], 'string', 'max' => 32],
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
            'adress' => 'Adress',
            'adress_des' => 'Adress Des',
            'sub_title' => 'Sub Title',
            'description' => 'Description',
        ];
    }
}
