<?

use yii\widgets\ActiveField;
use yii\widgets\ActiveForm;
use yii\helpers\Html; 
?>

<div class="body_center">
	<h2>Заказы</h2>
	<div class="body_orders">
		<div class="body_orders_spisok">
			<a href="/web/admin/orders" class="btn btn-info orderstatus">Новые</a>
		</div>
		<div class="body_orders_spisok">
			<a href="/web/admin/orders?statusorder=accept" class="btn btn-info orderstatus">Принятые</a>
		</div>
		<div class="body_orders_spisok">
			<a href="/web/admin/orders?statusorder=way" class="btn btn-info orderstatus">В пути</a>
		</div >
		<div>
			<a href="/web/admin/orders?statusorder=perform" class="btn btn-info orderstatus">Выполненые</a>
		</div>
	</div>
	<div class="">
		<table class="table table-striped body_list_orders">
			<thead>
	     	 <tr>
	       	 <th><center>Номер заказа</center></th>
	       	 <th><center>Дата</center></th>
	       	 <th><center>Сумма</center></th>
	       	 <th><center>Заказчик</center></th>
	       	 <th><center>Статус</center></th>
	       	 <th><center>Просмотр</center></th>
	      	</tr>
	    	</thead>
	    	<tbody>
		<?foreach ($orders as $key => $value) {?>
	<tr>
		<td><center><?=$value['id']?></center></td>
		<td><center><?=$value['data']?></center></td>
		<td><center><?=$value['summa']?></center></td>
		<td><center><?=$value['nameuser'].' '.$value['surname']?></center></td>
		<td>
		<?if($value['status'] !== 'perform'){?>
		<?$form = ActiveForm::begin() ;?>
		<input type="hidden" name="idorder" value="<?=$value['id']?>">

		 <?echo $form->field($model, 'status')->dropdownList(
                    ['new'=>'Новый', 'way'=>'В пути', 'accept'=>'Принятый', 'perform'=>'Выполнен'],
                   ['options' => [$value['status'] =>['selected' => true]]]
                )->label(false);?>
           <?=$form->field($model, 'id')->hiddenInput(['value'=>$value['id']])->label(false);?>
                <?= Html::submitButton('Изменить',['class' => 'editrole']) ?>
		 <?ActiveForm::end()?> 
		<?
		}else{
			echo 'Выполнен';
			}?>
		</td>
		<td><center>

<div><?= Html::a('Посмотреть', ['order', 'id' => $value['id']], ['class' => 'profile-link-see-order'])?></div>


		</center></td>
	</tr>
<?}?>
		</tbody>
  		</table>
	</div>
</div>

