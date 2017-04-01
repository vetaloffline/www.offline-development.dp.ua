<?php

namespace app\modules\admin\models;

use Yii;


class Users extends \yii\db\ActiveRecord
{   

    
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['name', 'surname', 'patronymic', 'email', 'password', 'avatar_mean', 'avatar_full', 'login', 'role', 'social', 'authkey'], 'required'],
            [['name', 'surname', 'patronymic', 'email', 'password'], 'string'],
            [['phone', 'role', 'social','id'], 'integer'],
            [['avatar_mean', 'avatar_full', 'login', 'authkey'], 'string', 'max' => 255],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'phone' => 'Phone',
            'email' => 'Email',
            'password' => 'Password',
            'id' => 'ID',
            'avatar_mean' => 'Avatar Mean',
            'avatar_full' => 'Avatar Full',
            'login' => 'Login',
            'role' => 'Role',
            'social' => 'Social',
            'authkey' => 'Authkey',
        ];
    }
}
