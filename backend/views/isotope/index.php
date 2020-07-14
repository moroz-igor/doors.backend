<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Isotopes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="isotope-index">
    <?php echo WidgetNavigator::widget(); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Isotope', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'class',
            'name',
            'brand',
            'price',
            //'discount',
            //'img_way',
            //'status',
            //'this_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
