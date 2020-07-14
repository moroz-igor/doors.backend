<?php
/* @var $this yii\web\View */
/* @var $model backend\models\Actions */

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\assets\AppAsset;

AppAsset::register($this);
$this->registerJsFile('@web/js/actions.js',
    ['depends' => ['yii\bootstrap\BootstrapAsset']]);

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Actions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actions-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title_1:ntext',
            'title_2:ntext',
            'ticker:ntext',
            'status',
            'ID',
        ],
    ]) ?>

</div>
