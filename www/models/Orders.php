<?php

namespace app\models;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Singup;
use app\models\ProfileForm;
use app\models\HistoryOForders;
use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{
    public function getOrders($id){
      $orders = HistoryOForders::find()->where(['id_user'=>$id])->asArray()->all();
      foreach ($orders as $key => $order) {

        if (!$i) {
          $ids .= $order['id'];
          $i++;
        }else{
          $ids .= ','.$order['id'];
        }

      }

      if ($ids) {
       $goods = $this->getGoods($ids);
      }
    
     

      foreach ($orders as $ke => $orde) {

        foreach ($goods as $k => $good) {
          if ($orde['id'] == $good['id_order']) {
              $orders[$ke]['goods'][$good['id']] = $good;
          }
        }
      }
    return $orders;

    }

    public function getGoods($ids){
        $goods = Yii::$app->db->createCommand("
        SELECT * FROM order_goods Ord JOIN(SELECT name,id FROM goods) good ON Ord.id_good = good.id WHERE Ord.id_order IN(".$ids.")")->queryAll();

        foreach ($goods as $key => $good) {
           if (!$i) {
             $idg .= $good['id'];
             $i++;
           }else{
            $idg .= ','.$good['id'];
           }
        }
      
        $img = Yii::$app->db->createCommand("SELECT nameimg,good_id FROM goodimg WHERE good_id IN(".$idg.") AND communication = 'main' AND descriptionimg = 'small_img'")->queryAll();
        foreach ($goods as $ke => $good) {
          foreach ($img as $key => $value) {
            if ($good['id'] == $value['good_id']) {
              $goods[$ke]['image'] = $value['nameimg'];

            }
          }
        }
        return $goods;

    }
}
