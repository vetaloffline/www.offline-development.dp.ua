<?php

namespace app\modules\admin\models;

use Yii;


class OrderGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_goods';
    }

    public function getHistoryOForders(){
        return $this->hasOne(HistoryOForders::classname(),['id'=>'id_order']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_good', 'id_order', 'count', 'price'], 'required'],
            [['id_good', 'id_order', 'count','id'], 'integer'],
            [['price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_good' => 'Id Good',
            'id_order' => 'Id Order',
            'count' => 'Count',
            'price' => 'Price',
            'id' => 'ID',
        ];
    }
}
