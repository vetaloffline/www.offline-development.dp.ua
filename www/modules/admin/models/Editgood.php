<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Goodfeche;
use app\modules\admin\models\Formeditgood;
use app\modules\admin\models\Colors;
use app\modules\admin\models\Goodcolors;
use app\modules\admin\models\Feche;
use yii\web\UploadedFile;
use app\modules\admin\models\Goodimg;

class Editgood extends \yii\db\ActiveRecord
{
  public function getImages($id){

    $images = Yii::$app->db->createCommand("SELECT nameimg,good_id,communication FROM goodimg WHERE descriptionimg IN('additional_foto','mean_img') AND good_id = ".$id."")->queryAll();

    foreach ($images as $key => $image) {
      $img[$image['communication']] = $image['nameimg'];
    }
    return $img;

  }

  public function getColors($id){

    return Yii::$app->db->createCommand("SELECT * FROM goodcolors Co LEFT JOIN(SELECT * FROM colors WHERE idgood = ".$id.") Color ON Color.idcolor = Co.id")->queryAll();

  }

  public function getFeches($id){

    return Yii::$app->db->createCommand("SELECT * FROM feche Fe LEFT JOIN(SELECT * FROM goodfeche WHERE idgood = ".$id.") Fech ON Fech.idfeche = Fe.id")->queryAll();

  }

  public function getcategory($id){

    return Yii::$app->db->createCommand("SELECT * FROM category Ca LEFT JOIN(SELECT categories,id FROM goods WHERE id = ".$id.") Go ON Ca.id = Go.categories")->queryAll();

  }

  public function getGoodsmalimg(){
    return Yii::$app->db->createCommand("SELECT * FROM goods Go JOIN(SELECT nameimg,good_id FROM goodimg WHERE communication='main' AND descriptionimg='small_img') Img ON Go.id = Img.good_id")->queryAll();
  }

  public function updateColors($model,$id){
    Colors::deleteAll(['idgood'=>$id]);
            $colorsgood = Goodcolors::find()->asArray()->all();
            foreach ($colorsgood as $key => $value) {
                    $namecolor = $value['namecolor'];
                    if ($model->$namecolor) {
                       $modelgood = new Colors();
                       $modelgood->idgood = $id;
                       $modelgood->idcolor = $value['id'];
                       $modelgood->save();
                }
            }
  }

  public function updateFeches($model,$id){
    Goodfeche::deleteAll(['idgood'=>$id]);
            $fechesgood = Feche::find()->asArray()->all();
            foreach ($fechesgood as $ke => $val) {
                    $namefech = $val['namefech'];
                    if ($model->$namefech) {
                       $modelgood = new Goodfeche();
                       $modelgood->idgood = $id;
                       $modelgood->idfeche = $val['id'];
                       $modelgood->save();
                }
            }

  }


