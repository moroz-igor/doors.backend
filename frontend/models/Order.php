<?php
namespace frontend\models;
use yii\db\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\base\Model;
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
 * @property int $status
 */
class Order extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['email'], 'email'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Як Вас звати?',
            'email' => 'Ваш E-mail',
            'phone' => 'Ваш телефон',
            'address' => 'Ваша адреса',
        ];
    }
    public static function getOrdersByIdNew($email)
    {
        return  self::find()->where(['email' => $email])
                            ->andWhere(['status' => 1])
                            ->all();
    }
    public static function getOrdersByIdProcess($email)
    {
        return  self::find()->where(['email' => $email])
                            ->andWhere(['process' => 1])
                            ->all();
    }
    public static function getOrdersByIdClosed($email)
    {
        return  self::find()->where(['email' => $email])
                            ->andWhere(['closed' => 1])
                            ->all();
    }
    public static function getOrderById($order_id)
    {
        return  self::find()->where(['id' => $order_id])
                            ->all();

    }
}
