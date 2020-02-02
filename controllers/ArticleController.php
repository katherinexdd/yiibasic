<?php
/**
 * 代码千万行，注释第一行，编程不规范，同事两行泪
 * User: katherine
 * Date:  2020/1/22 Time: 17:42
 */
namespace app\controllers;
use yii\web\Controller;
use app\models\Article;
use yii\data\Pagination;
use yii\web\Cookie;
class ArticleController extends Controller{
    public function actionIndex(){
          $article = Article::find();
          $pagination = new Pagination(['totalCount'=>$article->count(),'pageSize'=>10]);
          //返回的数据是对象
          $data =$article->offset($pagination->offset)->limit($pagination->limit)->asArray()->all();
          return $this->render('index',['data'=>$data,'pagination'=>$pagination]);
    }
    public function actionAdd(){
        $model =new Article();//article模型
        if(\Yii::$app->request->isPost && $model->load(\Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['index']);
        }
        return $this->render('add',['model'=>$model]);
    }
    public function actionEdit($id){
        $id = (int)$id;
        if($id > 0 && ($model = Article::findOne($id))){
            // $model->load()加载参数
            if(\Yii::$app->request->isPost && $model -> load(\Yii::$app->request->post()) && $model->save()){
                return $this->redirect(['index']);
            }

            return $this->render('edit' , ['model' => $model]);
        }

        return $this->redirect(['index']);
    }


    public function actionDelete($id){
        $id = (int)$id;
        if($id > 0){
            Article::findOne($id)->delete();
        }
        return $this->redirect(['index']);

    }


}