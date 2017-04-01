<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\HistoryOForders;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\OrderGoods;
use app\modules\admin\models\Goods;
use app\modules\admin\models\Ordershelper;

class OrdersController extends AppAdminController
{


    public function behaviors()
    {   
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

   

    public function actionIndex()
    {    $model = new Historyoforders();
            $helper = new Ordershelper();
         if ($model->load(\Yii::$app->request->post())) {
            $get = $model->status;
             $id = $model->id;
            $helper->saveStatus($id,$get);
            $this->refresh();
         }

       $status =  Yii::$app->request->get('statusorder');
        if (!$status) {
            $status = 'new';
        }
      
        $orders = Historyoforders::find()->where(['status'=>$status])->asArray()->all();
       
       return $this->render('index',['orders'=>$orders,'model'=>$model]);
    }
  

    public function actionOrder()
    {   

        $helper = new Ordershelper();
        $idgod =  Yii::$app->request->get('idgod');

        if ($idgod) {
            $id =  Yii::$app->request->get('id');
            $count =  Yii::$app->request->get('count');
            $helper->addGood($idgod,$id,$count);
        }


        $idgood =  Yii::$app->request->get('idgood');
        debug($idgood);
        if ($idgood) {
            $id = Yii::$app->request->get('id');
            $count = Yii::$app->request->get('count');
            if ($count > 0 ) {
                 $helper->saveCount($idgood,$id,$count);
            }
        }


        $delete =  Yii::$app->request->get('delete');
        if ($delete) {
            $id = Yii::$app->request->get('id');
           $helper->deleteGood($id,$delete);  
        }


        $id = Yii::$app->request->get('id');
        $orders = $helper->getOrder($id);
        
       return $this->render('order',['goods'=>$orders]);
    }

    
}
