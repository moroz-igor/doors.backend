<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Filters */

$this->title = 'Create Filters';
$this->params['breadcrumbs'][] = ['label' => 'Filters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filters-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
