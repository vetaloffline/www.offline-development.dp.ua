<?php

namespace app\models;

use Yii;
use yii\base\Model;


class EditpasswordForm extends Model
{
  
    public $password;
    public $secondpassword;
   

    public function rules()
    {
        return [
            [['secondpassword', 'password'], 'required'],
            [['secondpassword', 'password'], 'string', 'length' => [5, 24]],
            ['secondpassword', 'compare', 'compareAttribute' => 'password'],
            [['password','secondpassword'], 'validatePassword'],

        ];
    }

    public function attributeLabels(){
        return [

            'password'=>'Новый пароль',
            'secondpassword'=>'Повторите пароль',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            $valid =    password_verify($_POST['LoginForm']['password'], $user->password);
            if (!$user || !$valid) {
                $this->addError($attribute, 'Логин или пароль введены не верно');
            }
        }
    }

    public function editPassword($password){
        $id = Yii::$app->user->id;
        $user = User::findOne($id);
        $user->password = password_hash(($password), PASSWORD_DEFAULT);
        return $user->save();
    }


   
}
