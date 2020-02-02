<?php
/**
 * 代码千万行，注释第一行，编程不规范，同事两行泪
 * User: katherine
 * Date:  2020/1/27 Time: 17:11
 */
namespace app\models;
use yii\base\Model;

class Test extends Model{
    public $verifyCode;
    public function rules(){
        return [
          //captchaAction是生成验证码的控制器
            ['verifyCode','captcha','captchaAction'=>'test/captcha','message'=>'验证码不正确'],
        ];
    }
}
