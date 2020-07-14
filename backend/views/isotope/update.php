<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Isotope */

$this->title = 'Update Isotope: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Isotopes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->this_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="isotope-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
