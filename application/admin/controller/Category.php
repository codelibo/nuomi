<?php
/**
 * Created by PhpStorm.
 * User: liulu
 * Date: 2017/9/21
 * Time: 22:21
 */
namespace app\admin\controller;
use think\Controller;

class Category extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function add()
    {
        return $this->fetch();
    }

    public function save() {
        print_r($_POST);
        print_r(input('post'));
        print_r(request()->post());
    }
}
