<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "order_goods".
 *
 * @property integer $id_good
 * @property integer $id_order
 * @property integer $count
 * @property double $price
 */
class OrderGoods extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_goods';
    }
     public function Historyoforders(){
        return $this->hasOne(Historyoforders::classname(),['id'=>'id_order']);
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_good', 'id_order', 'count', 'price'], 'required'],
            [['id_good', 'id_order', 'count'], 'integer'],
            [['price'], 'number'],
        ];
    }

}
