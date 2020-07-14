<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
echo WidgetNavigator::widget();
$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <i class="fa fa-exclamation-triangle text-warning fa-5x" aria-hidden="true"></i>
            </div>
            <div class="col-xs-10 text-warning _italic">
                Увага! Не бажано редагувати <span class="_normal text-primary">ID</span> в стічці із <span class="_normal text-primary">Title</span> -
                <span class="_normal text-primary">Міжкімнатні двері</span>
            </div>
        </div>
    </div><br>
    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'section',
            'page_number',
            'title',
            'display',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
