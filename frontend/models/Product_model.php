<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use frontend\models\Products;
use frontend\models\filters\Filters;

/**
 *
 */

class Product_model extends ActiveRecord
{
    public static function orderedMessage($id)
    {
        $id = intval($id);
        $session =  Yii::$app->session;
        $orderedWidth = array();
        $count = 0;
        $status = false;
        if(isset($session['cart']))
        {
            foreach ($session['cart'] as $key => $value) {

                $id_in_session = intval(substr($key, 0, strrpos($key, "w")));
                    $width = substr($key, strrpos($key, "w")+1);

                (intval($width) != 0) ? $width = $width : $width = null;
                        ($id_in_session == $id) ? $status = true : $status;

                if($id_in_session == $id)
                {
                    $orderedWidth[$count] = $width;
                    $count++;
                }
            }
        $ordered = '<p class="_ordered-cart" style="display:block;">Замовлено</p>';
        };
        $message = [
                    'width' => $orderedWidth,
                    'ordered' => $ordered,
                    'status' => $status,
                    ];
        if(!empty($message))  return $message;
        else return false;
    }
    public static function getProduct_modelData($id)
    {
        $id_product =  intval($id);
            $dataList = self::find()->where(['id' => $id_product])
                                            ->all();
        return $dataList;
    }
    /** Definition a section of the shoosed product **/
    public static function getSliderParameter($id)
    {
        $param_id = intval($id);
            $sql = "SELECT type, color, category FROM product_model WHERE id=".$param_id;
                $result = Yii::$app->db->createCommand($sql)->queryOne();
        return $result;
    }
    /** Getting similar products to add into the vertical slider **/
    public static function getSliderImg($id)
    {
        $slider_id = intval($id);
        $parameters =  self::getSliderParameter($slider_id);
            $imgList =  self::find()->select('img_way_1')
                                    ->addSelect('id')
                                    ->where(['type' => $parameters['type']])
                                    ->andWhere(['category' => $parameters['category']])
                                    ->andWhere(['color' => $parameters['color']])
                                    ->limit(10)
                                    ->all();
        return $imgList;
    }

