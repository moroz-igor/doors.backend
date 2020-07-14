<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "actions".
 *
 * @property string|null $title_1
 * @property string|null $title_2
 * @property string|null $ticker
 * @property int|null $status
 * @property int $ID
 */
class Actions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'actions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title_1', 'title_2', 'ticker'], 'string'],
            [['status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title_1' => 'Title 1',
            'title_2' => 'Title 2',
            'ticker' => 'Ticker',
            'status' => 'Status',
            'ID' => 'ID',
        ];
    }
}
