<?
namespace app\models;
use yii\db\ActiveRecord;


class Goods extends ActiveRecord
{
	
	public static function tableName(){  
		return 'goods';
	}

	public function getCategory(){
		return $his->hasone(Category::classname(),['id'=>'categories']);
	}
}