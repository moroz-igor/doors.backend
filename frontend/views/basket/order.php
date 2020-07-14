<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use frontend\assets\PagesAsset;
        PagesAsset::register($this);
    $this->title = 'ukr.doors / кошик';

    $this->registerCssFile('css/basket.css',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/main.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/basket.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/order.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
 ?>
<header class="_header">
    <div class="container">
        <div class="row">
        <div class="site-titles col-lg-6 col-md-6 col-xs-6 col-sm-6">
            <h2>UkrDoors</h2>
            <h1>Order</h1>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 _popular">
            <?php if(Yii::$app->user->isGuest): ?>
                <h2>Ви не увійшли</h2>
                <a href="<?php echo Url::to(['/login']); ?>">
                    <p class="font-aldrich font-italic">Вхід</p>
                </a>
                <a href="<?php echo Url::to(['/register']); ?>">
                    <p class="font-aldrich font-italic">Реєстрація</p>
                </a>
            <?php endif; ?>
            <?php if(!Yii::$app->user->isGuest): ?>
                <h2>Привіт!</h2>
                <a href="<?php echo Url::to(['/edit']); ?>">
                    <p class="_lora _it"><?php echo Html::encode(Yii::$app->user->identity->username); ?></p>
                </a>
                <a href="<?php echo Url::to(['/logout']); ?>">
                    <p class="font-aldrich font-italic">Вихід</p>
                </a>
            <?php endif; ?>
        </div>
        </div>
    </div><br/>
</header>
<section class="_midl">
    <h1>Оформлення замовлення!</h1>
    <article class="_green hidden" id="_weit">
        <h1>Зачекайте! Виконується запит!</h1>
        <i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i>
        <span class="sr-only">Загрузка...</span>

    </article>
    <div class="container">
        <div class="row">
            <?php if(Yii::$app->session->hasFlash('preventions') ): ?>
                <div class="alert" role="alert">
                    <span class="_flash-preventions">
                        <?php echo Yii::$app->session->getFlash('preventions'); ?>
                    </span>
                </div>
            <?php endif; ?>
            <?php if(Yii::$app->session->hasFlash('success') ): ?>
                <div class="alert" role="alert">
                    <span class="_flash-sucess">
                        <?php echo Yii::$app->session->getFlash('success'); ?>
                    </span>
                </div>
            <?php endif; ?>
            <?php if(Yii::$app->session->hasFlash('error') ): ?>
                <div class="alert " role="alert">
                <button type="button" name="close" data-dismiss="alert" arial-label="Close">
                    <span aria-hidden="true">&times</span>
                </button>
                    <?php echo Yii::$app->session->getFlash('error'); ?>
            </div>
            <?php endif; ?>
        </div>
        <?php if($_SESSION['cart.qty']): ?>
            <div class="row">
                <div class="col-md-2 hidden-xs"></div>
                <div class="col-md-8 col-xs-12">
                    <?php $form = ActiveForm::begin(['id' => '_order-form']); ?>
                        <?= $form->field($order, 'name')->textInput(['value' => $order->name]) ?>
                        <?= $form->field($order, 'email')->textInput(['value' => $order->email]) ?>
                        <?= $form->field($order, 'phone')->textInput(['value' => $order->phone]) ?>
                        <?= $form->field($order, 'address')->textInput(['value' => $order->address]) ?>
                        <?= Html::submitButton('Підтвердити', ['class' => 'btn btn-success hidden',
                                                                'id' => '_order-send' ]); ?>
                    <?php ActiveForm::end(); ?>
                    <br>
                    <?= Html::submitButton('Перевірити', ['class' => 'btn btn-info hidden',
                                                            'id' => '_order-verify' ]); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if(!$_SESSION['cart.qty']): ?>
            <h3 class="_maroon _lora">Ваш кошик порожній!</h3>
        <?php endif; ?>

    </div>
</section>
