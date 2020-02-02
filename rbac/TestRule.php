<?php
/**
 * 代码千万行，注释第一行，编程不规范，同事两行泪
 * User: katherine
 * Date:  2020/1/28 Time: 12:15
 */
namespace app\rbac;
use yii\rbac\Rule;

class TestRule extends Rule{
    public $name = 'testRule'; //name 是必须的,也是Rule 的名称
    //这里规定3 个参数
    //$user_id 用户的id
    //$item Role 或者Permission
    //$params 传进来的数据
    //如果文章不属于自己的则没有权限修改
    public function execute($user_id , $item , $params ){
        return isset($params['article']) ? $params['article']['uid'] == $user_id : false;
    }


}
