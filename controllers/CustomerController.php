<?php
/**
 * 代码千万行，注释第一行，编程不规范，同事两行泪
 * User: katherine
 * Date:  2020/1/23 Time: 17:42
 */
namespace app\controllers;
use yii\web\Controller;
use app\models\Customer;
use yii\db\Query;
class CustomerController extends Controller{
   public function actionDb(){
       //$customer =new Customer();
       // 插入一条数据
       //$customer->name ='katherine';
       //$customer->save();
//       \Yii::$app->db->createCommand('INSERT INTO `customer` (`name`) VALUES (:name)', [
//           ':name' => 'Qiang',
//       ])->execute();
       //查询数据
       Customer::find()->where(['id'=>123])->one();
       // 取回所有活跃客户并以他们的 ID 排序：
       Customer::find()->where(['active '=>1])->orderBy('id DESC')->all();
       //取回活跃客户数量
       Customer::find()->where(['active '=>1])->count();
   }
   // 关联方法  为customer类声明关联方法 getXyz,通过xyz去调用这个关联名
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['customer_id' => 'id']);
    }
    public function actionTest(){
        $customer = Customer::findOne(123);
        $orders = $customer->orders;
        var_dump($orders);
    }
    //查询构造器
    public function actionQuery(){
        $query = new Query();
        $rows = $query->select(['id','name'])->from('customer')->where(['name'=>'Qiang'])->limit(10)->all();
        $row1 = $query->select(['name AS user_id,email'])->from('customer')->where(['name'=>'katherine'])->limit(10)->all();
        $row1 = $query->select(['name AS user_id,email'])->distinct();
        var_dump($rows);
    }

}