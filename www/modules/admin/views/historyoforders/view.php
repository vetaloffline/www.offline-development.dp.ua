<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\HistoryOForders */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'History Oforders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-oforders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_user',
            'status',
            'data',
            'name',
            'surname',
            'phone',
            'summa',
            'payment',
            'delivery',
            'city',
        ],
    ]) ?>
<?
$orders = $model->orderGoods;
foreach ($orders as $ky => $id) {$ides[$id->id_good] = $id->count;}?>
</div>
<div><h2>Товары</h2></div>
<div class="table_view_good">
<table class="table table-striped">
            <tr>
                <td class="td_view">Наименования</td>
                <td class="td_view1">Цена</td>
                <td class="td_view1">Количество</td>
                <td class="td_view1">Сумма</td>
            </tr>
    <?
    foreach ($goods as $key => $value) {?>
        <table class="table table-striped">
            <tr>
                <td class="td_view"><?=$value['name']?></td>
                <td class="td_view1"><?=$value['price']?></td>
                <td class="td_view1"><?=$ides[$value['id']]?></td>
                <td class="td_view1"><?=$ides[$value['id']]*$value['price']?></td>
            </tr>
       
   <? }?>
   </table>
</div>
