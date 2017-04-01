<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\db\ActiveRecord;
use app\models\Cart;
use app\models\OrderGoods;
use app\models\HistoryOForders;

class CartController extends Controller
{

	  // public function behaviors() //это поведение можно использовать для автоматической записи поля времени 
   //  {
   //      return [
   //          [
   //              'class' => TimestampBehavior::className(),
   //              'attributes' => [
   //                  ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],  //тут при первой записи пишеться время и значение во что записать в даном случае created_at
   //                  ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],//это при обновлении записи
   //              ],
   //              // если вместо метки времени UNIX используется datetime:
   //              // 'value' => new Expression('NOW()'), 
   //          ],
   //      ];
   //  }

	 function actionIndex(){
	 	$cart = Yii::$app->request->cookies->getValue('Cart');
	 	if ($cart) {
		  	$goods = new Cart();
		  	$goodscart = $goods->Getgoods($cart);
		}else{
			
		}

	 	return $this->render('view',['cart'=>$cart,'goods'=>$goodscart]);
	 }

	  function actionCartadd(){
	 	$cart = new Cart();
	 	$id = Yii::$app->request->get('id');
	 	$cart->Addcart($id);
	 	return $this->redirect('index');
	 }

	 function actionCartminus(){
	 	$cart = new Cart();
	 	$id = Yii::$app->request->get('id');
	 	$cart->Minuscart($id);
	 	return $this->redirect('index');
	 }
	  function actionCartdell(){
	 	$cart = new Cart();
	 	$id = Yii::$app->request->get('id');
	 	$cart->Dellcart($id);
	 	return $this->redirect('index');
	 }

	 function actionCartclear(){
	 	$cart = new Cart();
	 	$cart->Clearcart();
	 	return $this->redirect('index');
	 }

	 function actionCartinput(){
	 	$cart = new Cart();
	 	$id = Yii::$app->request->get('id');
	 	$count = Yii::$app->request->get('count');
	 	$cart->Inputcart($id,$count);
	 	return $this->redirect('index');
	 }

	 function actionOrder(){
	 	$goods = new Cart();
	 	$id_user = Yii::$app->user->id;
	 	$Historyoforders = new HistoryOForders();
	 	if ($Historyoforders->load(Yii::$app->request->post())) {
	 		
	 	$Historyoforders->summa = $goods->GetSumma();
	 	$Historyoforders->status = 'new';
	 	$Historyoforders->id_user = $id_user;

	 	if ($Historyoforders->save()) {
	 		$id = $Historyoforders->id; // так можно получить айди последнего заказа точнее последней записи с автоматическим полей
	 		$cartsave = Yii::$app->request->cookies->getValue('Cart');
	 		$goods->saveOrdergoods($id, $cartsave);
		 	Yii::$app->response->cookies->add(new \yii\web\Cookie([
                 'name' => 'Cart',
                 'value' => NULL,
                 'expire' => time() + 9999999,
             ]));
	 		Yii::$app->session->setFlash('success','Ваш заказ принят в обработку, Ожидайте звонка!'.$id);
	 		return $this->render('happy');
	 	}else{
	 		Yii::$app->session->setFlash('error','Ошибка оформления заказа');
	 	}
	 	
	 	}
		 return $this->render('order',['Historyoforders'=>$Historyoforders]);
	 }
		
}