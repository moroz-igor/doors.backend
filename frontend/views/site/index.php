<?php
use yii\helpers\Url;
use frontend\assets\PagesAsset;
use frontend\widgets\discount\Discount;
use frontend\models\Main;
use yii\helpers\Html;
    PagesAsset::register($this);
$this->title = 'ukr.doors / товари';

$this->registerCssFile('css/main.css',
    ['depends' => ['yii\bootstrap\BootstrapAsset']]);
$this->registerCssFile('css/isotop.css',
    ['depends' => ['yii\bootstrap\BootstrapAsset']]);
$this->registerJsFile('@web/js/main.js',
    ['depends' => ['yii\bootstrap\BootstrapAsset']]);
$this->registerJsFile('@web/js/isotop-docs.js',
    ['depends' => ['yii\bootstrap\BootstrapAsset']]);
?>

  <header class="_header">
    <div class="container">
      <div class="row">
        <div class="site-titles col-lg-6 col-md-6 col-xs-6 col-sm-6">
          <h2>Купуйте у нас</h2>
          <h1>МІЖКІМНАТНІ ТА ВХІДНІ ДВЕРІ</h1>
          <h3>металопластикові вікна </h3>
          <h4>та фурнітуру</h4>
          <div class="_discount-buttons">
            <div> <span id="_discount">DISCOUNT &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</span></div>
            <div> <span id="_popular"> POPULAR</span></div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-xs-6 col-sm-6 _popular">
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
                <span class="_user-login-header">
                    <?php echo Html::encode(Yii::$app->user->identity->username); ?>
                </span>
            </a>
            <a href="<?php echo Url::to(['/logout']); ?>">
                <p class="font-aldrich font-italic">Вихід</p>
            </a>
        <?php endif; ?>
        </div>
        <div class="_header-cub col-lg-3 col-md-3 hidden-xs hidden-sm">
          <div class="wrapper">
            <div class="cub">
                <?php $count =1; foreach ($cubeData as $cube): ?>
                    <a href="<?php echo Url::to(['product/'.$cube->product_id]); ?>">
                        <img class="size<?php echo $count; ?>" src="<?php echo $cube->img_path; ?>" alt="<?php echo $count; ?>"/>
                    </a>
                <?php $count++; endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div><br/>
  </header>
    <?php
    if(Yii::$app->session->getFlash('info'))
    echo '<h2 class="_midl _it _lora _green">'.Yii::$app->session->getFlash('info').'</h2>';
    if(Yii::$app->session->getFlash('register'))
    echo '<h2 class="_midl _it _lora _green">'.Yii::$app->session->getFlash('register').'</h2>';
    echo Discount::widget(); ?>
  <div class="content">
    <div class="_close-isotop">
      <div class="cl-btn-7" id="close-isotop"></div>
    </div>
    <div class="_isotop-overall">
      <h1>Популярні товари</h1>
      <div data-js="_isotop-hero-demo">
        <div class="_isotop-buttons__container">
          <div class="_is-button-block">
            <div class="_is-filters">
              <ul class="nav">
                <li class="active">
                  <button class="button " data-filter="*">Показати всі</button>
                </li>
                <?php foreach ($isotopeFilters as $filter): ?>
                    <li>
                      <button class="button" data-filter=".<?php echo $filter['class'] ?>">
                          <?php echo $filter['category']; ?>
                      </button>
                    </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
          <div class="_is-button-block">
            <div class="sort-by">
              <ul class="nav">
                <li class="active">
                  <button class="button" data-sort-by="original-order">Спочатку</button>
                </li>
                <li>
                  <button class="button" data-sort-by="brand">Виробник</button>
                </li>
                <li>
                  <button class="button" data-sort-by="discount">Акційні</button>
                </li>
                <li>
                  <button class="button" data-sort-by="number">По ціні</button>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="_is-grid">
            <?php foreach ($popularProducts as $popular): ?>
                <div class="element-item _is-<?php echo $popular->class; ?>">
                <a href="<?php echo Url::to(['product/'.$popular->id]); ?>">
                    <div class="_it-container">
                      <div class="_it-element">
                        <h4><?php echo $popular->name; ?></h4>
                        <h5 class="brand"><?php echo $popular->brand; ?></h5>
                        <p class="number"><?php echo $popular->price; ?> грн</p>
                        <?php if ($popular->discount): ?>
                            <p class="discount"><?php echo $popular->discount; ?></p>
                        <?php endif; ?>
                        <p class="_id-product"> <span><?php echo $popular->id; ?></span></p>
                      </div>
                      <div class="_it-element _it-img"><img src="<?php echo $popular->img_way; ?>" alt="dv1"/></div>
                    </div>
                </a>
                </div>
            <?php endforeach; ?>
        </div>
      </div>
    </div>
    <h1><?php echo $aboutShop[0]['title']; ?></h1>
        <div class="_main-product-block">
            <div class="_main-door"></div>
            <div class="_main-content">
                <?php Main::aboutContentPrint(0,1); ?>
                    <a href="<?php echo Url::to(['products/1']); ?>">
                        <span>Перейти...</span>
                    </a>
                </div>
            </div>
            <div class="_main-product-block">
                <div class="_main-window _mob"></div>
                <div class="_main-content">
                    <?php Main::aboutContentPrint(1,3); ?>
                    <a href="<?php echo Url::to(['sqproducts/3']); ?>"> <span>Перейти...</span></a>
                </div>
                <div class="_main-window _desctop"></div>
            </div>
            <div class="_main-product-block">
                <div class="_main-finding"></div>
                <div class="_main-content">
                    <?php Main::aboutContentPrint(2,6); ?>
                    <a href="<?php echo Url::to(['sqproducts/6']); ?>"> <span>Перейти...</span></a>
                </div>
            </div>
    <section class="_brand-logo">
        <h2>------------</h2>
        <?php Main::BrandDescriptionPrint(); ?>
        <div class="container">
            <div class="row row_my">
                <?php foreach ($partners as $brand): ?>
                    <div class="_brand-element col-xs-6 col-sm-3">
                        <div class="thumbnail">
                            <img src="<?php echo $brand['brand_img'] ?>" alt="brand-<?php  echo $brand['id']; ?>"/>
                            <div class="caption"></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
  </div>
