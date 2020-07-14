<?php

namespace backend\controllers;

use Yii;
use backend\models\Products;
use backend\models\ProductModel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use backend\models\ImageUpload;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    private $imgCatalog = 'products';
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find(),
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' =>  [
                    'id' => SORT_DESC,
                ],
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionSetImage($id)
    {
        $model = new ImageUpload;
        $catalogPath = Yii::getAlias('@img-products');

        if(Yii::$app->request->isPost)
        {
            $product = $this->findModel($id);

            $file = UploadedFile::getInstance($model, 'image');
            $fileName = $model->uploadFile($file, $id, $catalogPath, $this->imgCatalog);


            $product->saveImage($fileName);
        }

        return $this->render('image', ['model' => $model, 'id' => $id,]);
    }

    /**
     * Deleting all images of the product
     * @return mixed
     */
    public function actionDeleteImgfolder($id)
    {
        $catalogPath = Yii::getAlias('@img-products');
            ImageUpload::deleteFolder($catalogPath, $id);

        return $this->redirect(['/products/view?id='.$id]);

    }


    /**
     * Lists all Products in Category models.
     * @return mixed
     */
    public function actionCategoryProducts($category_id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()->where(['category_id' => $category_id]),
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        return $this->render('category-products', [
            'dataProvider' => $dataProvider,
            'category_id' => $category_id,
        ]);
    }

    /**
     * Editing products prices of the category.
     * @return mixed
     */
    public function actionEditPrice($category_id)
    {
        $formData = Yii::$app->request->post();
        if($formData)
        {
            $trend = $formData['trend'];
            if($trend == 'up')
            {
                Products::increaseCategoryPrices($category_id);
                ProductModel::increaseCategoryPrices($category_id);
                return $this->redirect(['/category-products/'.$category_id]);
            }
            if($trend == 'down')
            {
                Products::decreaseCategoryPrices($category_id);
                ProductModel::decreaseCategoryPrices($category_id);
                return $this->redirect(['/category-products/'.$category_id]);
            }
        }
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()->where(['category_id' => $category_id]),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render('edit-price',[
            'dataProvider' => $dataProvider,
            'category_id' => $category_id,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
