<?php
namespace app\modules\admin\models;

class Formeditgood extends \yii\base\Model
{
    public $name;
    public $price;
    public $demo;
    public $video;
    public $oldprice;
    public $categories;
    public $sticker;
    public $availability;
    public $rating;
    public $public;
    public $description;
    public $kredit;
    public $IPS_display;
    public $yader_8;
    public $black;
    public $white;
    public $yellow;
    public $red;
    public $imageFile;
    public $imageadditional1;
    public $imageadditional2;
    public $imageadditional3;



    public function rules()
    {
        return [
            [['name','price'],'required'],
            [['demo','video','sticker','availability','categories','rating','public','description','kredit','IPS_display','yader_8','black','white','yellow','red'],'string'],
            [['oldprice','price'],'integer'],
            [['imageFile','imageadditional1','imageadditional2','imageadditional3'], 'file','extensions' => 'png,jpg'],

        ];
    }

    public function upload($image)
    {  
         
        if ($this->$image->extension == 'png' || $this->$image->extension == 'jpg') {
            $nazvaimg=md5(microtime().uniqid().rand(0,9999));
            $nameimg = $nazvaimg.$this->$image->baseName . '.' . $this->$image->extension;
            $ds = $this->$image->saveAs('images/goods/' .$nameimg);
        return $nameimg;
           
        } else {
            return false;
        }
    }

    public function resize($file_input, $file_output, $w_o, $h_o, $percent = false) {
                list($w_i, $h_i, $type) = getimagesize($file_input);
                if (!$w_i || !$h_i) {
                    echo 'Невозможно получить длину и ширину изображения';
                    return;
                    }
                    $types = array('','gif','jpeg','png');
                    $ext = $types[$type];
                    if ($ext) {
                            $func = 'imagecreatefrom'.$ext;
                            $img = $func($file_input);
                    } else {
                            echo 'Некорректный формат файла';
                    return;
                    }
                if ($percent) {
                    $w_o *= $w_i / 100;
                    $h_o *= $h_i / 100;
                }
                if (!$h_o) $h_o = $w_o/($w_i/$h_i);
                if (!$w_o) $w_o = $h_o/($h_i/$w_i);

                $img_o = imagecreatetruecolor($w_o, $h_o);
                imagecopyresampled($img_o, $img, 0, 0, 0, 0, $w_o, $h_o, $w_i, $h_i);
                if ($type == 2) {
                    return imagejpeg($img_o,$file_output,100);
                } else {
                    $func = 'image'.$ext;
                    return $func($img_o,$file_output);
                }
            }

}