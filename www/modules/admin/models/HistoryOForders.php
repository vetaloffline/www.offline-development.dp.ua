<?php

namespace app\modules\admin\models;

use Yii;

class Historyoforders extends \yii\db\ActiveRecord
{
 
    public static function tableName()
    {
        return 'HistoryOForders';
    }

    public function rules()
    {
        return [
            [['id_user', 'phone','id'], 'integer'],
           // [['status','nameuser', 'surname', 'phone', 'summa', 'payment', 'delivery'], 'required'],
            [['summa'], 'number'],
            [['status', 'nameuser', 'surname', 'city'], 'string', 'max' => 255],
            [['data'], 'string', 'max' => 100],
            [['payment', 'delivery'], 'string', 'max' => 80],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'status' => 'Status',
            'data' => 'Data',
            'nameuser' => 'Nameuser',
            'surname' => 'Surname',
            'phone' => 'Phone',
            'summa' => 'Summa',
            'payment' => 'Payment',
            'delivery' => 'Delivery',
            'city' => 'City',
        ];
    }
}
