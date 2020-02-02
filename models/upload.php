<?php
/**
 * 代码千万行，注释第一行，编程不规范，同事两行泪
 * User: katherine
 * Date:  2020/1/27 Time: 20:15
 */
namespace app\models;
use yii\base\Model;
class upload extends Model{
    public $image;
    public function rules(){
        return [
            ['image','file','skipOnEmpty'=>false,'extensions'=>'png,jpg'],
        ];
    }
    public function upload(){
        if($this->validate()){
            $this->image->saveAs('../runtime/'.$this->image->baseName.'.'.$this->image->extensions);
            return true;
        }
        return false;
    }
}


