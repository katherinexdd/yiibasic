<?php
/**
 * 代码千万行，注释第一行，编程不规范，同事两行泪
 * User: katherine
 * Date:  2020/1/27 Time: 14:34
 */
use yii\helpers\Url;
?>
<p style="text-align: right;">
    <a href="<?=Url::to(['add'])?>" class="btn btn-primary">添加</a>
</p>
<table class="table table-hover">
    <thead>
         <tr>
        <th>id</th>
        <th>标题</th>
        <th>浏览次数</th>
        <th>状态</th>
        <th>添加时间</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $v){?>
       <tr>
           <td><?=$v['id']?></td>
           <td><?=$v['title']?></td>
           <td><?=$v['count']?></td>
           <td><?=($v['stauts'] ==1 ? '是' :'否')?></td>
           <td><?=date('Y-m-d H:i:s',$v['date'])?></td>
           <td>
               <a href="<?=Url::to(['edit','id'=>$v['id']])?>">编辑</a> |
               <a href="<?=Url::to(['delete','id'=>$v['id']])?>">删除</a>
           </td>
       </tr>
    <?php }?>

    </tbody>
</table>
<div style="float:right">
    <?=yii\widgets\LinkPager::widget([
        'pagination'=>$pagination,
        'options'=>[
            'class'=>'patination',
        ]
    ]);
    ?>
</div>
