<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товари в замовленнях';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-items-index">
    <?php echo WidgetNavigator::widget(); ?>
    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'order_id',
            'session_id',
            'title',
            'price',
            'qty_item',
            'sum_item',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
