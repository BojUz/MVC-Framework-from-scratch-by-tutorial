<?php

namespace app\models;

use app\core\UserModel;

class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DElETED = 2;


    public string $firstname ='';
    public string $lastname='';
    public string $email='';
    public int $status=self::STATUS_INACTIVE;
    public string $password ='';
    public string $rePass='';

    public function tableName():string
    {
        return 'users';
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        $this->status=self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();

    }

    public function rules(): array
    {
        return [
            'firstname' =>[self::RULE_REQUIERED],
            'lastname' =>[self::RULE_REQUIERED],
            'email' =>[self::RULE_REQUIERED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class'=> self::class,'attribute'=>'email']],
            'password' =>[self::RULE_REQUIERED, [self::RULE_MAX, 'max'=>32], [self::RULE_MIN, 'min'=>8]],
            'rePass' =>[self::RULE_REQUIERED, [self::RULE_MATCH, 'match'=>'password']]
        ];
    }
    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email','password', 'status'];
    }

    public function labels(): array
    {
        return ['firstname' => 'First name',
        'lastname' => 'Last name',
        'email' => 'Email address',
        'password' => 'Password',
        'rePass' => 'Confirm password'];

    }
    public function getDisplayName(): string
    {
        return $this->firstname.' '.$this->lastname;

    }
}
