<?php

namespace app\modules\admin\models;
use app\modules\admin\models\Goodimg;
use Yii;


class Goods extends \yii\db\ActiveRecord
{
   
    public static function tableName()
    {
        return 'goods';
    }

    public function getImg(){
        return $this->hasMany(Goodimg::className(),['good_id'=>'id','communication'=>'main']);
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'price','availability','categories'], 'required'],
            [['price', 'oldprice', 'rating'], 'number'],
            [['description'], 'string'],
            [['public', 'availability', 'categories'], 'integer'],
            [['name', 'alias'], 'string', 'max' => 255],
            [['demo', 'video'], 'string', 'max' => 1000],
            [['sticker'], 'string', 'max' => 11],
        ];
    }

     
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'description' => 'Description',
            'public' => 'Public',
            'demo' => 'Demo',
            'video' => 'Video',
            'sticker' => 'Sticker',
            'availability' => 'Availability',
            'oldprice' => 'Oldprice',
            'rating' => 'Rating',
            'alias' => 'Alias',
            'categories' => 'Categories',
        ];
    }
}
