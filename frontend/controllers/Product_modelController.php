<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Product_model;
use frontend\models\AddDoors;

class Product_modelController extends Controller
{
    private $doors_category = 2;
    public function actionProduct_model($id)
    {
        $this->layout = 'pages';
            $productData = Product_model::getProduct_modelData($id);
                $sliderImages = Product_model::getSliderImg($id);
                if($productData[0]['category_id'] == $this->doors_category)
                {
                    $addDoors = AddDoors::getAddProducts($id);
                            $brand = $productData[0]['brand'];
                    if(!count($addDoors))
                    {
                        $addDoors = AddDoors::getDefaultAddProducts($brand);
                    }
                    return $this->render('product_model', [
                        'addDoors' => $addDoors,
                            'productData' => $productData,
                                'sliderImages' => $sliderImages,
                    ]);
                }
        return $this->render('product_model', [
            'productData' => $productData,
                'sliderImages' => $sliderImages,
        ]);
    }






}
