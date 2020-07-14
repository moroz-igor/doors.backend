<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DoorsWidths */

$this->title = 'Create Doors Widths';
$this->params['breadcrumbs'][] = ['label' => 'Doors Widths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doors-widths-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
