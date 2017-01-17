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
    'controllerNamespace' => 'frontend\controllers'
    ,
    'components' => [
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@frontend/views' => '@frontend/themes/adminlte'
                ],
            ],
        ],
        'authClientCollection' => [
            'class' => 'yii\authclient\Collection',
            'clients' => [
                'facebook' => [
                              'class' => 'yii\authclient\clients\Facebook',
                              'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
                              'clientId' => '618940358297597',
                              'clientSecret' => 'a35bbc7038cb00e56b986afcde3a3e90',
                        ],
                'google' => [
                            'class' => 'yii\authclient\clients\Google',
                            'clientId' => '1065561444382-qmsv9ehfa5hihe2t0bdr0ojtktpam3tt.apps.googleusercontent.com',
                            'clientSecret' => 'zNlHW6YVK4nl1lEEQtJvGlMq',
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
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
        
        /*'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => true,
            'rules' => [
            ],
        ],*/
        
    ],
    'params' => $params,
];
