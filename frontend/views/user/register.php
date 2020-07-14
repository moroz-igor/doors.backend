<?php
use yii\helpers\Url;
use yii\helpers\Html;

use frontend\assets\PagesAsset;
use yii\bootstrap\ActiveForm;
    PagesAsset::register($this);
$this->title = 'ukr.doors / реєстрація';

$this->registerCssFile('css/user.css',
    ['depends' => ['yii\bootstrap\BootstrapAsset']]);
?>

<div class="container">
    <h3><?= Html::encode($this->title) ?></h3>

    <p class="_it _lora">Заповніть поля форми та натисніть кнопку "Відправити":</p><br>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-register']); ?>
                <span class="_it _lora">Придумайте логін від 2 до 10 символів: </span>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <span class="_it _lora">Введіть вашу електронну пошту: </span>
                <?= $form->field($model, 'email') ?>

                <span class="_it _lora">Придумайте пароль: </span>
                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Відправити', ['class' => 'btn btn-default _sq _it', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
