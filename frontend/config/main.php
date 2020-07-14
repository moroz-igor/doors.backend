<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'uk',
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
                'enableCsrfValidation' => true,
        ],
        'user' => [
            'identityClass' => 'frontend\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
                'contacts' => 'contacts/contacts',
                'products/<category:\d+>' => 'products/products',
                'sqproducts/<category:\d+>' => 'products/sqproducts',
                'product/<id:\d+>' => 'product_model/product_model',
                'basket' => 'basket/basket',
                'order' => 'basket/order',
                'register' => 'user/register',
                'login' => 'user/login',
                'logout' => 'user/logout',
                'edit' => 'user/edit',
                'send-email' => 'user/send-email',
                'user-order/<order_id:\d+>' => 'user/user-order',
            ],
        ],
        'mailer' => [
                'class' => 'yii\swiftmailer\Mailer',
                'useFileTransport' => false,
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => 'smtp.ukr.net',
                    'username' => 'vin.ukr.doors@ukr.net',
                    'password' => '0bKhpbUKyGJBvl8u',
                    'port' => '465',
                    'encryption' => 'ssl',
            ],
        ],
    ],
    'params' => $params,
    'aliases' => [
        '@img' =>'/http://doors/product_model/img/doors/d-00001/00001_1.jpg',
    ]
];
