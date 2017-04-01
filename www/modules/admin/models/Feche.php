<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "feche".
 *
 * @property integer $id
 * @property string $namefech
 * @property string $wayfech
 */
class Feche extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feche';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['namefech', 'wayfech'], 'required'],
            [['namefech', 'wayfech'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'namefech' => 'Namefech',
            'wayfech' => 'Wayfech',
        ];
    }
}
