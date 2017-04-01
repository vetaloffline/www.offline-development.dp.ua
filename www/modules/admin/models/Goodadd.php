<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Goodfeche;
use app\modules\admin\models\Formeditgood;
use app\modules\admin\models\Colors;
use app\modules\admin\models\Goodcolors;
use app\modules\admin\models\Feche;
use yii\web\UploadedFile;
use app\modules\admin\models\Goodimg;

class Goodadd extends \yii\db\ActiveRecord
{

	 public function getFeches()
	{
		return Feche::find()->all();
	}

	 public function getColors()
	{
		return Goodcolors::find()->all();
	}






}