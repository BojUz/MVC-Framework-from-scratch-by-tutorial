<?php

namespace app\models;

use app\core\Model;
use mysql_xdevapi\CollectionModify;

class ContactForm extends Model
{
    public string $subject ='';
    public string $email ='';
    public string $body ='';
    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIERED],
            'email' => [self::RULE_REQUIERED],
            'body' => [self::RULE_REQUIERED],

        ];
    }
    public function labels(): array
    {
        return [
        'subject' => 'Enter your subject',
            'email' => 'Your email',
            'body' => 'Body',
        ];
    }
    public function send()
    {
        return true;
    }
}