<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
echo WidgetNavigator::widget();
$this->title = 'Sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sections-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <i class="fa fa-exclamation-triangle text-warning fa-5x" aria-hidden="true"></i>
            </div>
            <div class="col-xs-10 text-warning _italic">
                <span class="text-danger">Увага!</span> Редагування колонок <span class="_normal text-primary">Dropdown</span> та <span class="_normal text-primary">View</span> данного підрозділу бази данних не бажанно! Бажанна кількість секцій, для збереження адаптивного дизайну сайту, по замовчуванню дорівнює п'ять. Змінюючи назви секцій, або додаючи нову перевірте адаптивність, шляхом зміни ширини вікна веб-броузера. <br>
                НЕ ВИДАЛЯЙТЕ БЕЗ ПОТРЕБИ СЕКЦІЮ!<br> Відображення секціі можливо вимкнути шляхом зміни значень у колонці <span class="_normal text-primary">Display</span> із <span class="_normal text-primary">1</span> на <span class="_normal text-primary">NULL</span> [ not set - порожнеча ] !
            </div>
        </div>
    </div><br>
    <p>
        <?= Html::a('Create Sections', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'number',
            'title',
            'dropdown',
            'view',
            'display',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
