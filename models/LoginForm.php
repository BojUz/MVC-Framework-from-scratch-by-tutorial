<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{
    public string $email ='';
    public string $password ='';
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIERED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIERED]
        ];
    }
    public function labels(): array
    {
        return [
            'email' =>'Your email address',
            'password' =>'Your password'
        ];
    }

    public function login()
    {
       $user = User::findOne(['email' => $this->email]);
        if(!$user)
        {
            $this->addError('email', 'User does not exists!');
            return false;
        }
        if(!password_verify($this->password, $user->password)){
            $this->addError('password', 'Password does not match the user!');
            return false;
        }
        return Application::$app->login($user);
    }
}