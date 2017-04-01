<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;
class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    public static function tableName(){
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
       return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      //return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by login
     *
     * @param string $login
     * @return static|null
     */
    public static function findByLogin($login)
    {
        return static::findOne(['login'=>$login]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authkey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authkey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
    // password_verify($_POST['LoginForm']['password'], $password);

        //return $this->password === $password;
      //  return \Yii::$app->security->validatePassword($password,$this->password);
    }

    public function generateAuthKey(){
        $this->authkey= Yii::$app->security->generateRandomString();
    }
}
