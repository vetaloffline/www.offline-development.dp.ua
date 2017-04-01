<li class="has-children">
	<a href="<?=\yii\helpers\Url::to(['katalog/view','id'=>$category['id']]);?>">
	!!!<?=$category['name']?>
	<?if (isset($category['childs'])) {echo '<span> +</span>';}?>
	</a>
	<?if (isset($category['childs'])) {?>

		<ul class="cd-accordion-menu">
			<?=$this->categories_to_string($category['childs']);?>
		</ul>
		
		<?}?>
</li>