<?php
use yii\helpers\Html;
use yii\helpers\Url;
 ?>
<header class="_header">
    <div class="container">
    <div class="row">
        <div class="site-titles col-lg-6 col-md-6 col-xs-6 col-sm-6">
            <h2>Категорія:</h2>
            <h1><?php echo $title['title']; ?></h1>
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
    </div>
    <br/>
</header>
