<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\modules\admin\models\Users;

class UsersController extends AppAdminController
{


    public function behaviors()
    {   
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                
                ],
        ];
    }

    public function actionIndex()
    {    
        $model = new Users();
       
        if ($model->load(\Yii::$app->request->post())) {
            $colums = ['role'=>$model->role];
            $id = $model->id;
            $role1 = $model->role;
            Yii::$app->db->createCommand()->update('users', ['role'=>$role1],['id'=>$id])->execute();
            $this->refresh();
        }
        $role = '20';
        $users = Users::find()->where(['role'=>$role])->all();
        return $this->render('index',['users'=>$users,'model'=>$model]);
    }

    public function actionAdmins()
    {    
        $model = new Users();
        
        if ($model->load(\Yii::$app->request->post())) {
            $colums = ['role'=>$model->role];
            $id = $model->id;
            $role1 = $model->role;
            Yii::$app->db->createCommand()->update('users', ['role'=>$role1],['id'=>$id])->execute();
            $this->refresh();
        }
        $role = '10';
        $users = Users::find()->where(['role'=>$role])->all();
        return $this->render('index',['users'=>$users,'model'=>$model]);
    }
}