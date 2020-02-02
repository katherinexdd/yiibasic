<?php
namespace app\controllers;// app类似当前项目根目录
use yii\web\Controller;
use yii\web\Cookie;
use app\models\Test;
use app\models\upload;
use yii\web\UploadedFile;
use app\rbac\TestRule;
class TestController extends Controller{
    //操作
    public function actionIndex2(){
        //控制器之请求处理
        $request=\YII::$app->request;
        //如果id为空则默认值为20
//        echo $request->get('id',20);
//        echo "<pre/>";
//
//        if($request->isPost){
//            echo 'this is post method!';
//        }else{
//            echo 'this is get method!';
//
//        }
//        echo $request->userIP;
//        echo "<pre/>";
//
//        echo 'hello katherine';
        //响应组件
        $res=\YII::$app->response;
        //$res->statusCode='404';
        //$res->headers->set('pragma','max-age=5');
        $res->headers->remove('pragma');
        //跳转
        $res->headers->add('location','http://www.baidu.com');
        $this->redirect('http://www.baidu.com');
        //文件下载
        $res->headers->add('conent-disposition','attachment; filename="a.jpg"');
    }
    //响应处理
    public function actionIndex3(){
          //var_dump(444);
          //对http头的处理
           $res=\YII::$app->response;
           //$res->statusCode='404';
           $res->headers->add('pragma','no-cache');
           $res->headers->set('pragma','max-age=5');
           $res->headers->remove('pragma','max-age=5');
           //跳转
           $res->headers->add('location','http://www.baidu.com');
           $res->redirect('http://www.baidu.com');
           //文件下载
        //$res->headers->add('content-disposition','attachment; filename="a.jpg"');
        $res->sendFile('./robots.txt');

    }
    public function actionIndex4(){
        //session组件
        $session=\YII::$app->session;
        //如果session没有开启
        $session->open();
        if($session->isActive){
            echo 'session is active';
        }
        $session->set('user','katherine');
        echo "<pre/>";
        echo $session->get('user');

    }
    public function actionWidget(){
        return $this->render('index');
    }
    public function actionTest(){

        //重定向
        //$this->redirect(['hello/index']);

        //回到家目录
        // $this ->goHome();
        //回到上级目录
        //$this ->goBack();
        //刷新当前页面
        //$this ->refresh();
       // return $this->render('index');
        return$this->renderPartial('index');

    }
    public function actionForm(){
        return $this->render('index');
    }
    //添加一个cookie
    public function actionCs(){
        $cookie =new Cookie();
        $cookie->name = 'smister';
        $cookie->expire = time()+3600;
        $cookie->httpOnly=true;//无法通过js读取cookie
        $cookie->value='cookieValue';//cookie的值
        var_dump(\Yii::$app->response->getCookies()->add($cookie));
        $cookie2 =new Cookie([
            'name'=>'katherine',
            'expire'=>time()+3600,
            'httpOnly'=>true,
            'value'=>'cookieValue2'
        ]);
        \Yii::$app->response->getCookies()->add($cookie2);
    }
    //读取cookie
    public function actionCs2(){
        $cookie =\Yii::$app->request->cookies;
        //返归一个cookie对象
        $cookie->get('katherine');
        $cookie->getValue('katherine');
        var_dump($cookie->count());

    }
    public function actionSs(){
        $session = \Yii::$app->session;
        $session->set('smister_name' , 'myname');
        $session->set('smister_array' ,[1,2,3]);
        var_dump($session->get('smister_name'));

    }
    public function actions(){
        return
        [
            'captcha'=>[
                //验证码类
                'class'=>'yii\captcha\CaptchaAction',
                'maxLength'=>4,//生成验证码最大个数
                'minLength'=>4,//生成验证码最小个数
                'width'=>80,//验证码宽度
                'height'=>40,//验证码高度
            ]
        ];
    }
    public function actionIndex(){
          if(\Yii::$app->request->isPost ){
              (new Test())->load(\Yii::$app->request);
              if((new Test())->validate()){
                  echo '验证通过';
              }else{
                  var_dump((new Test())->getErrors());
              }
          }
          $this->render('index',['model'=>(new Test())]);
    }
    //添加缓存
    public function actionCache(){
        \Yii::$app->cache->add('name','smister');
        //添加多个
        \Yii::$app->cache->madd(['name'=>'smister','age'=>10,'web'=>'smister.com']);
        //读取缓存
        var_dump(\Yii::$app->cache->get('name'));
        //读取多个
       var_dump(\Yii::$app->cache->mget(['name','age','web'])) ;
        //判断一个缓存是否存在
        var_dump(\Yii::$app->cache->exists('name'));
        //删除缓存
        //\Yii::$app->cache->delete('name');
        //清除所有缓存
        //\Yii::$app->cache->flush();
    }
    //文件上传
    public function actionUpload(){
        $upload = new upload();
        if(\Yii::$app->request->isPost){
            $upload->image=\yii\web\UploadedFile::getInstance($upload,'image');
            if($upload->upload()){
                echo '上传成功';
            }else{
                var_dump($upload->getErrors());
            }
        }
        return $this->render('upload' , ['model'=> $upload]);

    }
    public function actionRbac(){
        //直接通过Yii::$app调用Components
         $auth =\Yii::$app->authManager;
        // 添加permission
//        $perm=$auth->createPermission('test-add');
//        $perm->description='test add operate';
//        $auth->add($perm);
        //读取一个permission
        //$onePerm=$auth->getPermission('test-add');
        //var_dump($onePerm);
        //更新一个permission
//        $permName='test-add';
//        $perm=$auth->getPermission($permName);
//        $perm->description='i am a new description';
//        $auth->update($permName,$perm);
         // 添加一个Role
//         $role=$auth->createRole('super');
        //         $role->description='super manager';
        //         $auth->add($role);
        //         //更新role
        //         $roleName='super';
        //         $oneRole=$auth->getRole($roleName);
        //         $oneRole->description='update role';
        //         $auth->update($roleName,$oneRole);
        //将一个permission添加到role角色里
//        $oneRole=$auth->getRole('super');//读取一个角色
//        $onePerm=$auth->getPermission('test-add');
//        $auth->addChild($oneRole,$onePerm);
//        //读取role里面所有权限
//        $roleName='super';
//        $perms=$auth->getPermissionsByRole($roleName);
//       //var_dump($perms);
        //判断role里面是否有permission
//        $oneRole=$auth->getRole('super');//读取一个角色
//        $onePerm=$auth->getPermission('test-add');//读取一个权限
//        var_dump($auth->hasChild($oneRole,$onePerm));
       //将一个permission从role中移除
//        $oneRole=$auth->getRole('super');//读取一个角色
//        $onePerm=$auth->getPermission('test-add');//读取一个权限
//        $auth->removeChild($oneRole,$onePerm);
        //用户操作
        //给id为1的用户赋予super角色
//        $oneRole=$auth->getRole('super');
//        $auth->assign($oneRole,1);
        //$auth->revoke($oneRole,1);
        //var_dump($auth->getPermissionsByUser(1));
        //将rule添加到permission中
        //添加一个rule
//       $testRule= new TestRule();
//       $auth->add($testRule);
//        $ruleName='testRule';
//        var_dump($auth->getRule($ruleName));
//        $onePerm = $auth->getPermission('test-add');
//        $onePerm->ruleName = 'testRule';
//        $auth->update($onePerm->name , $onePerm);
        //验证test-add 规则
        $auth -> checkAccess(1 , 'test-add' , ['article' => ['uid'=> 1]]);


    }
    public function actionDemo(){
        dd(233);
    }


}