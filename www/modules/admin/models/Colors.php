<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "colors".
 *
 * @property integer $idgood
 * @property integer $idcolor
 */
class Colors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idgood', 'idcolor'], 'required'],
            [['idgood', 'idcolor'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idgood' => 'Idgood',
            'idcolor' => 'Idcolor',
        ];
    }
}
