<?php
use yii\helpers\Url;
use yii\helpers\Html;

use frontend\assets\PagesAsset;
use yii\bootstrap\ActiveForm;
    PagesAsset::register($this);
$this->title = 'ukr.doors / вхід на сайт';

$this->registerCssFile('css/user.css',
    ['depends' => ['yii\bootstrap\BootstrapAsset']]);
?>

<div class="container">
    <h3><?= Html::encode($this->title); ?></h3>

    <p class="_it _lora">Заповніть поля форми та натисніть кнопку "Увійти":</p><br>
    <?php echo '<h2 class="_midl _it _lora _green">'.Yii::$app->session->getFlash('warning').'</h2>'; ?>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-login']); ?>

                <span class="_it _lora">Введіть Ваш логін: </span>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <span class="_it _lora">Введіть Ваш пароль: </span>
                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Увійти', ['class' => 'btn btn-primary _sq _it', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
            <p><a href="<?php echo Url::to(['/send-email']); ?>" class="_it _lora _maroon">Відновити дані!</a></p>
        </div>
    </div>
</div>
