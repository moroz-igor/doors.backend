<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cube */

$this->title = 'Update Cube: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cubes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cube-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
