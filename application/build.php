<?php
/**
 * Created by PhpStorm.
 * User: liulu
 * Date: 2017/9/14
 * Time: 下午5:35
 */
return [
    // 生成应用公共文件
    '__file__' => ['common.php', 'config.php', 'database.php'],

    // 定义demo模块的自动生成 （按照实际定义的文件名生成）
    /*
    'demo'     => [
        '__file__'   => ['common.php'],
        '__dir__'    => ['behavior', 'controller', 'model', 'view'],
        'controller' => ['Index', 'Test', 'UserType'],
        'model'      => ['User', 'UserType'],
        'view'       => ['index/index'],
    ],
    */
    // 其他更多的模块定义
    'admin' => [
        '__dir__'    => ['controller', 'view'],
        'controller' => ['Index'],
        'view'       => ['index/index'],
    ],

    'bis'=>[
        '__dir__'    => ['controller', 'model', 'view'],
        'controller' => ['Register', 'Login'],
    ],

    'home' => [
        '__dir__' => ['controller', 'view'],
    ]
];