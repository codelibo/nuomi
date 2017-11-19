<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function welcome()
    {
        \phpmailer\Email::send("813937382@qq.com","title","phpmailer");
//        return "发送邮件成功";
//        return $this->fetch();
        return "欢迎来到o2o主后台首页！";
    }

    public function test() {
        return \Map::getLngLat("北京昌平沙河地铁");
    }

    public function map() {
        return \Map::staticimage("北京昌平沙河地铁");
    }
}
