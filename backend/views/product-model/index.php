<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-model-index">
    <?php echo WidgetNavigator::widget(); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'price',
            //'discount',
            //'sale',
            'title',
            'brand',
            //'availability',
            //'category',
            //'type',
            //'color',
            //'img_way_1',
            //'img_way_2',
            //'add_doors',
            //'description_1:ntext',
            //'description_2:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
