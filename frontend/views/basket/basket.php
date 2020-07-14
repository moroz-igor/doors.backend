<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
    use frontend\assets\PagesAsset;
        use frontend\models\DoorsWidths;
        PagesAsset::register($this);
    $this->title = 'ukr.doors / кошик';

    $this->registerCssFile('css/basket.css',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/basket.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/main.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
 ?>
<header class="_header">
    <div class="container">
        <div class="row">
        <div class="site-titles col-lg-6 col-md-6 col-xs-6 col-sm-6">
            <h2>UkrDoors</h2>
            <h1>Ваш кошик</h1>
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
<section class="_basket_overall">
    <?php if(empty($session['cart']) && empty($session['addcart'])): ?>
        <h1>Ваш кошик порожній!</h1>
        <?php  endif;
    if( !empty($session['cart']) || !empty($session['addcart']) ): ?>
        <div class="_cart-overall-qty">
            Ви вибрали товари в кількості
            <span id="_cart-qty">
                <?php echo $_SESSION['cart.qty']; ?>
            </span>
            шт.
        </div>
        <div>
            <div class="_basket-summ">
                <p>Всього  на суму:
                    <span class="_cart-overall-sum" id="_cart-overall-sum">
                        <?php echo $session['cart.sum']; ?>
                    </span>
                грн.
                </p>
            </div>
            <div class="_basket-buttons">
                <div>
                    <div>
                    <a class="btn btn-default" href="<?php echo Url::to(['basket/clearcart']); ?>">
                        Очистити
                    </a>
                    </div>
                    <div>
                        <a class="btn btn-danger" href="<?php echo Url::to(['basket/order']); ?>">
                            Оформити
                        </a>
                    </div>
                </div>
            </div>
    <?php $number = 1; if( !empty($session['cart']) ):
         $sessionData = $session['cart'];
         foreach ($sessionData as $id_width => $cartElement): ?>

          <div class="_basket-element" id="_cart-element-<?php echo $id_width; ?>">
            <div class="_basket-element__title">
                <span><?php echo $number; ?>) </span>
                <?php if($cartElement['category_id'] == 2): ?>
                    <span> Ширина <?php echo $cartElement['width'];  ?> см
                    </span>
                <?php endif; ?>
            <a href="<?php echo Url::to(['product/'.$cartElement['id']]); ?>">
                <?php echo $cartElement['title']; ?>
            </a>
            </div>
            <div class="container-fluid">
              <div class="row _basket-element__container">
                <div class="col-sm-1 hidden-xs">
                  <p class="_basket-table__titles">№</p>
                </div>
                <div class="col-sm-1 hidden-xs">
                  <p class="_basket-table__titles">Фото</p>
                </div>
                <div class="col-sm-2 col-xs-2 _basket-id">
                  <p class="_basket-table__titles">id</p>
                </div>
                <div class="col-sm-3 col-xs-4 _basket__amount">
                  <p class="_basket-table__titles">Кількість</p>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <p class="_basket-table__titles">Ціна</p>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <p class="_basket-table__titles">Сумма</p>
                </div>
                <div class="col-sm-1 col-xs-2">
                  <p class="_basket-table__titles"><i class="fa fa-trash-o trash"></i></p>
                </div>
              </div>
            </div>
            <div class="container-fluid">
            <div class="row _basket-element__container">
                <div class="col-sm-1 hidden-xs">
                        <div class="_basket-element__block">
                            <p><?php echo $number; ?></p>
                        </div>
                </div>
                <div class="col-sm-1 hidden-xs">
                <div class="_basket-element__img">
                <img src="<?php echo $cartElement['img_way_1']; ?>" alt="_basket-element_1"/>
                </div>
                </div>
                <div class="col-sm-2 col-xs-2 _basket-id">
                    <div class="_basket-element__block">
                        <p>[ <?php echo $id_width; ?> ]</p>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-4 _basket__amount">
                    <div class="_basket-element__block">
                    <div>
                        <button class="_basket-amount" id="minus-<?php echo $id_width; ?>" value="cart">
                        <i class="fa fa-minus-square" aria-hidden="true"></i>
                        </button>
                        <div>
                        <input class="_basket-num-<?php echo $id_width; ?>" type="text"
                        maxlength="4"
                        value="<?php echo $cartElement['qty'];?>"
                        name="_basket-num"/>
                        </div>
                        <button class="_basket-amount" id="aplus-<?php echo $id_width; ?>" value="cart">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </button>
                        <button type="button" name="_form-enter" class="hidden _basket-amount"
                         id="_button-insert-<?php echo $id_width; ?>" value="cart">
                            <i class="fa fa-refresh  fa-fw"></i>
                        </button>

                    </div>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <div class="_basket-element__block">
                    <p>
                        <span id="_price-<?php echo $id_width; ?>"><?php echo $cartElement['price']; ?></span>
                    грн
                    </p>
                  </div>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <div class="_basket-element__block">
                    <p><span  id="_cart-sum-<?php echo $id_width; ?>">
                        <?php echo $cartElement['sum']; ?></span>грн</p>
                  </div>
                </div>
                <div class="col-sm-1 col-xs-2">
                  <div class="_basket-element__block">
                    <p>
                    <button class="_delete-cart-element" id="<?php echo $id_width; ?>" name="cart">
                            <i class="fa  fa-trash-o "></i>
                        </button>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php $number++; endforeach; endif;?>
    <?php if(!empty($session['addcart'])): $addCart =  $_SESSION['addcart'];
        foreach ($addCart as $key => $cart): ?>
        <div class="_basket-element" id="_cart-element-<?php echo $key; ?>">
            <div class="_basket-element__title">
                <span><?php echo $number; ?>) </span> <?php echo $cart['title']; ?>
                <a href="<?php echo Url::to(['product/'.$cart['base_id']]); ?>">
                    <?php echo $cart['base_title'].' [ id: '.$cart['base_id'].' ]'; ?>
                </a>
            </div>
            <div class="container-fluid">
              <div class="row _basket-element__container">
                <div class="col-sm-1 hidden-xs">
                  <p class="_basket-table__titles">№</p>
                </div>
                <div class="col-sm-1 hidden-xs">
                  <p class="_basket-table__titles">Фото</p>
                </div>
                <div class="col-sm-2 col-xs-2 _basket-id">
                  <p class="_basket-table__titles">id</p>
                </div>
                <div class="col-sm-3 col-xs-4 _basket__amount">
                  <p class="_basket-table__titles">Кількість</p>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <p class="_basket-table__titles">Ціна</p>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <p class="_basket-table__titles">Сумма</p>
                </div>
                <div class="col-sm-1 col-xs-2">
                  <p class="_basket-table__titles"><i class="fa fa-trash-o trash"></i></p>
                </div>
              </div>
            </div>
            <div class="container-fluid">
              <div class="row _basket-element__container">
                <div class="col-sm-1 hidden-xs">
                  <div class="_basket-element__block">
                    <p><?php echo $number; ?></p>
                  </div>
                </div>
                <div class="col-sm-1 hidden-xs">
                <div class="_basket-element__img">
                <img src="/img/nonphoto/nonphoto.jpg" alt="_basket-element_1"/>
                </div>
                </div>
                <div class="col-sm-2 col-xs-2 _basket-id">
                  <div class="_basket-element__block">
                    <p>[ <?php echo $key; ?> ]</p>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-4 _basket__amount">
                  <div class="_basket-element__block">
                    <div>
                        <button class="_basket-amount" id="minus-<?php echo $key; ?>" value="addcart">
                        <i class="fa fa-minus-square" aria-hidden="true"></i>
                        </button>
                        <div>
                        <input class="_basket-num-<?php echo $key; ?>"
                        type="text"
                        maxlength="4"
                        value="<?php echo $cart['qty'];?>"
                        name="_basket-num"/>
                        </div>
                        <button class="_basket-amount" id="aplus-<?php echo $key; ?>" value="addcart">
                            <i class="fa fa-plus-square" aria-hidden="true"></i>
                        </button>
                        <button type="button" name="_form-enter" class="hidden _basket-amount"
                        id="_button-insert-<?php echo $key; ?>" value="addcart">
                            <i class="fa fa-refresh  fa-fw"></i>
                        </button>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <div class="_basket-element__block">
                    <p>
                        <span id="_price-<?php echo $key; ?>"><?php echo $cart['price']; ?></span>
                        грн
                    </p>
                  </div>
                </div>
                <div class="col-sm-2 col-xs-2">
                  <div class="_basket-element__block">
                    <p><span  id="_cart-sum-<?php echo $key; ?>">
                        <?php echo $cart['sum']; ?></span>грн</p>
                  </div>
                </div>
                <div class="col-sm-1 col-xs-2">
                  <div class="_basket-element__block">
                    <p>
                    <button class="_delete-cart-element" id="<?php echo $key; ?>" name="addcart">
                            <i class="fa  fa-trash-o "></i>
                    </button>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
         <?php $number++; endforeach; endif;?>
        </div>
        </div>
        <div>
          <div class="_basket-summ">
                <p>Всього на сумму:
                    <span class="_cart-overall-sum">
                        <?php echo $session['cart.sum']; ?>
                    </span>
                грн.
                </p>
          </div>
          <div class="_basket-buttons">
            <div>
            <div>
                <a class="btn btn-default" href="<?php echo Url::to(['basket/clearcart']); ?>">
                    Очистити
                </a>
            </div>
            <div>
                <a class="btn btn-danger" href="<?php echo Url::to(['basket/order']); ?>">
                    Оформити </a></div>
            </div>
          </div>
        </div><br/><br/>
    <?php endif; ?>
</section>
