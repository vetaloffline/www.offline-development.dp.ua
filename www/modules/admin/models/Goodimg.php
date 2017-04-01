<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "goodimg".
 *
 * @property integer $id_img
 * @property string $communication
 * @property string $nameimg
 * @property string $descriptionimg
 * @property integer $good_id
 */
class Goodimg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goodimg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['communication', 'nameimg', 'descriptionimg', 'good_id'], 'required'],
            [['communication'], 'string', 'max' => 255],
            [['nameimg', 'descriptionimg'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_img' => 'Id Img',
            'communication' => 'Communication',
            'nameimg' => 'Nameimg',
            'descriptionimg' => 'Descriptionimg',
            'good_id' => 'Good ID',
        ];
    }
}
