<?php
use yii\helpers\Html;
?>
<?=Html::beginForm('' , 'post' , ['enctype' => 'multipart/form-data'])?>
<?=Html::activeFileInput($model , 'image' , ['class' => 'upload'])?>
<?=Html::submitButton('提交' , ['class' => 'btn btn-primary']);?>
<?=Html::endForm();?>

