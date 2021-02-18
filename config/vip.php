<?php
/**
 * 唯品会开放平台配置文档
 */
return [

    'default' => 'app',

    'connections' => [
        'app' => [
            'app_key'       => env('VIP_APP_KEY', 'APP KEY'),
            'app_secret'    => env('VIP_APP_SECRET', 'APP SECRET'),
            'format' => 'json',
        ]
    ]
];