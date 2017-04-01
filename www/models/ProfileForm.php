<?php

namespace app\models;
use yii\base\Model;
use app\models\User;
use Yii;


/**
 * ContactForm is the model behind the contact form.
 */
class ProfileForm extends Model
{
    public $name;
    public $surname;
    public $patronymic;
    public $phone;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
        ['phone','integer'],
        ['name','string'],
        ['surname','string'],
        ['patronymic','string'],

        ];
    }

        public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'phone' => 'Телефон',
        ];
    }

}
