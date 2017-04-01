
<?use yii\helpers\Html;?>
<div class="body_center">
	<div class="name_p_p"> 
		<div class="good_name">
			<span class="good_name_p">Мобильный телефон <?=$good["name"]?></span>
		</div>
	</div>
	<div class="menu_top_p">
		<a href="#"><div class="menu_div_p"><div class="text_menu">Все о товаре</div></div></a>
		<a href="#"><div class="menu_div_p"><div class="text_menu">Характеристики</div></div></a>
		<a href="#"><div class="menu_div_p"><div class="text_menu">Обзор и Видео</div></div></a>
		<a href="#"><div class="menu_div_p"><div class="text_menu">Фото</div></div></a>
		<a href="#"><div class="menu_div_p"><div class="text_menu">Отзывы <?=$good["reviews"]?></div></div></a>
		<a href="#"><div class="menu_div_p"><div class="text_menu">Услуги</div></div></a>
		<a href="/web/katalog/"><div class="menu_div_p"><div class="text_menu">Вернуться назад</div></div></a>
	</div>
	<div class="menu_cen_p">
		<div class="img_pro_b">
				<?$img = $good['images']['small'];
				 foreach ($img as $key => $value) {
				 	$img_small = '_additional_foto'.$img_small;?>
						<div class="img_b_b">
							<div class="img_b_b1">
								<a href="">
									<?=Html::img('@web/images/goods/'.$value.'')?>
								</a>
							</div>
						</div>
					<?}?>
		</div>
			<div class="img_pro_a">
					<div class="image_p">
						<div class="good_img">
							<a href="web/images/fotogoods/<?=$img?>">
								<?=Html::img('@web/images/goods/'.$good['images']['main'][0].'')?>
							</a>
						</div>
					</div>
					<span class="<?=$goods["sticker"]?>"></span>
					<div class="predlog">
					<div class="grn100_g">
							<span class="grnn100"><a href="#" class="grn101">Дарим 100грн на распаковку</a></span>
						</div>
							<div class="video11">
								<?if($good["video"]){?>
								<a href="<?=$good["video"]?>" class="video_a">Видеообзор</a>
								<?}?>
							</div>
							<div class="demovideo11">
								<?if($good["demo"]){?>
								<a href="<?=$good["demo"]?>" class="demo_a">Демонстрация товара</a>
								<?}?>
							</div>
					</div>
				<div class="button_buy_goods_body">
					<a href="/basket/basketadd?id=<?=$_GET['id']?>"><div class="button_buy_goods"></div></a>
				</div>
			</div>
			<div class="dopol">
				<div class="text_color">Цвет</div>
				<div class="colors_p">
				<? 
				$colors = $good['colors'];
				foreach ($colors as $k => $v) 
				{?>
				<div class="white1">
					<a href="#" class="<?=$v['namecolor']?>"></a>
				</div>
				<?}?>
				</div>
				<div class="opisanie_p">
				<div class="otz_opis">
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
							for($f=$good["reviews"][1];$f<=$good["reviews"][1];$f++)
								{
								$rest=$f%10;
								if(($f===0) || ($rest>=5 && $rest<=9) || ($f%100>=10 && $f%100<=20))
									{
									$okonch="ов";
									}else if($rest===1)
									{
									$okonch= "";
									}else{$okonch= "a";}
									}?>
									<a href="" class="reviews1"><?=$good["reviews"][1]." "."Отзыв".$okonch?> </a>
							
						</div> 
					</div>
					<div class="ima_dop"></div>
				</div>


				</div>
				<div class="description_class">
					<div><h3>Описание</h3></div>
					<div><?=$good['description']?></div>
				</div>
			</div>

	</div>
</div>
