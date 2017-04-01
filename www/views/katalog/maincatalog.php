<?use yii\helpers\Html;?>

<div>
	<div class="block_main_left">
		<ul>
			<?=\app\components\MenuWidget::widget(['tpl'=>'menu']);?> 
		</ul>
	</div>
	<div class="block_main_right">
		<?
		if ($hits) {
			foreach ($hits as $key => $good) {?>
				<div class="good">
		<div class="good_left">
			<div class="video">
				<?if($good->video){?>
				<a href="<?=$good->video?>" class="video_a">Видеообзор</a>
				<?}?>
			</div>
			<div class="demovideo">
				<?if($good->demo){?> 
				<a href="<?=$good->demo?>" class="demo_a">Демонстрация товара</a>
				<?}?>
			</div>
		</div>
		<div class="good_right">
			<div class="good_t">
				<span class="<?=$good["sticker"]?>"></span>
				<div class="img_url_katalog">
					<a href="<?//=$good->alias?>" alt="<?//=$good->img?>" title=""> 
						<img src="/web/images/goods/<?=$good['nameimg']?>">
					</a>
				</div>
				<div class="good_right_r">
			 		<?	$colors = $good['colors'];
						foreach ($colors as $ka => $vs) 
							{
								?>
								<div class="white1">
									<a href="?route=product&id=<?=$key?>" class="<?=$vs['namecolor']?>"></a>
								</div>
						<?}?>	 		
				</div>
			</div>
			<div class="good_b">
				<div class="good_name">
					<?=Html::a($good["name"],['/katalog/good','id'=>$good['id']])?>
				</div>
				<?if($good["availability"] == 0){?>
				<div class="endingGood1">
					<span class="endingGood2"><b>Заканчивается</b></span>
				</div><?}?>
				<?if($good["oldprice"]){?>
				<div class="oldPrice1">
					<b><span class="oldPrice2"><?=$good["oldprice"]?></span></b><span class="grn"><small> грн</small></span>
				</div>
				<?}?>
				<div class="ss123">
					<div class="price">
						<b><span class="price1"><?=$good["price"]?></span></b><span class="grn"><small> грн</small></span>
					</div>
					<div class="reiting">
						<div class="reiting1">
							<a hre="#" >
							<?
							if($good['rating'] == 0){echo "<a href='#otziv' class='reiting2'><img src='web/static/img/r0.png'class='reiting2'></a>";}
							if($good['rating'] == 0.5){echo "<a href=''><?=Html::img('@web/images/static/r0.png','alt'=>'rating')?></a>";}
							if($good['rating'] == 1){echo "<a href=''><img src='/web/images/static/r1.png'class='reiting2'></a>";}
							if($good['rating'] == 1.5){echo "<a href=''><img src='/web/images/static/r15.png'class='reiting2'></a>";}
							if($good['rating'] == 2){echo "<a href=''><img src='/web/images/static/r2.png'class='reiting2'></a>";}
							if($good['rating'] == 2.5){echo "<a href=''><img src='/web/images/static/r25.png'class='reiting2'></a>";}
							if($good['rating'] == 3){echo "<a href=''><img src='/web/images/static/r3.png'class='reiting2'></a>";}
							if($good['rating'] == 3.5){echo "<a href=''><img src='/web/images/static/r35.png'class='reiting2'></a>";}
							if($good['rating'] == 4){echo "<a href=''><img src='/web/images/static/r4.png'class='reiting2'></a>";}
							if($good['rating'] == 4.5){echo "<a href=''><img src='/web/images/static/r45.png'class='reiting2'></a>";}
							if($good['rating'] == 5){echo "<a href=''><img src='/web/images/static/r5.png' class='reiting2'></a>";}
							?>
							</a>
						</div>
						<div class="reviews">
	
							<?
							//for($f=$good["reviews"][1];$f<=$good["reviews"][1];$f++)
								//{
								$rest=$f%10;
								if(($f===0) || ($rest>=5 && $rest<=9) || ($f%100>=10 && $f%100<=20))
									{
									$okonch="ов";
									}else if($rest===1)
									{
									$okonch= "";
									}else{$okonch= "a";}
									//}?>
						<a href="" class="reviews1"><?//=$good["reviews"][1]." "."Отзыв".$okonch?> </a>
						</div> 
					</div>
				</div>
				<div class="">
					<div class="idGood">
						<a href="/web/cart/cartadd?id=<?=$good['id']?>"><div class="button_buy_goods"></div></a>
					</div>
				</div>
				<div class="features">
					<?$feches = $good['feches'];
						foreach ($feches as $kas => $vss) {?>
								<span class="features1">
										<?=Html::img('@web/images/static/'.$vss['wayfech'].'')?>
								</span>
							<?}?>
				</div>
				<div class="description123" >
					<span class="description1"><?=$good['description']?></span>
				</div>
			</div>
		</div>
	</div>
			<?}
		}
		?>
	</div>
</div>