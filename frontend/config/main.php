<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/index',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'class'=>'frontend\components\LangUrlManager',
            'rules'=>[
                '/' => 'site/index',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ]
        ],
        'request' => [
            'class' => 'frontend\components\LangRequest'
        ],
        'language'=>'ru-RU',
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'vkontakte' => [
                    'class' => 'yii\authclient\clients\VKontakte',
                    'clientId' => '4928013',
                    'clientSecret' => 'hoojZtNmK1gbQneHG2D1',
                    'scope' => 'email',
                    'viewOptions' => [
                        'popupWidth' => '980',
                        'popupHeight' => '650,'
                    ],
                ],
                'facebook' => [
                    'class' => 'yii\authclient\clients\Facebook',
                    'clientId' => '864318676954960',
                    'clientSecret' => '35617de998d531ccd84dbdb503cc06db',
                    'viewOptions' => [
                        'popupWidth' => '980',
                        'popupHeight' => '650,'
                    ],
                ],
                'twitter' => [
                    'class' => 'yii\authclient\clients\Twitter',
                    'consumerKey' => 'w3Rrxc2EBdl546qihY0Ts2mbf',
                    'consumerSecret' => 'pUd4ZMiBejdENqcXP477AHDz0oUFc8losTtDk2ISxHfcQN6d6O',
                ],
            ],
        ],
    ],
    'params' => $params,
];
