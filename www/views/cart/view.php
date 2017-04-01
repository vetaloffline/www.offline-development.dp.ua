<?
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="body_center">
<pre> </pre>
<div class="baskeet_glav">
</div>
<div class="basket_2">
	<a href="/katalog"><div class="img_close111"></div></a>
<div class="prod_bask_g">
<?
 if ($cart) {
?>
<div id='korz_pok'><h2>Корзина покупок</h2></div>
<?
foreach ($goods as $k => $good){;?>
<div class="product_basket">
	<div class="prod_bask">
		<div class="img_bask">
		
			<?=Html::img('@web/images/goods/'.$good['nameimg'].'')?>
		</div>
	</div>
	<div class="prod_bask">
		<div class="prod_nane1"><b>Наименование товара</b></div>
		<div class="prod_nane1"><?=$good['name'];?></div>
	</div>
	<div class="prod_bask">
		<div class="prod_nane3"><b>Цена</b></div>
		<div class="prod_nane3"><?=$good["price"];?>грн</div>
	</div>
	<div class="prod_bask">
		<div class="prod_nane"><b>Количество</b></div>
		<div class="prod_nane">
			<div class="minus_b"><a href="cartminus?id=<?=$good['id']?>">-</a></div>
			<form action="cartinput">
				<div><input type="text" name="count" value="<?=$cart[$good['id']]?>" class="inp_b" maxlength="6" pattern="\d+" ></div>
				<input type="hidden" name="id" value="<?=$good['id']?>">
				
			</form>
			<div class="plus_b">
				<a href="cartadd?id=<?=$good['id']?>">+</a>
			</div>
		</div>
	</div>
	<div class="prod_bask">
		<div class="prod_nane2"><b>Сумма</b></div>
		<div class="prod_nane2"><?=$good['price']*$cart[$good['id']];?>грн</div>
	</div>
	<div class="prod_bask">
		<a href="cartdell?id=<?=$good['id']?>" class="delltov">
		<div class="prod_nane4"></div>
		</a>
	</div>
	<?$allsum=$allsum+$good['price']*$cart[$good['id']];?>
</div>
<?}?>
<div class="allsum">Итого:<b><?=$allsum?></b>грн</div>
<div class="clear_basket_b">
	<a href="cartclear" >
		<div class="floba"><b>Очистить корзину</b></div><div class="basketpde"></div>
	</a>
</div>
<a href="order" class="zakazoff">
	<div class="zakazo">
	
	</div>
</a>
<?}else{?>
<div class="basket_nuul"><b>Корзина пустая</b></div>
	<?}?>
</div>
</div> 
</div>
