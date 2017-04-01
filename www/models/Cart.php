<?
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\Controller;
use Yii;
use app\models\OrderGoods;

class Cart extends ActiveRecord
{
	function Getgoods($cart){
		foreach ($cart as $key => $value) {
			
			if (!$i) {
				$id .=$key;
				$i++;
			}else{$id .=','.$key;}
		}
		
		 return $goods = Yii::$app->db->createCommand("
		 	SELECT * 
		 	FROM goods 
		 	JOIN (SELECT nameimg,good_id FROM goodimg WHERE descriptionimg = 'small_img' AND communication = 'main') Img 
			ON id=good_id
		 	WHERE id IN(".$id.")")->queryAll();

	}

	function Addcart($id){
		if ($id) {
		$cart = Yii::$app->request->cookies->getValue('Cart');
		if ($cart[$id]) {
			$cart[$id] += 1;
		}else{$cart[$id] = 1;}
		Yii::$app->response->cookies->add(new \yii\web\Cookie([
                'name' => 'Cart',
                'value' => $cart,
                'expire' => time() + 9999999,
            ]));
	}}

	function Minuscart($id){
		$cart = Yii::$app->request->cookies->getValue('Cart');
		if (($cart[$id] - 1) > 0) {
			$cart[$id] -= 1;
		}
		 Yii::$app->response->cookies->add(new \yii\web\Cookie([
                 'name' => 'Cart',
                 'value' => $cart,
                 'expire' => time() + 9999999,
             ]));
	}

	function Dellcart($id){
		$cart = Yii::$app->request->cookies->getValue('Cart');
		unset($cart[$id]);
		 Yii::$app->response->cookies->add(new \yii\web\Cookie([
                 'name' => 'Cart',
                 'value' => $cart,
                 'expire' => time() + 9999999,
             ]));
	}

	function Clearcart(){
		$cart = Yii::$app->request->cookies->getValue('Cart');
		unset($cart);
		 Yii::$app->response->cookies->add(new \yii\web\Cookie([
                 'name' => 'Cart',
                 'value' => $cart,
                 'expire' => time() + 9999999,
             ]));
	}

	function Inputcart($id,$count){
		$cart = Yii::$app->request->cookies->getValue('Cart');
		$cart[$id] = $count;
		 Yii::$app->response->cookies->add(new \yii\web\Cookie([
                 'name' => 'Cart',
                 'value' => $cart,
                 'expire' => time() + 9999999,
             ]));
	}

	function GetSumma(){
		$cart = Yii::$app->request->cookies->getValue('Cart');
	 	$goods = $this->Getgoods($cart);

	 	foreach ($cart as $id => $count) {
	 		foreach ($goods as $key => $good) {
	 			if ($good['id'] == $id) {
	 				$summa += ($good['price']*$count);
	 			}
	 		}
	 	}
		return $summa;
	}

	function saveOrdergoods($id,$cartsave){
		$goods = $this->Getgoods($cartsave);
		foreach ($cartsave as $idg => $count) {
			$order = new OrderGoods();
			foreach ($goods as $key => $good) {
				if ($idg == $good['id']) {
					$order->id_good = $idg;
					$order->id_order = $id;
					$order->count = $count;
					$order->price = $good['price'];
				}
			}
			$order->save();
		}
	}


}