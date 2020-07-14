<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int $qty
 * @property int $sum
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property int|null $status
 * @property int $process
 * @property int|null $closed
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['qty', 'sum', 'name', 'email', 'phone', 'address'], 'required'],
            [['qty', 'sum'], 'integer'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
            [['status', 'process', 'closed'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Створено',
            'updated_at' => 'Оновлено',
            'qty' => 'Кіль-ть',
            'sum' => 'Сумма',
            'name' => 'Ім\'я замовника',
            'email' => 'Пошта замовника',
            'phone' => 'Телефон',
            'address' => 'Адреса',
            'status' => 'Нові',
            'process' => 'В обробці',
            'closed' => 'Завершено',
        ];
    }
    // public static function bolleanCheckout($id, $field, $val)
    // {
    //     echo $field.'<br>';
    //     echo $val.'<br>';
    //     echo $model->email.'<br>';
    //
    // }

}
