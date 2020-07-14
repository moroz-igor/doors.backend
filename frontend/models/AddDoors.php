<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "add_doors".
 *
 * @property int $id
 * @property int $id_product
 * @property string|null $title
 * @property string|null $width
 * @property string|null $height
 * @property int|null $price
 * @property int|null $complect
 * @property int|null $doorstep
 * @property int|null $status
 */
class AddDoors extends \yii\db\ActiveRecord
{
    public static function getAddProducts($id_product)
    {
        $id_product = intval($id_product);
        $addProducts =  self::find()->where(['id_product' => $id_product])
                                ->andWhere(['status' => 1])
                                ->all();
        return $addProducts;
    }
    public static function getDefaultAddProducts($brand){

        $id_product = self::find()->select('id_product')
                                ->where(['default' => $brand])
                                ->one();
        return  self::find()->where(['id_product' => $id_product])
                            ->andWhere(['status' => 1])
                            ->all();
    }
    public static function getDefaultId($id, $default)
    {
        $searchId = self::find()->select('id_product')->where(['id_product' => $id])
                            ->one();
        if(!$searchId->id_product)
        $searchId = self::find()->select('id_product')->where(['default' => $default])
                            ->one();
        return $searchId->id_product ;
    }
    /*
    *   getting additional products of the door for adding into the cart
    */
    public static function getAddDoorway($id)
    {
        $width = intval($_GET['width']);
        $doorstep = intval($_GET['doorstep']);
        $complect = intval($_GET['complect']);
        if(!$doorstep && !$complect)
        {
            $product = self::find()->where(['id_product' => $id])
                                    ->andWhere(['width' => $width ])
                                    ->andWhere(['status' => 1 ])
                                    ->one();
        }
        if($doorstep && $complect || $doorstep && !$complect)
        {
            $complect = 1;
            $product = self::find()->where(['id_product' => $id])
                                    ->andWhere(['width' => $width ])
                                    ->andWhere(['complect' => $complect])
                                    ->andWhere(['doorstep' => $doorstep])
                                    ->one();
        }
        if($complect && !$doorstep)
        {
            $product = self::find()->where(['id_product' => $id])
                                    ->andWhere(['width' => $width ])
                                    ->andWhere(['complect' => $complect])
                                    ->one();
        }
        return $product;
    }
    public static function getAddJamb($id)
    {
        $id = intval($id);
        return self::find()->where(['id_product' => $id])
                            ->andWhere(['category' => 2])->one();
    }
    public static function getAddBoard($id)
    {
        $id = intval($id);
        $width = intval($_GET['width']);
        return self::find()->where(['id_product' => $id])
                            ->andWhere(['width' => $width])
                            ->andWhere(['category' => 3])
                            ->one();
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'add_doors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product'], 'required'],
            [['id_product', 'price', 'complect', 'doorstep', 'status'], 'integer'],
            [['title', 'width', 'height'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Id Product',
            'title' => 'Title',
            'width' => 'Width',
            'height' => 'Height',
            'price' => 'Price',
            'complect' => 'Complect',
            'doorstep' => 'Doorstep',
            'status' => 'Status',
        ];
    }
}
