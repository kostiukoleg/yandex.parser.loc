<?php
namespace app\models;

use yii\base\Model;

class Signup extends Model 
{
	public $name;
	public $email;
	public $site;
	public $phone;
	public $password;
	public $role;
	public $photo;
	public $captcha;
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        	[['name', 'email', 'password'], 'required'],
        	[['email'], 'email'],
            [['password'], 'string', 'min' => 4, 'max' => 255],
            [['site', 'phone'], 'string', 'max' => 255],
            [['name', 'email'], 'unique', 'targetClass' => 'app\models\User'],
            [['photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, png, gif'],
        ];
    }

	 /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Логин',
            'email' => 'Емейл',
            'site' => 'Ваш Сайт',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'photo' => 'Фото',
            'captcha' => 'Капча'
        ];
    }

    public function signup()
    {
    	$user = new User();
    	$user->name = $this->name;
    	$user->email = $this->email;
    	$user->site = $this->site;
    	$user->phone = $this->phone;
    	$user->password = sha1($this->password);
    	$user->photo = $this->photo;
    	return $user->save();

    }
}