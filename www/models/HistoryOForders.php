<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "HistoryOForders".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $status
 * @property string $data
 * @property string $nameuser
 * @property string $surname
 * @property integer $phone
 * @property double $summa
 * @property string $payment
 * @property string $delivery
 * @property string $city
 */
class HistoryOForders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'HistoryOForders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'phone'], 'integer'],
            [['status', 'nameuser', 'surname', 'phone', 'summa', 'payment', 'delivery'], 'required'],
            [['summa'], 'number'],
            [['status', 'nameuser', 'surname', 'city'], 'string', 'max' => 255],
            [['data'], 'string', 'max' => 100],
            [['payment', 'delivery'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'status' => 'Status',
            'data' => 'Data',
            'nameuser' => 'Имя',
            'surname' => 'Фамилия',
            'phone' => 'Телефон',
            'summa' => 'Summa',
            'payment' => 'Оплата',
            'delivery' => 'Доставка',
            'city' => 'City',
        ];
    }
}
