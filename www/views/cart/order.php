<?
use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$user = Yii::$app->user->identity;

?>
<div class="body_center">
	<pre></pre>
	<div class="baskeet_glav">
	</div>

	<div class="basket_2">
		<a href="/"><div class="img_close111"></div></a>
		<div class="prod_bask_g"><?echo Yii::$app->session->getFlash('success');?>
			<div id="nazvaoform"><b>Офoрмление заказа</b></div>
			<div id="bodyform">
				<?$form = ActiveForm::begin()?>
				<div class="float_form_left"><?=$form->field($Historyoforders,'nameuser')->textInput(['value'=>$user->name])?></div>
				<div><?=$form->field($Historyoforders,'surname')->textInput(['value'=>$user->surname])?></div>
				<div><?=$form->field($Historyoforders,'phone')->textInput(['value'=>$user->phone])?></div>
				<div><b>Выбирите способ доставки</b></div>
				<?=$form->field($Historyoforders, 'delivery')
				->radioList([
					'NP'=>'Новая почта',
					'UP'=>'УкрПочта',
					'IT'=>'Интайм',
					]);?>
					<div><b>Выбирите способ оплаты</b></div>
				<?=$form->field($Historyoforders, 'payment')
					->radioList([
						'cash'=>'Наличными',
						'bank'=>'На карту банка',
						'naloj'=>'Наложеный платеж',
						]);?>
				<?=Html::submitButton('Оформить заказ',['class'=>'btn btn-success'])?>
				<?ActiveForm::end()?> 
			</div>
		</div>
	</div> 
</div>