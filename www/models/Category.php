<?
namespace app\models;
use yii\db\ActiveRecord;


class Category extends ActiveRecord
{
	
	public static function tableName(){
		return 'category';
	}

	public function getGoods(){
		return $his->hasmany(Goods::classname(),['categories'=>'id']);
	}
}