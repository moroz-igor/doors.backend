<?php
    use yii\helpers\Url;
    use frontend\assets\PagesAsset;
    use frontend\widgets\headers\Headers;
    use frontend\widgets\search\Search;
    use frontend\widgets\filter\Filter;
        use frontend\models\filters\OrderDisplay;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

        PagesAsset::register($this);
    $this->title = 'ukr.doors / товари';
    $this->registerCssFile('css/products.css',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/main.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/ajax.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);

    (isset($categoryId)) ? $categoryNum = $categoryId : $categoryNum;
                        echo Headers::widget(['categoryId' => $categoryNum]);
                        echo Search::widget();
                        echo Filter::widget(['categoryId' => $categoryNum]); ?>

<section class="_products-content__overall">
    <section class="_producrs-container__overall">
    <br>
    <?php foreach ($products as $door): ?>
    <div class="_product-container">
        <?php if($door->discount): ?>
          <p class=" _product_discount "> - <?php echo $door->discount; ?> грн</p>
        <?php endif; ?>
        <div class="_product-image _product-sq__img">
            <img src="<?php echo $door->img_way_1; ?>" alt="_product-01000"/>
        <?php if($door->img_way_2): ?>
            <img src="<?php echo $door->img_way_2 ; ?>" alt="_product-01000"/>
        <?php endif; ?>

        <?php if(OrderDisplay::ordered($door->id)): ?>
            <p class="_product-ordered" >Замовлено</p>
        <?php endif; ?>

          </div>
          <div class="_product-description">
            <h5><?php echo $door->title; ?></h5>
            <p class="_product-id">id: <span><?php echo $door->id; ?></span></p>
            <p class="_product-available"><?php echo $door->availability; ?></p>
            <p class="_product-price"><?php echo $door->price; ?> грн</p>
            <p class="_product-brand"><?php echo $door->brand; ?></p>
            <a class="_product-basket" href="<?php echo Url::to(['basket/basket']); ?>">
                Кошик
                <span  class="_cart-overall-amount">
                    <?php if($_SESSION['cart.qty'])echo $_SESSION['cart.qty']; else echo 0; ?>
                </span>

            </a>
            <?php if($door->category_id != INTERIOR_DOORS): ?>
            <p>
                <a href="<?php echo Url::to(['basket/add',
                                                   'id' => $door->id
                    ]); ?>"
                        class="btn btn-success _add-cart"
                        data-id="<?php echo $door->id; ?>"
                        data-width="<?php  (isset($widthDefault)) ? $widthDefault: $widthDefault = 0;
                                            echo $widthDefault; ?> ">
                        В кошик
                </a>
            </p>
            <p>
                <a class="btn btn-default" href="<?php echo Url::to(['product/'.$door->id]); ?>">
                    Детально
                </a>
             </p>
            <?php endif; ?>
            <?php if($door->category_id == INTERIOR_DOORS): ?>
                <p>
                <a class="btn btn-success" href="<?php echo Url::to(['product/'.$door->id]); ?>">
                    Замовити
                </a>
              </p>
            <?php endif; ?>

          </div>
    </div>
<?php endforeach; ?><br><br>
        </div>
      </div>
    </section>
</section>
