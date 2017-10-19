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
        if (!request()->isPost()) {
            $this->error("请求失败");
        }
        $data = input('post.');
        // 实例化验证器
        $validate = validate('Category');
        if (!$validate->scene('add')->check($data)) {
            $this->error($validate->getError());
        }
        if (!empty($data['id'])) {
            return $this->update($data);
        }
        // 把$data提交到model层
        $res = $this->cate->add($data);
        if ($res) {
            $this->success("新增成功");
        } else {
            $this->error("新增失败");
        }
    }

    public function edit($id = 0) {
//        echo $id;
        if (intval($id) < 0) {
            $this->error('参数不合法');
        }
        $category = $this->cate->get($id);
        $categorys = $this->cate->getNormalFirstCategory();
        return $this->fetch('', [
            'categorys' => $categorys,
            'category'  => $category
        ]);
    }

    public function update($data) {
        $res = $this->cate->save($data, ['id' => intval($data['id'])]);
        if ($res) {
            $this->success("更新成功");
        } else {
            $this->error("更新失败");
        }
    }

    public function listorder($id, $listorder) {
        $res = $this->cate->save(['listorder' => $listorder], ['id' => $id]);
        if ($res) {
            $this->result($_SERVER['HTTP_REFERER'], 1, '更新成功');
        } else {
            $this->result($_SERVER['HTTP_REFERER'], 0, '更新失败');
        }
    }
}
