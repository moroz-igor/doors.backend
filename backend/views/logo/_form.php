<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Logo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="logo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'main')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
