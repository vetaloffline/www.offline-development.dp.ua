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
use app\modules\admin\models\Goodimg;
use app\modules\admin\models\Editgood;
use app\modules\admin\models\Goodfeche;
use app\modules\admin\models\Formeditgood;
use app\modules\admin\models\Colors;
use app\modules\admin\models\Goodcolors;
use app\modules\admin\models\Feche;
use app\modules\admin\models\Goodadd;
use yii\web\UploadedFile;

class GoodaddController extends AppAdminController
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
        $model = new Formeditgood();
       $goodadd = new Goodadd();
       $feches = $goodadd->getFeches();
       $colors = $goodadd->getColors();




       if ($model->load(\Yii::$app->request->post())) {
        if (!$model->oldprice) {
            $model->oldprice = 0;
        }
           $goods = new Goods();
           $goods->name = $model->name;
           $goods->price = $model->price;
           $goods->availability = $model->availability;
           $goods->categories = $model->categories;
           $goods->oldprice = $model->oldprice;
           $goods->public = $model->public;
           $goods->demo = $model->demo;
           $goods->description = $model->description;
           $goods->video = $model->video;
           $goods->sticker = $model->sticker;
           $goods->rating = $model->rating;
           $goods->save();

           $id = Yii::$app->db->getLastInsertId();
           
           $feches = Feche::find()->all();
           foreach ($feches as $ke => $val) {
               foreach ($model as $key => $value) {
                   if ($val['namefech'] == $key) {
                       
                       if ($value) {
                        $Goodfeche = new Goodfeche();
                          $Goodfeche->idgood = $id;
                          $Goodfeche->idfeche = $val['id'];
                          $Goodfeche->save();
                       }
                   }
               }
           }

           $colors = Goodcolors::find()->all();
           foreach ($colors as $ke => $val) {
               foreach ($model as $key => $value) {
                   if ($val['namecolor'] == $key) {
                       
                       if ($value) {
                        $Goodfeche = new Colors();
                          $Goodfeche->idgood = $id;
                          $Goodfeche->idcolor = $val['id'];
                          $Goodfeche->save();
                       }
                   }
               }
           }

           $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
           $model->imageadditional1 = UploadedFile::getInstance($model, 'imageadditional1');
            $model->imageadditional2 = UploadedFile::getInstance($model, 'imageadditional2');
            $model->imageadditional3 = UploadedFile::getInstance($model, 'imageadditional3');

           $Editgood = new Editgood();

           if ($model->imageFile) 
             {
              
              $Editgood->updateMainImg($id,$model);
             }

             if ($model->imageadditional1) 
             {
                $additi = 'additional_foto_1';
                $Editgood->updateAdditionalImg($id,$model,$additi,'imageadditional1');
             }

             if ($model->imageadditional2) 
             {
                $additi = 'additional_foto_2';
                $Editgood->updateAdditionalImg($id,$model,$additi,'imageadditional2');
             }

             if ($model->imageadditional3) 
             {
                $additi = 'additional_foto_3';
                $Editgood->updateAdditionalImg($id,$model,$additi,'imageadditional3');
             }

//$this->refresh();

       }








       return $this->render('index',['model'=>$model,'feches'=>$feches,'colors'=>$colors]);
    }
  
    
}
