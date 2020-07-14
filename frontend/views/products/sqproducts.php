<?php
    use yii\helpers\Url;
    use frontend\assets\PagesAsset;
    use frontend\widgets\headers\Headers;
    use frontend\widgets\filter\Filter;
    use frontend\widgets\search\Search;
        use frontend\models\filters\OrderDisplay;
        use yii\widgets\LinkPager;
        PagesAsset::register($this);
    $this->title = 'ukr.doors / товари';

    $this->registerCssFile('css/products.css',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/main.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/ajax.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
 ?>
<?php echo Headers::widget(['categoryId' => $categoryId]); ?>

<section class="_products-content__overall">

  <?php echo Search::widget(); ?>
  <?php echo Filter::widget(['categoryId' => $categoryId]); ?>

    <p class="_page-description">
        <?php echo $pageDescription->description; ?>
    </p>
  <section class="_producrs-container__overall">
    <h4>Вcі види</h4>
    <div class="_pagination">
      <div class="container">
            <?php echo LinkPager::widget(['pagination' => $pages]); ?>
      </div>
    </div>
  <br>
    <?php foreach ($sqproducts as $product): ?>
        <div class="_product-container">
            <?php if($product->discount): ?>
                <p class=" _product_discount "><?php echo $product->discount; ?></p>
            <?php endif; ?>
            <div class="_product-image _product-sq__img">
                <img src="<?php echo $product->img_way_1; ?>" alt="_product-01000"/>
            <?php if($product->img_way_2): ?>
                <img src="<?php echo $product->img_way_2 ; ?>" alt="_product-01000"/>
            <?php endif; ?>

            <?php if(OrderDisplay::ordered($product->id)): ?>
                <p class="_product-ordered" >Замовлено</p>
            <?php endif; ?>

            </div>
            <div class="_product-description">
                <h5><?php echo $product->title; ?></h5>
                <p class="_product-id">id: <span><?php echo $product->id; ?></span></p>
                <p class="_product-available"><?php echo $product->availability; ?></p>
                <p class="_product-price"><?php echo $product->price; ?> грн</p>
                <p class="_product-brand"><?php echo $product->brand; ?></p>
                <a class="_product-basket" href="<?php echo Url::to(['basket/basket']); ?>">
                    Кошик
                    <span  class="_cart-overall-amount">
                        <?php if($_SESSION['cart.qty'])echo $_SESSION['cart.qty']; else echo 0; ?>
                    </span>
                </a>
                <p>
                    <a href="<?php echo Url::to(['basket/add',
                                                     'id' => $product->id
                        ]); ?>"
                            class="btn btn-default _add-cart"
                            data-id="<?php echo $product->id; ?>" >
                        В кошик
                    </a>
                </p>
                <p>
                    <a class="btn btn-default" href="<?php echo Url::to(['product/'.$product->id]); ?>">
                        Детально
                    </a>
                </p>
            </div>
        </div>
    <?php endforeach; ?><br><br>
    <div class="_pagination">
      <div class="container">
            <?php echo LinkPager::widget(['pagination' => $pages]); ?>
      </div>
    </div>
  </section>
</section>
