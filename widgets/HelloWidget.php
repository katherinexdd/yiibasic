<?php
/**
 * 代码千万行，注释第一行，编程不规范，同事两行泪
 * User: katherine
 * Date:  2020/1/22 Time: 11:06
 */
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class HelloWidget extends Widget{

    public $message;
    public function init(){
        parent::init();
        if($this->message ===null){
            $this->message ='Hello world';
        }
    }
    public function run(){
        return Html::encode($this->message);
    }
}