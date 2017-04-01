<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use Yii;
/* @var $model app\models\Formprofile */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="body_center">
<?
if (Yii::$app->session->hasFlash('success')) {
	$suc = Yii::$app->session->getFlash('success');
	echo '<div class="alert alert-success">
  <strong>Ура </strong>'.$suc
.'</div>';
}
if (Yii::$app->session->hasFlash('error')) {
	echo Yii::$app->session->getFlash('error');
}
?>
	<div class="profileuser">
	<div class="profile_name_text"><h2>Профиль</h2></div>
		<div class="form-group username">
		  <?= $form->field($model,'name')->textInput(['value' => $user->name]) ?>
		</div>
		<div class="form-group username">
		  <?= $form->field($model,'surname')->textInput(['value' => $user->surname]) ?>
		</div>
		<div class="form-group username">
		  <?= $form->field($model,'patronymic')->textInput(['value' => $user->patronymic]) ?>
		</div>
		<div class="form-group username">
		  <?= $form->field($model,'phone')->textInput(['value' => $user->phone]) ?>
		</div>
		<div class="submituser">
		<?=Html::submitButton('Редактировать профиль',['class'=>'btn btn-success edit_orders_f']);?>
		</div><br>
		 <?php ActiveForm::end(); ?>
		<?= Html::a('Изменить пароль', ['profile/editpassword'], ['class' => 'btn btn-warning submituser']) ?>
		<div>
			<?= Html::a('История заказов', ['profile/orders'], ['class' => 'username btn btn-default']) ?>
		</div>
	</div>
	
</div>
