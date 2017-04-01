<?
namespace app\models;

use yii\db\ActiveRecord;
use yii\web\Controller;
use Yii;

class GetGoods extends ActiveRecord
{
	 public  function Kategory($id){

 		 $goods = Yii::$app->db->createCommand("SELECT * FROM goods G JOIN ( 
 			SELECT nameimg,good_id
 			FROM goodimg Img 
 			WHERE Img.communication = 'main' 
 			AND Img.descriptionimg = 'mean_img') sss
 			ON G.id = sss.good_id
 			WHERE G.categories = '".$id."'")->queryAll();
 		 foreach ($goods as $key => $value) {
 		 	if (!$i) {
 		 		$ides .=$value['id'];
 		 	}else{
 		 		$ides .=','.$value['id'];}
 		 		$i++;
 		 		}
 		 	if ($ides) {
 		 		
 		 	
 		$feche = Yii::$app->db->createCommand("SELECT * FROM goodfeche JOIN feche ON id = idfeche WHERE idgood IN($ides)")->queryAll();

 		$colors = Yii::$app->db->createCommand("SELECT * FROM goodcolors JOIN colors ON id = idcolor WHERE idgood IN($ides)")->queryAll();

 		foreach ($goods as $key => $good) {
 			foreach ($feche as $ke => $fech) {
 				
 				if ($good['id'] == $fech['idgood']) {
 					$i++;
 					$goods[$key]['feches'][$i]['namefech']=$fech['namefech'];
 					$goods[$key]['feches'][$i]['wayfech']=$fech['wayfech'];
 				}
 			}
 		}
 		foreach ($goods as $key => $good) {
 			foreach ($colors as $ke => $color) {
 				
 				if ($good['id'] == $color['idgood']) {
 					$i++;
 					$goods[$key]['colors'][$i]['namecolor']=$color['namecolor'];
 					$goods[$key]['colors'][$i]['linkcolor']=$color['linkcolor'];
 				}
 			}
 		}
 		return $goods;
 		
 	}

    }

    public  function GetTopGoods(){
 		
 		$goods = Yii::$app->db->createCommand("SELECT * FROM goods G JOIN ( 
 			SELECT nameimg,good_id
 			FROM goodimg Img 
 			WHERE Img.communication = 'main' 
 			AND Img.descriptionimg = 'mean_img') sss
 			ON G.id = sss.good_id
 			WHERE G.sticker = 'topSales'")->queryAll();
 		 foreach ($goods as $key => $value) {
 		 	if (!$i) {
 		 		$ides .=$value['id'];
 		 	}else{
 		 		$ides .=','.$value['id'];}
 		 		$i++;
 		 		}
 		$feche = Yii::$app->db->createCommand("SELECT * FROM goodfeche JOIN feche ON id = idfeche WHERE idgood IN($ides)")->queryAll();

 		$colors = Yii::$app->db->createCommand("SELECT * FROM goodcolors JOIN colors ON id = idcolor WHERE idgood IN($ides)")->queryAll();

 		foreach ($goods as $key => $good) {
 			foreach ($feche as $ke => $fech) {
 				
 				if ($good['id'] == $fech['idgood']) {
 					$i++;
 					$goods[$key]['feches'][$i]['namefech']=$fech['namefech'];
 					$goods[$key]['feches'][$i]['wayfech']=$fech['wayfech'];
 				}
 			}
 		}
 		foreach ($goods as $key => $good) {
 			foreach ($colors as $ke => $color) {
 				
 				if ($good['id'] == $color['idgood']) {
 					$i++;
 					$goods[$key]['colors'][$i]['namecolor']=$color['namecolor'];
 					$goods[$key]['colors'][$i]['linkcolor']=$color['linkcolor'];
 				}
 			}
 		}
 		return $goods;
    }


    public  function GetGood($id){
 		$good = Yii::$app->db->createCommand("

 			SELECT *
 			FROM goods 
 			WHERE id = '".$id."' 
 			")->queryAll();
 		$good = $good[0];
 		$image_small = Yii::$app->db->createCommand("

 			SELECT nameimg,communication,good_id
 			FROM goodimg 
 			WHERE good_id = '".$id."' AND descriptionimg = 'small_img' 
 			")->queryAll();
 		foreach ($image_small as $key => $value) {
 			$images['small'][]=$value['nameimg'];
 			
 		}
 		$image_main = Yii::$app->db->createCommand("

 			SELECT nameimg,communication,good_id
 			FROM goodimg 
 			WHERE good_id = '".$id."' AND descriptionimg = 'mean_img' 

 			")->queryAll();
 		$images['main'][] = $image_main[0]['nameimg'];

 		$good['images'] = $images;

 		$colors = Yii::$app->db->createCommand("

 			SELECT idgood,idcolor,namecolor,linkcolor
 			FROM colors 
 			INNER JOIN goodcolors
 			ON idcolor = id
 			WHERE idgood = '".$id."' 
 			")->queryAll();

 		$good['colors'] = $colors;

 		return $good;	
    }
}