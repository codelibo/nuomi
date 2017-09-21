<?php
/**
 * Created by PhpStorm.
 * User: liulu
 * Date: 2017/9/21
 * Time: 15:03
 */
namespace app\index\controller;

use think\Controller;

class User extends Controller
{
    // 登陆
    public function login()
    {
        return $this->fetch();
    }

    // 注册
    public function register()
    {
        return $this->fetch();
    }
}
