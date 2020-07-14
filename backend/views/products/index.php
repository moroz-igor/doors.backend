<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">
    <?php echo WidgetNavigator::widget(); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
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
