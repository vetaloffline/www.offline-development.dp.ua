<?php
namespace app\models;
use yii\base\Model;
use app\models\User;
use Yii;

class Singup extends Model{
	public $email;
	public $password;
	public function rules(){
		return[
			[['email','password'],'required'],
			['email', 'email'],
			['email','unique','targetClass'=>'app\models\User'],
			['password','string','min'=>4,'max'=>20]
		];
	}
	public function singup(){
		$user = new User();
		
		$user->email = $this->email;
		$user->password = password_hash(($this->password), PASSWORD_DEFAULT);
		$user->login = $this->email;
		$user->role = 20;
		return $user->save();
		
		
	}
}
?>