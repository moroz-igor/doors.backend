<?php

namespace backend\controllers;

use Yii;
use backend\models\Isotope;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\ImageUpload;
use yii\web\UploadedFile;


/**
 * IsotopeController implements the CRUD actions for Isotope model.
 */
class IsotopeController extends Controller
{
    private $imgCatalog = 'isotope';
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
     * Lists all Isotope models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Isotope::find(),
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
        $catalogPath = Yii::getAlias('@img-isotope');

        if(Yii::$app->request->isPost)
        {
            $isotope = $this->findModel($id);

            $file = UploadedFile::getInstance($model, 'image');
            $fileName = $model->uploadFile($file, $id, $catalogPath, $this->imgCatalog);


            $isotope->saveImage($fileName);
        }

        return $this->render('image', ['model' => $model, 'id' => $id,]);
    }

    /**
     * Deleting all images of the product
     * @return mixed
     */
    public function actionDeleteImgfolder($id)
    {
        $catalogPath = Yii::getAlias('@img-isotope');
            ImageUpload::deleteFolder($catalogPath, $id);

        return $this->redirect(['/isotope/view?id='.$id]);

    }


    /**
     * Displays a single Isotope model.
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
     * Creates a new Isotope model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Isotope();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->this_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Isotope model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->this_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Isotope model.
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
     * Finds the Isotope model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Isotope the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Isotope::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
