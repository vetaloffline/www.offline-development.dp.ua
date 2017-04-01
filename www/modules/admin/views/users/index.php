<?
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>


<div class="body_center">
	<h2>Список пользователей</h2>
	<div class="bodyorders">
		<div class="body_orders_spisok">
			<a href="/web/admin/users/index" class="btn btn-info orderstatus">Пользователи</a>
		</div>
<!-- 		<div class="body_orders_spisok">
			<a href="/admin/users/manager" class="btn btn-info orderstatus">Менеджеры</a>
		</div> -->
		<div>
			<a href="/web/admin/users/admins" class="btn btn-info orderstatus">Админы</a>
		</div>
	</div>
	<div class="users_table_admin">
		<table class="table table-striped table_lists">
			<thead>
				<tr>
					<th>ID</th>
					<th>Имя</th>
					<th>Фамилия</th>
					<th>Email</th>
					<th>Редактирование</th>
				</tr>
			</thead>
			<tbody>
				<?
				foreach ($users as $key => $value) {?>
				<tr>
					<td><?=$value['id']?></td>
					<td><?=$value['name']?></td>
					<td><?=$value['surname']?></td>
					<td><?=$value['email']?></td>
					<td class="input_role_admin">
					  <?$form = ActiveForm::begin() ;?>
							<div class="">
								<?echo $form->field($model, 'role')->dropdownList(
				                    ['10'=>'10', '20'=>'20'],
				                   ['options' => [$value['role'] =>['selected' => true]]]
				                )->label('Роль');?>
							</div>
								 <?= Html::submitButton('Изменить',['class' => 'editrole']) ?>
								 <?= $form->field($model, 'id')->hiddenInput(['value'=>$value['id']])->label(false);?>
							  <?ActiveForm::end()?>
						</td>
					</tr>
					<?}?>
				</tbody>
			</table>
		</div>
	</div>
