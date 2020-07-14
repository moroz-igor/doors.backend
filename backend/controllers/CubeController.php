<?php

namespace backend\controllers;

use Yii;
use backend\models\Cube;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\ImageUpload;
use yii\web\UploadedFile;

/**
 * CubeController implements the CRUD actions for Cube model.
 */
class CubeController extends Controller
{
    private $imgCatalog = 'cube';
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
     * Lists all Cube models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Cube::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Images Uploader of the cube.
     * @return mixed
     */
    public function actionSetImage($id)
    {
        $model = new ImageUpload;
        $catalogPath = Yii::getAlias('@img-cube');

        if(Yii::$app->request->isPost)
        {
            $cube = $this->findModel($id);

            $file = UploadedFile::getInstance($model, 'image');
            $fileName = $model->uploadFile($file, $id, $catalogPath, $this->imgCatalog);


            $cube->saveImage($fileName);
        }

        return $this->render('image', ['model' => $model, 'id' => $id,]);
    }

    /**
     * Deleting images of the cube
     * @return mixed
     */
    public function actionDeleteImgfolder($id)
    {
        $catalogPath = Yii::getAlias('@img-cube');
            ImageUpload::deleteFolder($catalogPath, $id);

        return $this->redirect(['/cube/view?id='.$id]);

    }


    /**
     * Displays a single Cube model.
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
     * Updates an existing Cube model.
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
     * Finds the Cube model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cube the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cube::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
