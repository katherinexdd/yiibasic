<?php
/**
 * 代码千万行，注释第一行，编程不规范，同事两行泪
 * User: katherine
 * Date:  2020/1/28 Time: 15:51
 */
namespace app\models;
use yii\db\ActiveRecord;
class Book extends ActiveRecord{
    // 获取图书的作者
    public function getAuthor()
    {
        //同样第一个参数指定关联的子表模型类名
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }
}