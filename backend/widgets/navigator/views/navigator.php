<?php
use yii\helpers\Html;
use yii\helpers\Url;
 ?>
        <div class="container _nav-container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group pull-left">
                        <button class="btn  dropdown-toggle _color-1 _nav-button" data-toggle="dropdown">
                            LAYUOTS <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="<?php echo Url::to(['/logo']); ?>">logo</a></li>
                            <li><a href="<?php echo Url::to(['/sections']); ?>">sections</a></li>
                            <li><a href="<?php echo Url::to(['/category']); ?>">category</a></li>
                            <li><a href="<?php echo Url::to(['/footer']); ?>">footer</a></li>
                        </ul>
                    </div>
                    <div class="btn-group pull-left">
                        <button class="btn dropdown-toggle _color-2 _nav-button" data-toggle="dropdown">
                            MAIN <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="<?php echo Url::to(['/cube']); ?>">cube</a></li>
                            <li><a href="<?php echo Url::to(['/actions']); ?>">actions</a></li>
                            <li><a href="<?php echo Url::to(['/isotopefilters']); ?>">isotope_filters</a></li>
                            <li><a href="<?php echo Url::to(['/isotope']); ?>">isotope</a></li>
                            <li><a href="<?php echo Url::to(['/about-shop']); ?>">about_shop</a></li>
                            <li><a href="<?php echo Url::to(['/partners']); ?>">partners</a></li>
                        </ul>
                    </div>
                    <div class="btn-group pull-left">
                        <button class="btn dropdown-toggle _color-3 _nav-button" data-toggle="dropdown">
                            PRODUCTS <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="<?php echo Url::to(['/page-description']); ?>">page_description</a></li>
                            <li><a href="<?php echo Url::to(['/filters']); ?>">filters</a></li>
                            <li><a href="<?php echo Url::to(['/products']); ?>">products</a></li>
                        </ul>
                    </div>
                    <div class="btn-group pull-left">
                        <button class="btn dropdown-toggle _color-4 _nav-button" data-toggle="dropdown">
                            EXEMPLAR <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="<?php echo Url::to(['/doors-widths']); ?>">doors_widths</a></li>
                            <li><a href="<?php echo Url::to(['/add-doors']); ?>">add_doors</a></li>
                            <li><a href="<?php echo Url::to(['/product-model']); ?>">product_model</a></li>
                        </ul>
                    </div>
                    <div class="btn-group pull-left">
                        <button class="btn dropdown-toggle _color-5 _nav-button" data-toggle="dropdown">
                            CONTACTS <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="<?php echo Url::to(['/contacts']); ?>">contacts</a></li>
                        </ul>
                    </div>
                    <div class="btn-group pull-left">
                        <button class="btn dropdown-toggle _color-6 _nav-button" data-toggle="dropdown">
                            USERS <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="<?php echo Url::to(['/user']); ?>">user</a></li>
                            <li><a href="<?php echo Url::to(['/order']); ?>">order</a></li>
                            <li><a href="<?php echo Url::to(['/order-items']); ?>">order_items</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
