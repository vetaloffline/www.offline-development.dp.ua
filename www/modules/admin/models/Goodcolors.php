<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "goodcolors".
 *
 * @property integer $id
 * @property string $namecolor
 * @property string $linkcolor
 */
class Goodcolors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goodcolors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['namecolor', 'linkcolor'], 'required'],
            [['namecolor', 'linkcolor'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'namecolor' => 'Namecolor',
            'linkcolor' => 'Linkcolor',
        ];
    }
}
