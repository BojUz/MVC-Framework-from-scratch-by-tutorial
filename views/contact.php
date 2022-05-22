<?php
/** @var $this \app\core\View */
/** @var $model \app\models\ContactForm*/
use app\core\form\TextareaField;

$this->title= 'Contact';
?>
<h1>Contact</h1>
<?php $form = \app\core\form\Form::begin('', 'post','form1');
echo $form->field($model, 'subject');
echo $form->field($model, 'email');
echo new TextareaField($model, 'body')?>
<button type="submit" name="form" class="btn btn-primary">Submit</button>
<?php \app\core\form\Form::end()?>
<h2>Form2</h2>
<?php $form = \app\core\form\Form::begin('', 'post','form2');
echo $form->field($model, 'subject');
echo $form->field($model, 'email');
echo new TextareaField($model, 'body')?>
<button type="submit" name="form2" class="btn btn-secondary">Submit</button>
<?php \app\core\form\Form::end()?>
