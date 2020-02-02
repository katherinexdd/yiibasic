<?php
/**
 * 代码千万行，注释第一行，编程不规范，同事两行泪
 * User: katherine
 * Date:  2020/1/28 Time: 15:50
 */
namespace app\models;
use yii\db\ActiveRecord;
class Order extends ActiveRecord{
    // 获取订单所属用户
    public function getCustomer()
    {
        //同样第一个参数指定关联的子表模型类名
        // 第二个参数：键：所关联模型中的属性，值为当前模型中的属性
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }
    // 获取订单中所有图书
    public function getBooks()
    {
        //同样第一个参数指定关联的子表模型类名
        //
        return $this->hasMany(Book::className(), ['id' => 'book_id']);
    }
}
