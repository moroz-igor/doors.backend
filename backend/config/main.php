<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'uk',
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'enableCsrfValidation' => false,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'ukr.doors.admin' => 'site/login',
                'sections' => 'sections/index',
                'category' => 'category/index',
                'logo' => 'logo/index',
                'actions' => 'actions/index',
                'isotopefilters' => 'isotopefilters/index',
                'isotope' => 'isotope/index',
                'about-shop' => 'about-shop/index',
                'partners' => 'partners/index',
                //'page_description' => 'page-description/index',
                'filters' => 'filters/index',
                'products' => 'products/index',
                'category-products/<category_id:\d+>' => 'products/category-products',
                'category-product-model/<category_id:\d+>' => 'product-model/category-product-model',
                'edit-price/<category_id:\d+>' => 'products/edit-price',
                'doors_widths' => 'doors_widths/index',
                //'add_doors' => 'add-oors/index',
                'product_model' => 'product_model/index',
                'contacts' => 'contacts/index',
                'user' => 'user/index',
                'order' => 'order/index',
                'order-items' => 'order-items/index',
                'order-items/<id:\d+>' => 'order-items/single',
            ],
        ],

    ],
    'params' => $params,
];
