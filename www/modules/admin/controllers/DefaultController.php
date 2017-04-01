<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\User;
use app\models\LoginForm;
use Yii;
use app\modules\admin\model\Goods;
use app\modules\admin\model\Goodimg;


class DefaultController extends AppAdminController
{
  

    public $layout = 'administrator';

    public function actionIndex(){
    $session = Yii::$app->session;
    $session->open();
    $role = $session['roles'];
    $session->close();
    $ss = 10;

    if ($role == 10) {

    	return $this->render('admin',['ss'=>$ss]);
    }else{
    	return $this->goHome();
    }}



    public function actionGoodslist(){



        return $this->render('goodlist');
    }
}
