<div class="block_li_back">
<li class="mainclassli">
	<a href="<?=\yii\helpers\Url::to(['katalog/kategory','id'=>$category['id']]);?>">
	<?=$category['name']?>
	<?if (isset($category['childs'])) {echo '<span> +</span>';}?>
	</a>
	<?if (isset($category['childs'])) {?>

		<ul class="secondclassul">
			<?=$this->categories_to_string($category['childs']);?>
		</ul>
		
		<?}?>
</li>
</div>