    public static function getSelectionProduct($category_id)
    {
        $availability = array();
        $discount = array();
        $sale = array();
            $brand = array();
            $color = array();
        $formData = Yii::$app->request->post();
            $section = Products::getSection($category_id);

        if(isset($formData['filter']))
        {
            $productList = self::getSelectionProducts($formData, $category_id);
        }
        else
        {
        $nullDiscount =  ['IS NOT', 'discount', null] ;
        $nullSale =  ['IS NOT', 'sale', null] ;
        if(isset($formData['first']))
        {   $availability =  self::find()->where(['availability' => 'В наявності'])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all(); }
        if(isset($formData['second']))
        {   $discount =  self::find()->where($nullDiscount )
                                        ->andWhere(['category_id' => $category_id ])
                                        ->limit(50)
                                        ->all(); }
        if(isset($formData['third']))
        {   $sale =  self::find()->where($nullSale)
                                        ->andWhere(['category_id' => $category_id ])
                                        ->limit(50)
                                        ->all(); }
        if(isset($formData['brand']) )
        {   $brand =  self::find()->where(['brand' => $formData['brand']])
                                        ->andWhere(['category_id' => $category_id ])
                                        ->limit(50)
                                        ->all(); }
        if(isset($formData['color']) )
        {   $color =  self::find()->where(['color' => $formData['color']])
                                        ->andWhere(['category_id' => $category_id ])
                                        ->limit(50)
                                        ->all(); }

        $productList =  array_merge($availability,$discount,$sale,$brand,$color);
        }
        return $productList;
    }
    public static function getSelectionProducts($formData, $category_id)
    {
        (isset($formData['first']))  ? $f1 = 1 : $f1 = 0;
        (isset($formData['second'])) ? $f2 = 1 : $f2 = 0;
        (isset($formData['third']))  ? $f3 = 1 : $f3 = 0;
        (isset($formData['brand']) && $formData['brand'] != 'бренд') ? $f4 = 1 : $f4 = 0;
        (isset($formData['color']) && $formData['color'] != 'колір') ? $f5 = 1 : $f5 = 0;

        $configuration  = $f1.$f2.$f3.$f4.$f5;
            $configuration  = intval($configuration);

        ($f1) ? $f1 = 'В наявності' : $f1 = null;
        ($f2) ? $f2 = ['IS NOT', 'discount', null] : $f2 = null;
        ($f3) ? $f3 = ['IS NOT', 'sale', null] : $f3 = null;
        ($f4) ? $f4 = $formData['brand'] : $f4 = null;
        ($f5) ? $f5 = $formData['color'] : $f5 = null;
            $par = ['0','availability', 'discount', 'sale', 'brand', 'color'];

            switch($configuration)
            {
                case 1: $products =  Product_model::find()->filterWhere([
                                        $par[5] => $f5
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 10: $products =  Product_model::find()->filterWhere([
                                        $par[4] => $f4
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();

                            break;
                case 11:    $products =  Product_model::find()->filterWhere([
                                        $par[4] => $f4,
                                        $par[5] => $f5
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 100:   $products =  Product_model::find()->where($f3)
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 101:   $products =  Product_model::find()->where($f3)
                                        ->andWhere([
                                        $par[5] => $f5
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 110:   $products =  Product_model::find()->where($f3)
                                        ->andWhere([
                                        $par[4] => $f4
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 111:   $products =  Product_model::find()->where($f3)
                                        ->andWhere([
                                        $par[4] => $f4,
                                        $par[5] => $f5
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 1000:  $products =  Product_model::find()->where($f2)
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 1001:  $products =  Product_model::find()->where($f2)
                                        ->andWhere([
                                        $par[5] => $f5
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 1010:  $products =  Product_model::find()->where($f2)
                                        ->andWhere([
                                        $par[4] => $f4
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 1011:  $products =  Product_model::find()->where($f2)
                                        ->andWhere([
                                        $par[4] => $f4,
                                        $par[5] => $f5
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 1100:  $products =  Product_model::find()->where($f2)
                                        ->andWhere($f3)
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 1101:  $products =  Product_model::find()->where($f2)
                                        ->andWhere($f3)
                                        ->andWhere([
                                        $par[5] => $f5
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 1110:  $products =  Product_model::find()->where($f2)
                                        ->andWhere($f3)
                                        ->andWhere([
                                        $par[4] => $f4,
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 1111:  $products =  Product_model::find()->where($f2)
                                        ->andWhere($f3)
                                        ->andWhere([
                                        $par[4] => $f4,
                                        $par[5] => $f5
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 10000: $products =  Product_model::find()->where([
                                        $par[1] => $f1
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 10001: $products =  Product_model::find()->where([
                                        $par[1] => $f1,
                                        $par[5] => $f5
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 10010: $products =  Product_model::find()->where([
                                        $par[1] => $f1,
                                        $par[4] => $f4
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();

                            break;
                case 10011: $products =  Product_model::find()->where([
                                        $par[1] => $f1,
                                        $par[4] => $f4,
                                        $par[5] => $f5
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 10100: $products =  Product_model::find()->where([
                                        $par[1] => $f1
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 10101: $products =  Product_model::find()->where([
                                        $par[1] => $f1,
                                        $par[5] => $f5
                                        ])
                                        ->andWhere($f3)
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 10110: $products =  Product_model::find()->where([
                                        $par[1] => $f1
                                        ])
                                        ->andWhere($f3)
                                        ->andWhere([$par[4] => $f4])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 10111: $products =  Product_model::find()->where([
                                        $par[1] => $f1,
                                        $par[4] => $f4,
                                        $par[5] => $f5,
                                        ])
                                        ->andWhere($f3)
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 11000: $products =  Product_model::find()->where([
                                        $par[1] => $f1
                                        ])
                                        ->andWhere($f2)
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 11001: $products =  Product_model::find()->where([
                                        $par[1] => $f1
                                        ])
                                        ->andWhere($f2)
                                        ->andWhere([$par[5] => $f5])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();

                            break;
                case 11010: $products =  Product_model::find()->where([
                                        $par[1] => $f1
                                        ])
                                        ->andWhere($f2)
                                        ->andWhere([$par[4] => $f4])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();

                            break;
                case 11011: $products =  Product_model::find()->where([
                                        $par[1] => $f1
                                        ])
                                        ->andWhere($f2)
                                        ->andWhere([
                                            $par[4] => $f4,
                                            $par[5] => $f5
                                        ])
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 11100: $products =  Product_model::find()->where([
                                        $par[1] => $f1
                                        ])
                                        ->andWhere($f2)
                                        ->andWhere($f3)
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 11101: $products =  Product_model::find()->where([
                                        $par[1] => $f1,
                                        $par[5] => $f5
                                        ])
                                        ->andWhere($f2)
                                        ->andWhere($f3)
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 11110: $products =  Product_model::find()->where([
                                        $par[1] => $f1,
                                        $par[4] => $f4,
                                        ])
                                        ->andWhere($f2)
                                        ->andWhere($f3)
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
                case 11111: $products =  Product_model::find()->where([
                                        $par[1] => $f1,
                                        $par[4] => $f4,
                                        $par[5] => $f5
                                        ])
                                        ->andWhere($f2)
                                        ->andWhere($f3)
                                        ->andWhere(['category_id' => $category_id])
                                        ->limit(50)
                                        ->all();
                            break;
            }
        return $products;
    }




}
