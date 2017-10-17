<?php
/**
 * Created by PhpStorm.
 * User: liulu
 * Date: 2017/10/11
 * Time: 23:18
 */
namespace app\admin\validate;
use think\Validate;
class Category extends Validate {
    protected $rule = [
        ['name', 'require|max:10', '分类名不能为空|分类名长度不能超过10个字符'],
        ['parent_id', 'number'],
        ['id', 'number'],
        ['status', 'number|in:-1,0,1', '状态必须是数字|状态范围不合法'],

    ];
    /*也可以写成
    protected $rule =   [
        'name'        => 'require|max:10',
        'parent_id'   => 'number',
        'id'          => 'number',
        'status'      => 'number|in:-1,0,1'
    ];

    protected $message  =   [
        'name.require'     => '名称必须',
        'name.max'         => '名称最多不能超过10个字符',
        'parent_id.number' => '分类ID必须是数字',
        'id.number'        => 'ID必须是数字',
        'status.number'    => '状态必须是数字',
        'status.in'        => '状态只是数字-1，0，1'
    ];*/

    /*场景设置*/
    protected $scene = [
        'add' => ['name', 'parent_id', 'id'], // 添加时只需要验证name和parent_id字段
        'listorder' => ['id', 'listorder'], // 排序
    ];
}