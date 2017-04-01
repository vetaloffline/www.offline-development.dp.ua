
<div class="body_center">
<div class="body_orders">
		<div class="body_orders_spisok">
			<a href="/web/admin/orders" class="btn btn-info orderstatus">Новые</a>
		</div>
		<div class="body_orders_spisok">
			<a href="/web/admin/orders?status=accept" class="btn btn-info orderstatus">Принятые</a>
		</div>
		<div class="body_orders_spisok">
			<a href="/web/admin/orders?status=way" class="btn btn-info orderstatus">В пути</a>
		</div >
		<div>
			<a href="/web/admin/orders?status=perform" class="btn btn-info orderstatus">Выполненые</a>
		</div>
	</div>
	<div class="tableorder">
	<div class="">
		<h2>Заказ №<?=$goods[0]['id_order']?></h2>
	</div>
		<table class="table table-bordered table_main_g">
    <thead>
      <tr>
      	<th><center>Фото</center></th>
        <th><center>Наименование</center></th>
        <th><center>Код</center></th>
        <th><center>Цена</center></th>
        <th class="tableinput"><center>Количество</center></th>
        <th><center>К оплате</center></th>
         <th><center>Удалить</center></th>
      </tr>
    </thead>
    <tbody>
<? 
if ($goods) {
foreach ($goods as $key => $value) {?>
	<tr>
		<td><center><img src="/web/images/goods/<?=$value['image']?>"></center></td>
        <td><center><?=$value['namegood']?></center></td>
        <td><center><?=$value['id_good']?></center></td>
        <td><center><?=$value['price']?></center></td>
        <td>
        <?if($db['status'] !== 'perform'){?>
	        <form method="GET">
	        	<center><input type="text" name="count" value="<?=$value['count']?>" class="tableinput form-control form_count_order"></center>
	        	<input type="hidden" name="idgood" value="<?=$value['id_good']?>">
	        	<input type="hidden" name="id" value="<?=$value['id_order']?>">
	        </form><?}else{?>
	        	<center><?echo $value['count'];?></center>
	        	<?}?>
        </td>
        <td><center><?=$value['price']*$value['count']?></center></td>
         <td>
          <?if($value['status'] !== 'perform'){?>
         <form method="GET">
         	<center><input type="submit" name="auth" value="X" class="btn btn-danger"></center>
         	<input type="hidden" name="id" value="<?=$value['id_order']?>">
         	<input type="hidden" name="delete" value="<?=$value['id_good']?>">
         </form><?}?>
         </td>
      </tr>
<?}}?>
    </tbody>
  </table>
	</div>
	<div class="ordersumma">
		Общая сумма заказа: <b><?=$value['summa']?></b>
	</div>
	<div class="ordersumma">
		Дата заказа : <b><?=$value['data']?></b>
	</div>
	<div class="ordersumma">
		<div class="owwww">Статус : <b><?=$value['status']?></b></div><div class="ordersummass">
		 <?if($value['status'] !== 'perform'){?>
		<form  action="/web/admin/orders" method="GET">
		<select class="form-control" id="sel1" name="statusorder" onchange="this.form.submit()">
			<option <?if($value['status'] == 'new'){echo 'selected';}?>>new</option>
			<option <?if($value['status'] == 'way'){echo 'selected';}?>>way</option>
			<option <?if($value['status'] == 'perform'){echo 'selected';}?>>perform</option>
			<option <?if($value['status'] == 'accept'){echo 'selected';}?>>accept</option>
			</select>
		<input type="hidden" name="idorder" value="<?=$value['id']?>">
		</form>
		<?}?>
		</div>
	</div>
	<div class="asdfas"></div>
	<?if($value['status'] !== 'perform'){?>
	
	<div id="demo" class=" addgoodorder"><p>
		<form class="inputgoodaddorder" method="GET"> 
			<label>Код товара</label>
			<input type="text" name="idgod" class="form-control inpur_order_idgood" >
			<label>Количество</label>
			<input type="text" name="count" class="form-control inpur_order_idgood"><br>
			<input type="submit" name="" class="btn btn-info" value="Добавить товар к заказу">
			<input type="hidden" name="id" value="<?=$value['id_order']?>">
		</form>
	</div>
	<?}?>
</div>
