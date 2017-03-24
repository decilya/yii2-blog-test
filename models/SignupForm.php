<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * SignupForm
 *
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $verifyCode
 *
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот логин уже занят.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'required'],
            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Этот email уже занят.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['verifyCode', 'captcha'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }

}