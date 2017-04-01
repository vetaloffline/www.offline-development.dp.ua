<div><h1>Заказ номер №<?=$order->id?></h1></div>
<table border='1px'>
<tr>
		<th>Наименование</th>
		<th>Цена</th>
		<th>Количество</th>
		<th>Сумма</th>
</tr>
<?foreach ($goods as $key => $good) {?>
	<tr>
		<td><?=$good['name']?></td>
		<td><?=$good['price']?></td>
		<td><?=$good['count']?></td>
		<td><?=$good['count']*$good['price']?></td>
	</tr>
<?}
?>
</table>
<div>Общая сумма заказа: <b><?=$order->summa?></b></div>