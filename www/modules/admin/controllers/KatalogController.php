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
use yii\web\UploadedFile;

class KatalogController extends AppAdminController
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
        $editgoods = new Editgood();
        $goods =  $editgoods->getGoodsmalimg();

        $idgood = Yii::$app->request->post('idgood');
        if ($idgood) {
            Goods::deleteAll(['id'=>$idgood]);
            Goodimg::deleteAll(['good_id'=>$idgood]);
            Goodfeche::deleteAll(['idgood'=>$idgood]);
            Colors::deleteAll(['idgood'=>$idgood]);
            $this->refresh();
        }


        return $this->render('index',['goods'=>$goods]);
    }

    public function actionEditgood()
    {    $editgoods = new Editgood(); 
        $id = $id = Yii::$app->request->get('id');
        $model = new Formeditgood();
        if ($model->load(\Yii::$app->request->post())) {
         
            $good = Goods::findOne($id);
            $good->name = $model->name;
            $good->price = $model->price;
            $good->demo = $model->demo;
            $good->video = $model->video;
            $good->rating = $model->rating;
            $good->oldprice = $model->oldprice;
            $good->categories = $model->categories;
            $good->sticker = $model->sticker;
            $good->public = $model->public;
            $good->description = $model->description;
            $good->availability = $model->availability;
            $good->save();
            $editgoods->updateColors($model,$id);
            $editgoods->updateFeches($model,$id);



            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->imageadditional1 = UploadedFile::getInstance($model, 'imageadditional1');
            $model->imageadditional2 = UploadedFile::getInstance($model, 'imageadditional2');
            $model->imageadditional3 = UploadedFile::getInstance($model, 'imageadditional3');

             if ($model->imageFile) 
             {
              $editgoods->updateMainImg($id,$model);
             }

             if ($model->imageadditional1) 
             {
                $additi = 'additional_foto_1';
                $editgoods->updateAdditionalImg($id,$model,$additi,'imageadditional1');
             }

             if ($model->imageadditional2) 
             {
                $additi = 'additional_foto_2';
                $editgoods->updateAdditionalImg($id,$model,$additi,'imageadditional2');
             }

             if ($model->imageadditional3) 
             {
                $additi = 'additional_foto_3';
                $editgoods->updateAdditionalImg($id,$model,$additi,'imageadditional3');
             }
            $additional_foto = Yii::$app->request->post('additional_foto');
            if ($additional_foto) {
                $editgoods->Deleteimg($id,$additional_foto);
            }

           $this->refresh();
        }
        



        if ($id) {
             $editgoods = new Editgood();
             $images =  $editgoods->getImages($id);
             $good = Goods::findOne($id);
             $feches = $editgoods->getFeches($id);
             $colors = $editgoods->getColors($id);
             $category = $editgoods->getcategory($id);
        }

        return $this->render('editgood',['good'=>$good,'images'=>$images,'colors'=>$colors,'feches'=>$feches,'category'=>$category,'model'=>$model]);
    }

   
 
    
}
