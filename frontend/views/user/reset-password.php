<?php

use yii\helpers\Url;
use yii\helpers\Html;

use frontend\assets\PagesAsset;
use yii\widgets\ActiveForm;
    PagesAsset::register($this);
$this->title = 'ukr.doors / Відновлення даних!';

$this->registerCssFile('css/user.css',
    ['depends' => ['yii\bootstrap\BootstrapAsset']]);
$this->registerJsFile('@web/js/preventions.js',
    ['depends' => ['yii\bootstrap\BootstrapAsset']]);

/* @var $this yii\web\View */
/* @var $model frontend\models\forms\ResetPasswordForm */
/* @var $form ActiveForm */
?>
    <div class="main-resetPassword">
        <div class="container">
            <br>
            <p class="_it _lora">
                Введіть новий пароль! Та збережіть його в надійному місці!
            </p><br>
            <div class="_green _midl hidden" id="_weit">
                <h1>Зачекайте! Виконується запит!</h1>
                <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i><br><br>
                <p class="_green">Загрузка...</p>
            </div>
            <?php echo '<h2 class="_midl _it _lora _green">'.Yii::$app->session->getFlash('error').'</h2>'; ?>

            <div class="col-md-6 _form-block" id="_form-send-data"><br>
                <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <div class="form-group">
                        <?= Html::submitButton('Змінити пароль', ['class' => 'btn btn-primary hidden',
                                                                    'id' =>'_send-email'
                                                                    ]) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                    <?= Html::submitButton('Превірити', ['class' => 'btn btn-warning hidden',
                                                            'id' =>'_check-email'
                                                            ]) ?>
                    <p class="_it _lora _green hidden" id="_hint-reset"> Натисніть іще раз!</p>

                </div>
            </div>
        </div>
<!-- main-resetPassword -->
