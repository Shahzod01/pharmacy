<h1>Login</h1>
<?php

use App\Core\Form\Form;

$form = Form::begin('', 'post'); ?>

<?php echo $form->field($model, 'email') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end(); ?>
