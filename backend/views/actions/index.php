<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use backend\widgets\navigator\WidgetNavigator;
use yii\grid\GridView;
use backend\assets\AppAsset;

AppAsset::register($this);
$this->registerJsFile('@web/js/actions.js',
    ['depends' => ['yii\bootstrap\BootstrapAsset']]);

$this->title = 'Actions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actions-index">
    <?php echo WidgetNavigator::widget(); ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title_1:ntext',
            'title_2:ntext',
            'ticker:ntext',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
