<?php

namespace app\core\form;

use app\models\User;
use app\models\LoginForm;

class Form
{
    public static function begin($action, $method, $name)
    {
        echo sprintf('<form action="%s" method="%s" name ="%s">', $action, $method,$name);
        return new Form();
    }

    public static function end()
    {
        echo '</form>';
    }

    public function field($model, $attribute)
    {
        return new InputField($model, $attribute);
    }
}