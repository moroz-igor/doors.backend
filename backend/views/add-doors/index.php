<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Add Doors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="add-doors-index">
    <?php echo WidgetNavigator::widget(); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Add Doors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'id_product',
            'default',
            'category',
            'title',
            'width',
            'height',
            'price',
            'complect',
            'doorstep',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
