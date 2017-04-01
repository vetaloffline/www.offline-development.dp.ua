<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\HistoryOForders */

$this->title = 'Create History Oforders';
$this->params['breadcrumbs'][] = ['label' => 'History Oforders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-oforders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
