<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Isotopefilters */

$this->title = 'Update Isotopefilters: ' . $model->num;
$this->params['breadcrumbs'][] = ['label' => 'Isotopefilters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->num, 'url' => ['view', 'id' => $model->num]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="isotopefilters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
