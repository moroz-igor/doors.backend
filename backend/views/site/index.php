<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\widgets\navigator\WidgetNavigator;

$this->title = '<h2>Congratulations! You\'re admin!</h2>';
echo WidgetNavigator::widget();
?>
<div class="site-index">
    <div class="jumbotron">
        <h2><?php echo $this->title; ?></h2>
        <p>Ви маєте доступ до керування контентом та вмістом бази данних!</p>
        <h2>Структура бази данних.</h2><br>
        <div class="container ">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <div class="_struct _color-1">
                        <h4>LAYUOTS</h4>
                        <div class="_struct-text">
                            <ul>
                                <li><a href="<?php echo Url::to(['/logo']); ?>">logo</a></li>
                                <li><a href="<?php echo Url::to(['/sections']); ?>">sections</a></li>
                                <li><a href="<?php echo Url::to(['/category']); ?>">category</a></li>
                                <li><a href="<?php echo Url::to(['/footer']); ?>">footer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <div class="_struct _color-2">
                        <h4>MAIN</h4>
                        <div class="_struct-text">
                            <ul>
                                <li><a href="<?php echo Url::to(['/cube']); ?>">cube</a></li>
                                <li><a href="<?php echo Url::to(['/actions']); ?>">actions</a></li>
                                <li><a href="<?php echo Url::to(['/isotopefilters']); ?>">isotope_filters</a></li>
                                <li><a href="<?php echo Url::to(['/isotope']); ?>">isotope</a></li>
                                <li><a href="<?php echo Url::to(['/about-shop']); ?>">about_shop</a></li>
                                <li><a href="<?php echo Url::to(['/partners']); ?>">partners</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <div class="_struct _color-3">
                        <h4>PRODUCTS</h4>
                        <div class="_struct-text">
                            <ul>
                                <li><a href="<?php echo Url::to(['/page-description']); ?>">page_description</a></li>
                                <li><a href="<?php echo Url::to(['/filters']); ?>">filters</a></li>
                                <li><a href="<?php echo Url::to(['/products']); ?>">products</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <div class="_struct _color-4">
                        <h4>EXEMPLAR</h4>
                        <div class="_struct-text">
                        <ul>
                            <li><a href="<?php echo Url::to(['/doors-widths']); ?>">doors_widths</a></li>
                            <li><a href="<?php echo Url::to(['/add-doors']); ?>">add_doors</a></li>
                            <li><a href="<?php echo Url::to(['/product-model']); ?>">product_model</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <div class="_struct _color-5">
                        <h4>CONTACTS</h4>
                        <div class="_struct-text">
                        <ul>
                            <li><a href="<?php echo Url::to(['/contacts']); ?>">contacts</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                    <div class="_struct _color-6">
                        <h4>USERS</h4>
                        <div class="_struct-text">
                        <ul>
                            <li><a href="<?php echo Url::to(['/user']); ?>">user</a></li>
                            <li><a href="<?php echo Url::to(['/order']); ?>">order</a></li>
                            <li><a href="<?php echo Url::to(['/order-items']); ?>">order_items</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
