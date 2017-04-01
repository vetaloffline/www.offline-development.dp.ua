<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Category;
use app\models\Goods;
use app\models\GetGoods;

class KatalogController extends Controller
{

    public $object;


   public  function actionMain(){
 		$this->object = new GetGoods();
        $hits = $this->object->GetTopGoods();
        return $this->render('maincatalog',compact(['hits']));

    }

 public  function actionIndex(){
        $this->object = new GetGoods();
 		$hits = $this->object->GetTopGoods();
        return $this->render('maincatalog',compact(['hits']));

    }

     public  function actionKategory($id){
 		$id = Yii::$app->request->get('id');
        $this->object = new GetGoods();
        $goods = $this->object->Kategory($id);
        return $this->render('Kategory',compact('goods')); 

    }

    public function actionGood($id){
    	$id = Yii::$app->request->get('id');
        $this->object = new GetGoods();
    	$good = $this->object->GetGood($id);
    	 return $this->render('Good',['good'=>$good]); 

    }

}
