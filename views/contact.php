<?php
/** @var $this \app\core\View */
/** @var $model \app\models\ContactForm*/
use app\core\form\TextareaField;

$this->title= 'Contact';
?>
<h1>Contact</h1>
<?php $form = \app\core\form\Form::begin('', 'post');
echo $form->field($model, 'subject');
echo $form->field($model, 'email');
echo new TextareaField($model, 'body')?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php \app\core\form\Form::end()?>
