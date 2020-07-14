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

?>
<div class="container">
</div>


<div class="container">
    <h3><?= Html::encode($this->title); ?></h3>
    <p class="_it _lora _green">
        Увага! Ви збираєтесь відправити запит на зміну реєстраційних данних!:<br>
        <span class="_lora _maroon">Зверніть увагу! Разове посилання для зміни даних дійсне протягом 10 хв!</span><br>
        Введіть в форму нижче Ваш email
    </p>
    <div class="_green _midl hidden" id="_weit">
        <h1>Зачекайте! Виконується запит!</h1>
        <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i><br><br>
        <p class="_green">Загрузка...</p>
    </div>
    <?php echo '<h2 class="_midl _it _lora _maroon">'.Yii::$app->session->getFlash('time_limit').'</h2>'; ?>
    <?php echo '<p class="_midl _it _lora _green">'.Yii::$app->session->getFlash('time_hint').'</p>'; ?>
    <?php echo '<h2 class="_midl _it _lora _green">'.Yii::$app->session->getFlash('error').'</h2>'; ?>
    <?php echo '<h2 class="_midl _it _lora _green">'.Yii::$app->session->getFlash('warning').'</h2>'; ?>
    <?php echo '<h2 class="_midl _it _lora _maroon">'.Yii::$app->session->getFlash('preventions').'</h2>'; ?>
        <div class="col-md-6 _form-block" id="_form-send-data">

            <br>
            <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($model, 'email') ?>

                <div class="form-group _form-buttons">
                    <?= Html::submitButton('Відправити', ['class' => 'btn btn-success hidden',
                                                            'id' =>'_send-email'
                                                            ]) ?>
                </div>

            <?php ActiveForm::end(); ?>
                <?= Html::button('Превірити', ['class' => 'btn btn-warning hidden',
                'id' =>'_check-email'
                ]) ?>
                <p class="_it _lora _green hidden" id="_hint-send"> Натисніть іще раз!</p>
            </div>
        </div>

</div>
