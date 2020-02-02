<?php
/**
 * 代码千万行，注释第一行，编程不规范，同事两行泪
 * User: katherine
 * Date:  2020/1/22 Time: 10:59
 */
use yii\helpers\Html;
use yii\captcha\Captcha;
?>
<?=Html::beginForm("" , 'post' , ['class' => 'forms'] )?>
<?=Captcha::widget([
    'model' => $model , //Model
    'attribute' => 'verifyCode', //字段
    'captchaAction' => 'test/captcha', //验证码的action 与Model 是对应的
    'template' => '{input}{image}', //模板, 可以自定义
    'options' => [ //input 的Html 属性配置
        'class' => 'input verifycode',
        'id' => 'verifyCode'
    ],
    'imageOptions' => [//image 的Html 属性配置
        'class' => 'imagecode',
        'alt' => '点击图片刷新'
    ]
]);
?>
<?=Html::submitButton("提交" , ['class' => 'submit'])?>
<?=Html::endForm();?>


