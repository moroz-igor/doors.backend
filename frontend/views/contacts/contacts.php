<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use frontend\assets\PagesAsset;
        PagesAsset::register($this);
    $this->title = 'ukr.doors / контакти';
    $this->registerCssFile('css/contacts.css',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/main.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);

?>
 <header class="_header">
  <div class="container">
    <div class="row">
      <div class="site-titles col-lg-6 col-md-6 col-xs-6 col-sm-6">
        <h2>UkrDoors</h2>
        <h1>Інтернет магазин</h1>
      </div>
      <div class="col-lg-3 col-md-3 col-xs-3 col-sm-3 _popular">
          <?php if(Yii::$app->user->isGuest): ?>
              <h2>Ви не увійшли</h2>
              <a href="/user/login">
                  <p class="font-aldrich font-italic">Вхід</p>
              </a>
              <a href="/user/register">
                  <p class="font-aldrich font-italic">Реєстрація</p>
              </a>
          <?php endif; ?>
          <?php if(!Yii::$app->user->isGuest): ?>
              <h2>Привіт!</h2>
              <a href="/user/edit">
                  <p class="_lora _it"><?php echo Html::encode(Yii::$app->user->identity->username); ?></p>
              </a>
              <a href="/user/logout">
                  <p class="font-aldrich font-italic">Вихід</p>
              </a>
          <?php endif; ?>
      </div>
    </div>
  </div><br/>
</header>
<article class="_about-us">
    <h2><?php echo $pageData[0]['title']; ?></h2>
    <div class="_c-img"><img src="img/contacts/1.jpg" alt="_about-us"/></div>
    <div class="_adress">
        <?php foreach ($pageData as $contact): ?>
            <?php if ($contact->adress) echo '<p>'.$contact->adress.'</p>'; ?>
        <?php endforeach; ?>
        <?php foreach ($pageData as $contact): ?>
            <?php if ($contact->adress_des) echo '<span>'.$contact->adress_des.'<span><br>'; ?>
        <?php endforeach; ?>
    </div>
    <div>
    <h3><?php echo $pageData[0]['sub_title']; ?></h3>
            <?php foreach ($pageData as $contact): ?>
                <?php if ($contact->description): ?>
                    <p class="_c-content"><?php echo $contact->description; ?></p><br/>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</article>
