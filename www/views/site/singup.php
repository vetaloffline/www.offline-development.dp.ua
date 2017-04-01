<h1>Регистрация</h1>
<?
use yii\widgets\ActiveForm;
?>
<?$form = ActiveForm::begin(['class'=>'form-horizontal']);?>

<?=$form->field($model,'email')->textInput(['autofocus'=>true])?>
<?=$form->field($model,'password')->passwordInput()?>
<div><button type="submit" class="btn btn-primary">Зарегестрироваться</button></div>
<?ActiveForm::end()?>