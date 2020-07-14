<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Isotopefilters */

$this->title = 'Create Isotopefilters';
$this->params['breadcrumbs'][] = ['label' => 'Isotopefilters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="isotopefilters-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
