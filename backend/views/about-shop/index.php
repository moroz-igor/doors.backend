<?php
use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'About Shops';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-shop-index">
    <?php echo WidgetNavigator::widget(); ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-xs-2">
                <i class="fa fa-exclamation-triangle text-warning fa-5x" aria-hidden="true"></i>
            </div>
            <div class="col-xs-10 text-warning _italic">
                <span class="text-danger">Увага!</span>  Бажанно тільки редагування!
            </div>
        </div>
    </div><br>

    <p>
        <?= Html::a('Create About Shop', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'title',
            'section',
            'subtitle',
            'paragraph_1:ntext',
            //'paragraph_2:ntext',
            //'paragraph_3:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
