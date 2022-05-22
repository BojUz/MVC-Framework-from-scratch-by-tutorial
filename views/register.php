<?php
/** @var $model \app\models\User */


$this->title= 'Register';
?>
<h1>Register</h1>
<?php $form = \app\core\form\Form::begin('','post','');
//$model = \app\models\RegisterModel::class;
?>
<?php //$model = \app\models\RegisterModel::class;
echo $form->field($model, 'firstname') ?>
<?php echo $form->field($model, 'lastname') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<?php echo $form->field($model, 'rePass')->passwordField()  ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php \app\core\form\Form::end() ?>
<!--<form action="" method="post">-->

<!--<div class="mb-3">-->
<!--    <label>First name</label>-->
<!--    <input type="text" name="firstname" value="--><?php //echo $model->firstname ?><!--"-->
<!--           class="form-control--><?php //echo $model->hasError('firstname') ? 'is-invalid': '' ?><!--">-->
<!--<div class="invalid-feedback">-->
<!--    --><?php //echo $model->getFirstError('firstname') ?>
<!--</div>-->
<!--  </div>-->
<!--  <div class="mb-3">-->
<!--    <label for="exampleInputEmail1" class="form-label">Last Name</label>-->
<!--    <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">-->
<!---->
<!--  </div>-->
<!--  <div class="mb-3">-->
<!--    <label for="exampleInputEmail1" class="form-label">Email address</label>-->
<!--    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">-->
<!---->
<!--  </div>-->
<!--  <div class="mb-3">-->
<!--    <label for="exampleInputPassword1" class="form-label">Password</label>-->
<!--    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">-->
<!--  </div>-->
<!--  <div class="mb-3">-->
<!--    <label for="exampleInputPassword1" class="form-label">Repeat Password</label>-->
<!--    <input type="password" name="rePass" class="form-control" id="exampleInputPassword1">-->
<!--  </div>-->
<!--  <div class="mb-3 form-check">-->
<!--    <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
<!--    <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
<!--  </div>-->
<!--<button type="submit" class="btn btn-primary">Submit</button>-->
<!--</form>-->