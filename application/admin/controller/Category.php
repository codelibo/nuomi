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
    private $cate;
    public function _initialize() {
        $this->cate = model("Category");
    }

    // 分类列表页
    public function index()
    {
        $parent_id = input("get.parent_id", 0, "intval");
        $categorys = $this->cate->getFirstCategorys($parent_id);
        return $this->fetch('', [
            'categorys' => $categorys
        ]);
    }

    public function add()
    {
        $categorys = $this->cate->getNormalFirstCategory();

        return $this->fetch('', [
            'categorys' => $categorys
        ]);
    }

    public function save() {
//        print_r($_POST);
//        print_r(input('post.'));die;
//        print_r(request()->post());
        $data = input('post.');
        // 实例化验证器
        $validate = validate('Category');
        if (!$validate->scene('add')->check($data)) {
            $this->error($validate->getError());
        }
        // 把$data提交到model层
        $res = $this->cate->add($data);
        if ($res) {
            $this->success("新增成功");
        } else {
            $this->error("新增失败");
        }

    }
}
