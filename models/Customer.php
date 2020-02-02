<?php
/**
 * 代码千万行，注释第一行，编程不规范，同事两行泪
 * User: katherine
 * Date:  2020/1/23 Time: 17:42
 */
namespace app\models;
use yii\db\ActiveRecord;
class Customer extends ActiveRecord{
    // 这是获取客户的订单，由上面我们知道这个是一对多的关联，一个客户有多个订单
    //关联方法
    public function getOrders(){
        //第一个参数:要关联的子模型类名
        // 第二个参数指定 通过子表的customer_id，关联主表的id字段
        return $this->hasMany(Order::className(),['customer_id'=>'id']);
    }
    //获取一个客户的所有订单信息
    public function getCusorders(){
        $customer = Customer::findOne(1);
        //通过在Customer中定义的关联方法（getOrders()）来获取这个客户的所有的订单。
        $order =$customer->orders;
    }

}