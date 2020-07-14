<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\PagesAsset;
use frontend\models\Nav;
use frontend\models\Footer;
use frontend\widgets\logo\Logo;

PagesAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
    <?php
        $list = Nav::getSections();
            $categoryList = Nav::getCategories();
                $footerList = Footer::getDataFooter(); ?>

<?php $this->beginBody() ?>
<body>
  <main>
    <div class="container">
      <div class="row">
        <div class="navbar _main-navbar">
          <div class="navbar-header"><a href="/">
              <div class="logo"><img src="/img/logo/logo1.png" alt="logo"/></div></a>
            <div class="_gumburger">
              <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#main_navigator"><i class="fa fa-align-justify"></i></button>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="main_navigator">
              <ul class="nav navbar-nav">
                <?php foreach ($list as $section): ?>
                <?php if(!$section['dropdown'] ): ?>
                    <li class="_main-navigator-pages">
                        <a href="<?php
                                        if($section['view'] != 'index')
                                            echo Url::to([$section['view'].'/'.$section['view'] ]);
                                        else echo '/'; ?>" >
                            <?php echo $section['title']; ?>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if($section['dropdown'] ): ?>
                <li class="dropdown _main-navigator-pages">
                    <a href="/" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                                echo $section['title'];
                                if($section['dropdown'] ) echo '<b class="caret"></b>';
                        ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="_dropdown-point">

                        <?php foreach ($categoryList as $category):
                            if($section['dropdown'] && ($section['number']*=1) == ($category['section']*=1)): ?>
                                <a href="<?php echo Url::to([ $section['view'].'/'.$category['id'] ]); ?>">
                                                    <?php  echo $category['title'].'<br>'; ?></a>
                            <?php endif; endforeach; ?>
                        </li>
                    </ul>
                <?php endif; ?>
                </li>
                <?php endforeach; ?>
                <?php echo '<br>'; ?>
            </ul>
            <div class="_basket">
              <p>У кошику</p>
              <a href="<?php echo Url::to(['basket/basket']); ?>">
                  <i class="fa fa-2x fa-shopping-cart" aria-hidden="true">
                   <span id="cart_qty" data="<?php echo $_SESSION['cart.qty']; ?>">
                       <?php if($_SESSION['cart.qty'])echo $_SESSION['cart.qty']; else echo 0; ?>
                   </span></i>
               </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?= $content ?>

    <?php echo Logo::widget(); ?>
    <footer class="footer">
        <iframe class="_our-location" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2593.415571614954!2d28.518756543548704!3d49.45776198539877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDnCsDI3JzI3LjkiTiAyOMKwMzEnMTQuMiJF!5e0!3m2!1suk!2sua!4v1578853991055!5m2!1suk!2sua" allowfullscreen=""></iframe>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
                <p>
                    <?php if($footerList[0]['snet'] ): ?>
                        <a href="<?php echo $footerList[0]['snet']; ?>">
                            <i class="fa fa-5x fa-facebook-square" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?>
                    <?php if($footerList[1]['snet'] ): ?>
                        <a href="<?php echo $footerList[1]['snet']; ?>">
                            <i class="fa fa-5x fa-instagram" aria-hidden="true"></i>
                        </a>
                    <?php endif; ?>
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 _footer-contacts">
                <?php foreach ($footerList as $footer): ?>
                    <p><?php if($footer['phones']) echo $footer['phones']; ?></p>
                <?php endforeach; ?>
                <?php foreach ($footerList as $footer): ?>
                    <p><?php if($footer['emails']) echo $footer['emails']; ?></p>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 _footer-info">
                <p><?php if($footerList[0]['desc']) echo $footerList[0]['desc']; ?></p>
            </div>
    </div>
    </footer>
    </main>
    <div class="_anchor"><i class="fa fa-angle-double-up" aria-hidden="true"></i></div>
<?php $this->endBody() ?>
<script type="text/javascript">
    if ($(document).height() <= $(window).height())
        $("footer.footer").addClass("navbar-fixed-bottom");
</script>
</body>
</html>
<?php $this->endPage() ?>
