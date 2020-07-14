<?php

namespace frontend\models;
use yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string $session_id
 * @property string $title
 * @property int $price
 * @property int $qty_item
 * @property int $sum_item
 */
class OrderItems extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_items';
    }
    public function getOrder()
    {
        return $this->hasOne(OrderItems::className(), ['id' => 'order_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'session_id', 'title', 'price', 'qty_item', 'sum_item'], 'required'],
            [['order_id',  'price', 'qty_item', 'sum_item', 'product_id'], 'integer'],
            [['session_id'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 255],
        ];
    }
    public static function getOrderItemsById($order_id)
    {
        return  self::find()->where(['order_id' => $order_id])
                            ->all();

    }

}
