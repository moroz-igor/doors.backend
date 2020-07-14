<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Products;
use frontend\models\Product_model;
use frontend\models\PageDescription;
use frontend\models\filters\Selection;
use frontend\models\search\Search;
use yii\data\Pagination;

class ProductsController extends Controller
{
    public function actionProducts($category)
    {
        $this->layout = 'pages';
        $categoryNum = intval($category);
        $productList = Products::getProducts($categoryNum);
            $products = $productList['products'];
            $pages = $productList['pages'];
            $pageDescription = PageDescription::getCategoryDescription($category);

        $formData = Yii::$app->request->post();
        $model = new Selection();
                if(key($formData) === 'keyword')
                {
                    $modelSearch  = new Search();

                    $key = $modelSearch->keyword = $formData['keyword'];
                    $modelSearch->validate();

                    if($modelSearch->validate())
                        $products = $modelSearch->search($key);

                    return $this->render('search', [
                        'key' => $key,
                            'products' => $products,
                                'modelSearch' => $modelSearch,
                    ]);
                }
                else if($formData != null && $model->validate())
                {
                    $products = Product_model::getSelectionProduct($categoryNum);

                    return $this->render('products-select', [
                        'products' => $products,
                            'categoryNum' => $categoryNum,
                    ]);
                }
        return $this->render('products', [
            'products' => $products,
                'pages' => $pages,
                    'categoryNum' => $categoryNum,
                    'pageDescription' => $pageDescription,
        ]);
    }
    public function actionSqproducts($category)
    {
        $this->layout = 'pages';
        $categoryId = intval($category);
        $productList = Products::getProducts($categoryId);
            $sqproducts = $productList['products'];
            $pages = $productList['pages'];
            $pageDescription = PageDescription::getCategoryDescription($categoryId);


        $model = new Selection();
            $formData = Yii::$app->request->post();
                if(key($formData) === 'keyword')
                {
                    $modelSearch  = new Search();

                    $key = $modelSearch->keyword = $formData['keyword'];
                    $modelSearch->validate();

                    if($modelSearch->validate())
                        $products = $modelSearch->search($key);

                        return $this->render('search', [
                            'key' => $key,
                            'products' => $products,
                            'modelSearch' => $modelSearch,
                        ]);
                    }
                    else if($formData != null && $model->validate())
                    {
                        $products = Product_model::getSelectionProduct($categoryId);

                        return $this->render('products-select', [
                            'products' => $products,
                            'categoryId' => $categoryId,
                        ]);
                    }
        return $this->render('sqproducts', [
                'pages' => $pages,
                    'sqproducts' => $sqproducts,
                        'categoryId' => $categoryId,
                        'pageDescription' => $pageDescription,
        ]);

    }

}
