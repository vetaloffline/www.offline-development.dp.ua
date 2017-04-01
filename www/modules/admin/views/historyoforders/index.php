<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'History Oforders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-oforders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create History Oforders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'status',
            'data',
            'name',
            // 'surname',
            // 'phone',
            // 'summa',
            // 'payment',
            // 'delivery',
            // 'city',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
