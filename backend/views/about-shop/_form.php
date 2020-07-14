<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AboutShop */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-shop-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'section')->textInput() ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paragraph_1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'paragraph_2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'paragraph_3')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
