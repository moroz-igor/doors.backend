<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doors Widths';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doors-widths-index">
    <?php echo WidgetNavigator::widget(); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Doors Widths', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'width',
            'brand',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
