<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;
use backend\assets\AppAsset;
AppAsset::register($this);
$this->registerJsFile('@web/js/logo.js',
    ['depends' => ['yii\bootstrap\BootstrapAsset']]);



$this->title = 'Logos';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="logo-index">

    <?php echo WidgetNavigator::widget(); ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'main',
            'title_1',
            'title_2',
            'title_3',
            'title_4',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
