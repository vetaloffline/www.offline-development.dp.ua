<?php

namespace app\modules\admin\models;

use app\modules\admin\models\HistoryOForders;
use app\modules\admin\models\OrderGoods;
use app\modules\admin\models\Goods;
use Yii;


class Ordershelper extends \yii\db\ActiveRecord
{

    public function saveStatus($id,$get){
            $data = HistoryOForders::findOne($id);
            $data->status = $get;
            $data->save();
    }

    public function addGood($idgod,$id,$count){

         if (!OrderGoods::findOne(['id_good'=>$idgod,'id_order'=>$id])) {
                    $good =Goods::findOne($idgod);
                    $order = new OrderGoods();
                    $order->id_good = $idgod;
                    $order->id_order = $id;
                    $order->count = $count;
                    $order->price = $good->price;
                    $order->save();
                    $goods = OrderGoods::find()->where(['id_order'=>$id])->all();
                    foreach ($goods as $k => $va) {
                        $summa += $va->price*$va->count;
                    }
                    $gistory = HistoryOForders::findOne($id);
                    $gistory->summa = $summa;
                    $gistory->save();
                }
    }

    public function saveCount($idgood,$id,$count){
            $data = OrderGoods::findOne(['id_good'=>$idgood,'id_order'=>$id]);
            $data->count = $count;
            $data->save();
            $goods1 = OrderGoods::find()->where(['id_order'=>$id])->all();
                    foreach ($goods1 as $k => $va) {
                        $summa += ($va->price*$va->count);
                    }
            $orderhistory = HistoryOForders::findOne($id);
            $orderhistory->summa = $summa;
            $orderhistory->save();  
    }


    public function deleteGood($id,$delete){
            $goods1 = OrderGoods::find()->where(['id_order'=>$id])->all();
            if (count($goods1) > 1) {
            $data = OrderGoods::findOne(['id_good'=>$delete,'id_order'=>$id]);
            $data->delete();
                    foreach ($goods1 as $k => $va) {
                        $summa += ($va->price*$va->count);
                    }
            $orderhistory = HistoryOForders::findOne($id);
            $orderhistory->summa = $summa;
            $orderhistory->save();
        }
    }

     public function getOrder($id){
            
            $orders = Yii::$app->db->createCommand("SELECT * FROM order_goods Og JOIN(SELECT * FROM HistoryOForders WHERE id = ".$id.") Hoo ON Hoo.id = Og.id_order")->queryAll();
        foreach ($orders as $key => $good) {
            if (!$i) {
                $ids .= $good['id_good'];
                $i++;
            }else{
            $ids .= ','.$good['id_good'];
            }
        }
        if ($orders) {
            $image = Yii::$app->db->createCommand("SELECT name,nameimg,id FROM goods Go JOIN (SELECT nameimg,good_id FROM goodimg WHERE good_id IN(".$ids.") AND descriptionimg = 'small_img' AND communication = 'main') Img ON Img.good_id = Go.id")->queryAll();

         foreach ($orders as $key => $value) {
             foreach ($image as $k => $va) { 
                 if ($value['id_good'] == $va['id']) {
                     $orders[$key]['image'] =$va['nameimg'];
                     $orders[$key]['namegood'] =$va['name'];
                 }
             }
         }
        }

         return $orders;
    }


      
}