  public function updateMainImg($id,$model){
           $goodimages = Goodimg::find()->where(['good_id'=>$id,'communication'=>'main'])->all();
                   foreach ($goodimages as $keyimg => $img) {
                       $ss = file_exists('images/goods/'.$img->nameimg);
                       if (file_exists('images/goods/'.$img->nameimg)) {
                        $nameimgfile = 'images/goods/'.$img->nameimg;
                           unlink($nameimgfile);
                       }
                   }


             
                $nameimg = $model->upload('imageFile');

                if ($nameimg) {  
                    $Goodimgfile = Goodimg::findOne(['good_id'=>$id,'communication'=>'main','descriptionimg'=>'full_img']);
                    if ($Goodimgfile) {
                      $Goodimgfile->nameimg = $nameimg;
                    $Goodimgfile->save();
                    }else{
                       $Goodimgfile = new Goodimg();
                      $Goodimgfile->nameimg = $nameimg;
                      $Goodimgfile->communication = 'main';
                      $Goodimgfile->descriptionimg = 'full_img';
                      $Goodimgfile->good_id = $id;
                      $Goodimgfile->save();
                    }
                }
            
                $file_input='images/goods/'.$nameimg;
                $file_output='images/goods/mean_img'.$nameimg;
                $mean_img='mean_img'.$nameimg;
                $size_img=getimagesize('images/goods/'.$nameimg);
                //debug($size_img);
                if ($size_img[0] > $size_img[1])
                {
                    $w_o=130;
                    $validimg = $model->resize($file_input,  $file_output,  $w_o,  $h_o);
                }
                else
                {
                    $h_o=150;
                    $validimg = $model->resize($file_input,  $file_output,  $w_o,  $h_o);
                }
                if ($validimg) {
                //  debug($validimg);
                  $Goodimgfile1 = Goodimg::findOne(['good_id'=>$id,'communication'=>'main','descriptionimg'=>'mean_img']);
                  if ($Goodimgfile1) {
                    $Goodimgfile1->nameimg = $mean_img;
                  $Goodimgfile1->save();
                  }else{

                      $Goodimgfile1 = new Goodimg();
                      $Goodimgfile1->nameimg = $mean_img;
                      $Goodimgfile1->communication = 'main';
                      $Goodimgfile1->descriptionimg = 'mean_img';
                      $Goodimgfile1->good_id = $id;
                      $Goodimgfile1->save();
                  }
                  
              }


                //////////////////////FOTO BASKET

              $file_output='images/goods/small_img'.$nameimg;
              $small_img='small_img'.$nameimg;


              if ($size_img[0] > $size_img[1])
              {
                $w_o=40;
                $validimg1 = $model->resize($file_input,  $file_output,  $w_o,  $h_o);
            }
            else
            {
                $h_o=40;
                $validimg1 = $model->resize($file_input,  $file_output,  $w_o,  $h_o);
            }
            if ($validimg1) {
                $Goodimgfile1 = Goodimg::findOne(['good_id'=>$id,'communication'=>'main','descriptionimg'=>'small_img']);
                if ($Goodimgfile1) {
                  $Goodimgfile1->nameimg = $small_img;
                  $Goodimgfile1->save();
                }else{
                    $Goodimgfile2 = new Goodimg();
                      $Goodimgfile2->nameimg = $small_img;
                      $Goodimgfile2->communication = 'main';
                      $Goodimgfile2->descriptionimg = 'small_img';
                      $Goodimgfile2->good_id = $id;
                      $Goodimgfile2->save();
                }
           }

          ////////////////REKLAMA

           $file_output='images/goods/reklama_img'.$nameimg;
           $reklama_img='reklama_img'.$nameimg;


           if ($size_img[0] > $size_img[1])
           {
            $w_o1=80;
            $validimg2 = $model->resize($file_input,  $file_output,  $w_o1,  $h_o1);
        }
        else
        {
            $h_o1=100;
            $validimg2 = $model->resize($file_input,  $file_output,  $w_o1,  $h_o1);
        }
        if ($validimg2) {
            $Goodimgfile1 = Goodimg::findOne(['good_id'=>$id,'communication'=>'main','descriptionimg'=>'reklama_img']);
            if ($Goodimgfile1) {
              $Goodimgfile1->nameimg = $reklama_img;
           $Goodimgfile1->save();
            }else{
                $Goodimgfile3 = new Goodimg();
                      $Goodimgfile3->nameimg = $reklama_img;
                      $Goodimgfile3->communication = 'main';
                      $Goodimgfile3->descriptionimg = 'reklama_img';
                      $Goodimgfile3->good_id = $id;
                      $Goodimgfile3->save();
            }
          
       }

}
    public function updateAdditionalImg($id,$model,$additi,$modelimage){

        $goodimages = Goodimg::find()->where(['good_id'=>$id,'communication'=>$additi])->all();
                   foreach ($goodimages as $keyimg => $img) {
                       $ss = file_exists('images/goods/'.$img->nameimg);
                       if (file_exists('images/goods/'.$img->nameimg)) {
                        $nameimgfile = 'images/goods/'.$img->nameimg;
                           unlink($nameimgfile);
                       }
                   }

        //Goodimg::deleteAll(['good_id'=>$id,'communication'=>$additi]);

               $nameimg = $model->upload($modelimage);
               //$nameimg = '_additional_foto'.$nameimg;
                $Goodimgfile2 = Goodimg::findOne(['good_id'=>$id,'communication'=>$additi,'descriptionimg'=>'additional_foto']);
   
                if ($nameimg && $Goodimgfile2) {
                    $Goodimgfile2->nameimg = $nameimg;
                    $Goodimgfile2->save();
                 }else{
                  $Goodimgfile = new Goodimg();
                  $Goodimgfile->nameimg = $nameimg;
                      $Goodimgfile->communication = $additi;
                      $Goodimgfile->descriptionimg = 'additional_foto';
                      $Goodimgfile->good_id = $id;
                      $Goodimgfile->save();
                 }


               
                $file_input='images/goods/'.$nameimg;
                $file_output='images/goods/small_img'.$nameimg;
                //debug($nameimg);
                $size_img=getimagesize('images/goods/'.$nameimg);

                if ($size_img[0] > $size_img[1])
                {
                    $w_o=40;
                    $validimg = $model->resize($file_input,  $file_output,  $w_o,  $h_o);
                }
                else
                {
                    $h_o=40;
                    $validimg = $model->resize($file_input,  $file_output,  $w_o,  $h_o);
                }
                if ($validimg) {
                    $nameimg = 'small_img'.$nameimg;
                 $Goodimgfile3 = Goodimg::findOne(['good_id'=>$id,'communication'=>$additi,'descriptionimg'=>'small_img']);
                 if ($Goodimgfile3) {
                   $Goodimgfile3->nameimg = $nameimg;
                  $Goodimgfile3->save();
                 }else{
                  $Goodimgfilee1 = new Goodimg();
                  $Goodimgfilee1->nameimg = $nameimg;
                      $Goodimgfilee1->communication = $additi;
                      $Goodimgfilee1->descriptionimg = 'small_img';
                      $Goodimgfilee1->good_id = $id;
                      $Goodimgfilee1->save();
                 }
                  
              }


    }


     public function Deleteimg($id,$foto){
           

            $images = Goodimg::find()->where(['good_id'=>$id,'communication'=>$foto])->all();
            
            foreach ($images as $key => $value) {
               if (file_exists('images/goods/'.$value->nameimg)) {
                        $nameimgfile = 'images/goods/'.$value->nameimg;
                           unlink($nameimgfile);
                       } 
            }
            Goodimg::deleteAll(['good_id'=>$id,'communication'=>$foto]);
    }

    



  


}