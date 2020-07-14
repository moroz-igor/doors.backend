<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id
 * @property int $order_id
 * @property string|null $product_id
 * @property string $session_id
 * @property string $title
 * @property int $price
 * @property int $qty_item
 * @property int $sum_item
 */
class OrderItems extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'session_id', 'title', 'price', 'qty_item', 'sum_item'], 'required'],
            [['order_id', 'price', 'qty_item', 'sum_item'], 'integer'],
            [['product_id', 'session_id', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'ID ордера',
            'product_id' => 'ID продукта',
            'session_id' => 'ID продукта',
            'title' => 'Назва',
            'price' => 'Ціна',
            'qty_item' => 'Кіл-ть',
            'sum_item' => 'Сумма',
        ];
    }
}
