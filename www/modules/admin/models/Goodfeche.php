<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "goodfeche".
 *
 * @property integer $idgood
 * @property integer $idfeche
 */
class Goodfeche extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goodfeche';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idgood', 'idfeche'], 'required'],
            [['idgood', 'idfeche'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idgood' => 'Idgood',
            'idfeche' => 'Idfeche',
        ];
    }
}
