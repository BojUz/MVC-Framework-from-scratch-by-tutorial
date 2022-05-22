<?php

namespace app\models;

use app\controllers\SiteController;
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
            'bodyA' => 'Second body',

        ];
    }
    public function isSend()
    {
        if(isset($_POST['form']))return 'form' ;
        else if(isset($_POST['form2']))return 'form2';

    }
}