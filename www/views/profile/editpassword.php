<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use Yii;
?>
<?
if (Yii::$app->session->hasFlash('successpas')) {
	$suc = Yii::$app->session->getFlash('successpas');
	echo '<div class="alert alert-success">
  <strong>Ваши </strong>'.$suc
.'</div>';
}
if (Yii::$app->session->hasFlash('errorpas')) {
	echo Yii::$app->session->getFlash('errorpas');
}
?>

<?php $form = ActiveForm::begin(); ?>
 <?= $form->field($model,'password')->passwordInput(['value' => $user->surname]) ?>
  <?= $form->field($model,'secondpassword')->passwordInput(['value' => $user->surname]) ?>
<?=Html::submitButton('Изменить пароль',['class'=>'btn btn-success edit_orders_f']);?>
<?php ActiveForm::end(); ?>