<?
use app\modules\admin\models\Formeditgood;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Category;



 ?>
<div class="body_add_good">
  <div id='korz_pok'><h2>Добавление товара</h2></div>
  <div id="main_g">
  <?$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ;?>

      <div id="edit_good_list">
        <?=$form->field($model, 'name')->textInput()->label('Название товара');?>
        <?=$form->field($model, 'video')->textInput()->label('Видеообзор')?>
        <?=$form->field($model, 'demo')->textInput()->label('Демонстрация товара')?>

        <?echo $form->field($model, 'categories')->dropdownList(
              Category::find()->select(['name', 'id'])->indexBy('id')->column()
          )->label('Категория');?>

      
        <?echo $form->field($model, 'sticker')->dropdownList(
                    ['stock'=>'Акция', 'topSales'=>'Топ продаж','superPrice'=>'Супер цена']
                )->label('Стикер');?>

        <?echo $form->field($model, 'availability')->dropdownList(
                    ['1'=>'В наличии', '0'=>'Заканчиваеться']
                )->label('Наличие');?>


            <?=$form->field($model, 'price')->textInput()->label('Цена товара')?>
           <?if ($good['oldprice']) {
                   echo $form->field($model, 'oldprice')->textInput()->label('Старая цена');
                 }else{
                 echo $form->field($model, 'oldprice')->label('Старая цена');
                 }?>
      
        <?echo $form->field($model, 'rating')->dropdownList(
                    ['0'=>'0', '0.5'=>'0.5', '1'=>'1', '1.5'=>'1.5', '2'=>'2', '2.5'=>'2.5', '3'=>'3', '3.5'=>'3.5', '4'=>'4', '4.5'=>'4.5', '5'=>'5']
                )->label('Рейтинг');?>

          <div id="feck_block_edit">
          <label for="colors" class="colorgod"><b>Особенности товара (Все возможные)</b></label><br>
          <div class="">
            <?foreach ($feches as $keyfe => $feche){?>
              <div class="fech_div">
              <? echo $form->field($model, $feche['namefech'])->checkbox(['label'=>'<img src="/web/images/static/'.$feche["wayfech"].'">','id'=>'public_chek','class'=>'checkbox_inpu_fech']);
               ?></div><?}?>
                </div>
                </div>

              <?if($good['public']){$public = 5;}?>
              <?= $form->field($model, 'public')->checkbox(['checked ' => $public,'label'=>'Опубликовать','id'=>'public_chek']) ?>
                <b><span id="public_checkbox">Описание товара</span><br>


               <?= $form->field($model, 'description')->textArea(['rows' => 6, 'id' => 'limitInput', 'class' => 'form-control','value'=>$good['description']])->label(false) ?>
                
                <?= Html::submitButton('Добавить товар', ['class' => 'btn btn-primary']) ?>
                 </div>
                  <div id="block_img_edit">

                <label for="photo" class="colorgod"><b>Главное Фото:</b></label><br>
                <?= $form->field($model, 'imageFile')->fileInput(['class'=>'fileinputclass'])->label(false)?>

                <label for="photo" class="colorgod"><b>Фото 2:</b></label>
                  <?= $form->field($model, 'imageadditional1')->fileInput(['class'=>'fileinputclass'])->label(false)?>

                <label for="photo" class="colorgod"><b>Фото 3:</b></label>
                  <?= $form->field($model, 'imageadditional2')->fileInput(['class'=>'fileinputclass'])->label(false)?>

                <label for="photo" class="colorgod"><b>Фото 4:</b></label>
                  <?= $form->field($model, 'imageadditional3')->fileInput(['class'=>'fileinputclass'])->label(false)?>

              </div>
              <div id="colors_table_check">
               <label for="colors" class="colorgod"><b>Цвет товара (Все возможные)</b></label><br>
               
               <?foreach ($colors as $idi => $color) {?>
                    <div class="colors_forms">
                  <?=$form->field($model, $color['namecolor'])->checkbox(['label'=>$color['linkcolor'],'id'=>'','class'=>'']);?>
                  </div>
           
                <?}?>
                  </div>
                <?ActiveForm::end()?>
              </div>

            </div>

