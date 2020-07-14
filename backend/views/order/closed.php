<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Виконані замовлення';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">
    <?php echo WidgetNavigator::widget(); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Нові', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('В обробці', ['process'], ['class' => 'btn btn-warning']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'created_at',
            'name',
            'email:email',
            'phone',
            'qty',
            'sum',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
