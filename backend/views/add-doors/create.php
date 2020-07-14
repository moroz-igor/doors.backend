<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AddDoors */

$this->title = 'Create Add Doors';
$this->params['breadcrumbs'][] = ['label' => 'Add Doors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="add-doors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
