
<?
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="body_center">
	<div class="container">
		<h2>Список товаров</h2>         
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Фото</th>
					<th>Артикул</th>
					<th>Наименование</th>
					<th>Цена</th>
					<th>Редактирование</th>
					<th>Удаление</th>
				</tr>
			</thead>
			<tbody><?
				foreach ($goods as $key => $value){?>
				<tr>
					<td>
						<a href="/web/katalog/good?id=<?=$value['id']?>"><img src="/web/images/goods/<?=$value['nameimg']?>"></a>
					</td>
					<td><?=$value['id']?></td>
					<td><?=$value['name']?></td>
					<td><?=$value['price']?> грн</td>
					<td><a href="editgood?id=<?=$value['id']?>">Редактировать</a></td>
					<td>
<?= Html::beginForm()?>
<?= Html::submitButton('Удалить', ['value'=>$value['id'],'name'=>'idgood','class' => 'submit_deletegood']) ?>
<?= Html::endForm() ?>
					</td>
				</tr>
				<?}?>
			</tbody>
		</table>
	</div>
</div>

