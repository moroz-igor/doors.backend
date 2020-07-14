<?php

namespace backend\controllers;

use Yii;
use backend\models\Order;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
{
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
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Order::find()->where(['status' => 1]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Order in Processing.
     * @return mixed
     */
    public function actionProcess()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Order::find()->where(['process' => 1]),
        ]);

        return $this->render('process', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Order in Processing.
     * @return mixed
     */
    public function actionClosed()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Order::find()->where(['closed' => 1]),
        ]);

        return $this->render('closed', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
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
     * Updates an existing Order model.
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
     * Processing an existing Order model.
     * If update is successful, the browser will be redirected to the 'process' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionProcessAdd($id)
    {
        $model = $this->findModel($id);
        $model->status = 0;
        $model->process = 1;
        $model->closed = 0;
        $model->save();
        if($model->save())
        {
            return $this->redirect(['process', 'id' => $model->id]);
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Closed an existing Orders.
     * If update is successful, the browser will be redirected to the 'process' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionClosedAdd($id)
    {
        $model = $this->findModel($id);
        $model->status = 0;
        $model->process = 0;
        $model->closed = 1;
        $model->save();
        if($model->save())
        {
            return $this->redirect(['process', 'id' => $model->id]);
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Order model.
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
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Order::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
