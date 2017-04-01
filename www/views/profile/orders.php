<div class="panel-group" id="accordion">
	<div id="name_history_orders"><h2>История заказов</h2></div>
	<?

	foreach ($orders as $key => $order) {
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key?>">
						Заказ №<?=$order['id']?></a>
					</h4>
				</div>
				<div id="collapse<?=$key?>" class="panel-collapse collapse off">
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Фото</th>
									<th>Наименование</th>
									<th>Количество</th>
									<th>цена</th>
								</tr>
							</thead>
							<tbody>
								<?
									foreach ($order['goods'] as $key => $value) {?>
										<tr>
											<td><img src="/web/images/goods/<?=$value['image']?>"></td>
											<td><?=$value['name']?></td>
											<td><?=$value['count']?></td>
											<td><?=$value['price']?></td>
										</tr>
									<?}
								?>
							</tbody>
							</table>
							<div>
								Сумма заказа : <?=$order['summa']?>
							</div>
							<div>
								Дата заказа : <?=$order['data']?>
							</div>
							<div>
								Статус : <?=$order['status']?>
							</div>
						</div>
					</div>
				</div>
				<?}?>
			</div>

