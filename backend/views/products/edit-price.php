<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;
//use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Редагування цін на відсоток';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">
    <?php echo WidgetNavigator::widget(); ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-5 _edit-price">
                <h4>Збільшити ціни на:</h4>
                <form class="" method="post">
                    <div class="_price-change">
                            <input type="text" name="percent" value="">
                            <span> % </span>
                            <input id="form-token" type="hidden"
                            name="<?php echo Yii::$app->request->csrfParam; ?>"
                            value="<?php echo Yii::$app->request->csrfToken; ?>">
                            <input type="submit" name="trend" value="up" class="btn btn-danger">
                    </div>
                </form>
            </div>
            <div class="col-md-5 _edit-price">
                <h4>Зменшити ціни</h4>
                <form class="" method="post">
                    <div class="_price-change">
                            <input type="text" name="percent" value="">
                            <span> % </span>
                            <input id="form-token" type="hidden"
                            name="<?php echo Yii::$app->request->csrfParam; ?>"
                            value="<?php echo Yii::$app->request->csrfToken; ?>">
                            <input type="submit" name="trend" value="down" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
        <a href="<?php echo Url::to(['/category-products/'.$category_id]); ?>" class="btn btn-info">Продукти категорії</a>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'section',
            'category_id',
            'title',
            'price',
            'brand',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
