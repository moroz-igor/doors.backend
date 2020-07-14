<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "footer".
 *
 * @property int $ID
 * @property string|null $snet
 * @property string|null $phones
 * @property string|null $emails
 * @property string|null $desc
 */
class Footer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'footer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['desc'], 'string'],
            [['snet', 'phones', 'emails'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'snet' => 'Snet',
            'phones' => 'Phones',
            'emails' => 'Emails',
            'desc' => 'Desc',
        ];
    }
}
