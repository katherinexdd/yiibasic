<?php

use app\assets\AppAsset;
AppAsset::register($this);

use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="zh-CN">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>smister后台登录</title>
        <link rel="stylesheet" href="./css/login.css" />
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div id="login_box">
        <h1>smister后台登录</h1>
        <?=Html::beginForm('' , 'post' , ['id' => 'form']);?>
        <ul>
            <li class="text">用户名：<?=Html::activeInput('text' , $model , 'username' , ['class' => 'input' , 'id'=> 'loginform-username'])?></li>
            <li class="tip">&nbsp;<?=Html::error($model , 'username' , ['class' => 'error']);?></li>
            <li>密　码：<?=Html::activeInput('password' , $model , 'password' , ['class' => 'input' , 'id' => 'password'])?></li>
            <li class="tip">&nbsp;<?=Html::error($model , 'password' , ['class' => 'error']);?></li>
            <li style="position:relative;">验证码：<?=yii\captcha\Captcha::widget([
                    'model' => $model,
                    'attribute' => 'verifyCode',
                    'captchaAction' => 'login/captcha',
                    'template' => '{input}{image}',
                    'options' => [
                        'class' => 'input verifycode',
                        'id' => 'verifyCode' ,
                    ],'imageOptions' => [
                        'class' => 'imagecode',
                        'id' => 'verifyCode-image' ,
                        'alt' => '点击更换验证码'
                    ]
                ]);
                ?></li>
            <li class="tip">&nbsp;<?=Html::error($model , 'verifyCode' , ['class' => 'error']);?></li>
            <li class="tip remember"><input type="checkbox" id="remember" name="Login[remeber]" value="1"><label for="remember">&nbsp;保持登录状态</label></li>
        </ul>
        <div>
            <?=Html::submitButton('登录' , ['id' => 'login_submit']);?>
        </div>
    </div>
    <?=Html::endForm();?>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>