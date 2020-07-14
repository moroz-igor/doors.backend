<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Isotope */

$this->title = 'Create Isotope';
$this->params['breadcrumbs'][] = ['label' => 'Isotopes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="isotope-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
