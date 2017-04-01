<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Singup;
use app\models\ProfileForm;
use app\models\Historyoforders;
use app\models\Orders;
use app\models\Editprofile;
use app\models\EditpasswordForm;

class ProfileController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

 
    public function actionIndex()
    {   $model = new ProfileForm;
        if ($model->load(Yii::$app->request->post())) {
           if ($model->validate()) {
               $data = Yii::$app->request->post('ProfileForm');
               $user = Yii::$app->user->identity;
               $user->name = $data['name'];
               $user->surname = $data['surname'];
               $user->patronymic = $data['patronymic'];
               $user->phone = $data['phone'];
           }

           if ($user->save() && $model->validate()) {
                   Yii::$app->session->setFlash('success','Данные приняты');
               }else{
                Yii::$app->session->setFlash('error','Ошибка');
               }
               return $this->refresh();
        }


        $user = Yii::$app->user->identity;
       if ($user) {
           return $this->render('profile',['user'=>$user,'model'=>$model]);
       }else{
        return $this->goHome();
       }   



    }
   
    public function actionOrders(){
      $id = Yii::$app->user->id;
      $orderss = new Orders;
      $orders = $orderss->getOrders($id);
        return $this->render('orders',['orders'=>$orders]);
    }

     public function actionEditpassword(){
      $model = new EditpasswordForm();

       if ($model->load(Yii::$app->request->post())) {
        $savepass = $model->editPassword($model->password);
        
          if ($savepass) {
            Yii::$app->session->setFlash('successpas','Данные приняты');

          }else{
            Yii::$app->session->setFlash('errorpas','Ошибка');
          }
          return $this->refresh();
    }
      
      
        return $this->render('editpassword',['model'=>$model]);
    }

}
