<?php
    use yii\helpers\Url;
    use frontend\assets\PagesAsset;
    use frontend\widgets\headers\Headers;
    use frontend\models\DoorsWidths;
    use frontend\models\Product_model;
        PagesAsset::register($this);
    $this->title = 'ukr.doors / товари';

    $this->registerCssFile('css/product-model.css',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/main.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/product-model.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
    $this->registerJsFile('@web/js/ajax.js',
        ['depends' => ['yii\bootstrap\BootstrapAsset']]);
?>
    <?php echo Headers::widget(['categoryId' => $productData[0]['category_id']]); ?>
<section class="_product-model">
  <h2><?php echo $productData[0]['title']; ?> </h2>
  <h2>код: <?php echo $productData[0]['id']; ?></h2>
  <div class="_exemplar">
    <hr/>
    <?php if($productData[0]['add_doors']):
        $widthDoors = DoorsWidths::getWidthsByBrand($productData[0]['brand']);
        $widthDefault = $widthDoors[0]['width'];
        $checkedCounter = 0;
        ?>
        <div class="_choose-width">
            <p>Виберіть ширину дверей:</p>
            <?php foreach ($widthDoors as $width): ?>
                <span><?php ++$checkedCounter; echo $width->width; ?>см
                    <input  name="width-door"
                            type="radio"
                            value="<?php echo $width->width; ?>" />
                </span>
            <?php endforeach; ?>
            <p>
                <a href="#"
                    class="btn btn-success _add-cart "
                    data-id="<?php echo $productData[0]['id']; ?>"
                    data-width="<?php echo $widthDefault; ?>">
            Додати в кошик
            </a>
            </p>
        </div>
        <hr/>
        <div class="_choose-alert _midl " style="height:10px;">
            <p class="_lora  _added-alert"></p>
        </div>
        <br>
    <?php endif;
    $orderStatus = Product_model::orderedMessage($productData[0]['id']);
    if(!empty($orderStatus['width']) && $productData[0]['category_id'] == 2){
        echo '<div class="_choose-width">
                <p class="_lora _it">Ви замовили данну модель із шириною: ';
            $counter = 0;
        for ($i = 0; $i <= count($orderStatus['width'])-1; $i++) { $counter = $i;
                echo ++$counter.') '.$orderStatus['width'][$i].'; '; }
                    echo '</p></div><br>';} ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">
          <div class="_ex_slider">
            <div class="_ex_reloader"><i class="fa fa-refresh fa-3x fa-fw"></i></div>
            <button class="_ex_arrow" id="_ex_up"><i class="fa fa-chevron-up" aria-hidden="true"></i></button>
            <button class="_ex_arrow" id="_ex_down"><i class="fa fa-chevron-down" aria-hidden="true"></i></button>
            <?php $counter = 0; $view = 'view';
                foreach ($sliderImages as $element):
                    $counter++; ($counter > 3) ? $view = '_hide': $view; ?>

                    <div class="_ex-slider__element _element_<?php echo $counter; ?> <?php echo $view; ?>">
                        <a href="<?php echo Url::to(['product/'.$element->id]); ?>">
                            <img class="<?php echo $view; ?>"
                                        src="<?php echo $element->img_way_1; ?>"
                                            alt="_slider-<?php echo $counter; ?>"/>
                        </a>
                    </div>
            <?php endforeach; ?>
            <br/>
          </div>
        </div>
        <div class="_exemplar-img__container col-lg-4 col-md-4 col-sm-4 col-xs-6">
        <?php foreach ($productData as $data): ?>
        <div class="_exemplar-img__main">
            <img src="<?php echo $data->img_way_1; ?>" alt="00001"/>
            <?php if($orderStatus['status']) echo $orderStatus['ordered']; ?>
            <br/>
            <p class="_ordered-cart" id="_ordered-<?php echo $data->id; ?>">
                 Добавлено в кошик
            </p>
        </div>
        <br>
        <div class="_exemplar-img__small">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 _ex_left"><i class="fa fa-chevron-left"></i></div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 _ex_right"><i class="fa fa-chevron-right"></i></div>
        </div>
        </div>
        <div class="_exemplar-des__container col-lg-5 col-md-5 col-sm-5 col-xs-6">
            <div class="_exemplar-des">

            <p class="_ex_id">Id: <?php echo $data->id; ?></p>
            <p class="_ex_price">Ціна: <span><?php echo $data->price; ?> </span>грн</p>
            <p class="_ex_parameters"><?php echo $data->brand; ?>   </p>
            <p class="_ex_parameters"><?php echo $data->availability; ?>  </p>
            <p class="_ex_parameters"><?php echo $data->category; ?> </p>
            <p class="_ex_parameters"><?php echo $data->type; ?> </p>
            <p class="_ex_parameters">Колір: <span> <?php echo $data->color; ?></span></p>
            <a href="<?php echo Url::to(['basket/basket']); ?>"
                                        class="btn btn-success _it " >
                                        Перейти в кошик</a>
            <?php if($productData[0]['add_doors']): ?>
            <div class="_additionally">
              <h4>Додатково добавити:</h4>
              <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title">
                      <div><a href="#collapse-1" data-parent="#accordion" data-toggle="collapse">Коробку </a></div>
                    <div>
                    <span id="_doorway-container" class="_add-qty-container">
                        + [ <span id="_doorway-qty" class="_18"></span> ]
                    </span>
                    <span class="_cart-overall-amount">
                    <?php if($_SESSION['cart.qty'])echo $_SESSION['cart.qty']; else echo 0;?>
                    </span>
                    </div>
                    </div>
                  </div>
                  <div class="panel-collapse collapse in" id="collapse-1">
                    <div class="panel-body">
                <button class="btn btn-info "
                        type="button" data-toggle="modal"
                        data-target="#modal-1">
                        підказка -  як замовити
                </button>
                    <div class="modal fade" id="modal-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" type="button" data-dismiss="modal">
                                    <i class="fa fa-close"></i>
                                </button>
                                <h4 class="modal-title">Як замовити коробку</h4>
                            </div>
                            <div class="modal-body">
                            <p>
                                Ви можете замовити окрему стійку для дверної коробки, або сформувати комплект, в залежності від ваших потреб. У випадаючщму меню виберіть необхідний вам розмір (де перше значення це ширина стійки, друге висота в мм). Ціна в дужках випадаючого меню, вказана за одну стійку. Потім можете вибрати чекбокс - "З порогом", або "Сформувати комплект", це буде означити, що ви бажаєте прибати комлект, а не формувати замовлення окремими стійками. Коли вібір зроблено натисніть на кнопку - "В кошик".
                            </p>
                            <p>
                                 Якщо чекбокс - "З порогом" не вибрано, то комлект буде сформовано без порога. Для редагування кількості, або одиниць товару перейдіть у Ваш кошик. Перейти в нього можливо кліком по іконці у правому верхньому кутку веб-броузера, із надписом - "У кошику".
                            </p>
                            <br>
                            <h4 class="modal-title">Як замовити шалівку та доборні полоски</h4>
                            <br>
                            <p>
                                Шалівка та добори замовляються окремо по одній одиниці. Зазвичай, щоб обшалювати один дверний блок повністю з двох сторін, потрібно 5шт наличників. Тому добавте один добор або шалівку в кошик, а далі із кошика сформуйте необхідну Вам кількість та оформіть замовлення.
                            </p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary"
                                    type="button"
                                    data-dismiss="modal">
                                    Зрозуміло
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                      <p>Виберіть розмір коробки:</p>
            <form >
                <select id="_param_doorway">
                            <?php foreach ($addDoors as $add):
                                if($add->category == 1): ?>
                                    <option>
                                        <?php echo $add->width.'x'
                                                .$add->height.' ( '
                                                .$add->price; ?> )грн.
                                    </option>
                            <?php endif; endforeach; ?>
                </select>
                    <div class="_filters">
                          <label>
                            <input class="cb pristine" id="_doorstep" value="0"  type="checkbox"/>
                            <span>З порогом</span>
                          </label>
                          <label>
                            <input class="cb pristine" id="_complect" value="0"  type="checkbox"/>
                            <span>Сформувати комплект</span>
                          </label>
                    </div>
                        <input type="hidden" name="_id_product" value="<?php echo$productData[0]['id']; ?>">
                        <input id="form-token" type="hidden"
                            name="<?php echo Yii::$app->request->csrfParam; ?>"
                                value="<?php echo Yii::$app->request->csrfToken; ?>">
                    <button class="btn btn-primary" id="doorway"> В кошик </button>
            </form>
                </div>
                </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title">
                      <div>
                         <a href="#collapse-2" data-parent="#accordion" data-toggle="collapse">
                            Наличник
                          </a>
                      </div>
                      <div>
                    <span id="_jamb-container" class="_add-qty-container">
                        + [ <span id="_jamb-qty" class="_18"></span> ]
                    </span>
                    <span class="_cart-overall-amount">
                    <?php if($_SESSION['cart.qty'])echo $_SESSION['cart.qty']; else echo 0;?>
                    </span>
                      </div>
                    </div>
                  </div>
                  <div class="panel-collapse collapse" id="collapse-2">
                    <div class="panel-body">
                        <?php foreach ($addDoors as $add):
                            if($add->category == 2): ?>
                            <p>Ціна <?php echo $add->price; ?>  грн за 1шт.</p>
                        <?php endif; endforeach; ?><br>
                        <a href="<?php echo Url::to(['basket/jambadd',
                                                     'id' => $productData[0]['id']
                            ]); ?>"
                            id="_add_jamb"
                            class="btn btn-success "
                            data-id="<?php echo $productData[0]['id']; ?>"
                            >
                            В кошик
                        </a>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="panel-title">
                    <div><a href="#collapse-3" data-parent="#accordion" data-toggle="collapse">Добор </a></div>
                        <div>
                        <span id="_board-container" class="_add-qty-container">
                            + [ <span id="_board-qty" class="_18"></span> ]
                        </span>
                    <span class="_cart-overall-amount">
                    <?php if($_SESSION['cart.qty'])echo $_SESSION['cart.qty']; else echo 0;?>
                    </span>
                        </div>
                    </div>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-3">
                    <div class="panel-body">
                    <p>Ціна  вказана за 1 шт.</p>
                      <p>Виберіть розмір планки:</p>
                    <form>
                        <select id="_board-param">
                        <?php foreach ($addDoors as $add):
                            if($add->category == 3): ?>
                            <option>
                                <?php echo $add->width.'x'
                                            .$add->height.' ('
                                            .$add->price.'грн)'; ?>
                            </option>
                                <?php endif; endforeach; ?>
                        </select><br>
                    <button class="btn btn-primary" type="submit" id="_add_board">В кошик</button>
                    </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <?php endif; ?>
            <p class="_ex_des"><?php echo $data->description_1; ?></p>
            <p class="_ex_des"><?php echo $data->description_2; ?></p>
        <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="_choose-width">
        <p>
        <a href="<?php echo Url::to(['basket/add',
                                         'id' => $productData[0]['id']
            ]); ?>"
                class="btn btn-success _add-cart"
                data-id="<?php echo $productData[0]['id']; ?>"
                data-width="<?php  (isset($widthDefault)) ? $widthDefault: $widthDefault = 0;
                                    echo $widthDefault; ?> ">
            Додати в кошик
        </a>
        </p>
      </div>
    </div>
    <hr/>
  </div><br/>
</section>
