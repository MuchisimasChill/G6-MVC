<h1>Create Account</h1>

<?php

use app\basic\form\Form;

$form =  Form::start('', 'post');
?>
  <?php echo $form->field($model, 'first_name') ?>
  <?php echo $form->field($model, 'second_name') ?>
  <?php echo $form->field($model, 'email') ?>
  <?php echo $form->field($model, 'password')->passwordField()?>
  <?php echo $form->field($model, 'confirm_password')->passwordField()?>
  <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end() ?>