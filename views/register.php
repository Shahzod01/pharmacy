<h1>Register to site</h1>
<?php

use App\Core\Form\Form;

$form = Form::begin('', 'post'); ?>

<?php $form->field($model, 'firstname') ?>
<?php $form->field($model, 'lastname') ?>
<?php $form->field($model, 'email') ?>
<?php $form->field($model, 'password') ?>
<?php $form->field($model, 'confirmPasswor') ?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php Form::end(); ?>
<!-- <form action="" method="post">
    <div class="mb-3">
        <label for="firstName" class="form-label">First Name</label>
        <input type="text" class="form-control <?php // echo $model->hasError('firstname') ? " is-invalid" : '' ?>" name="firstname" id="firstName">
        <div class="invalif-feedback">
            <?php //echo $model->getFirstError('firstname'); ?>
        </div>
    </div>
    <div class="mb-3">
        <label for="lastName" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="lastname" id="lastName">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">E-mail address</label>
        <input type="email" class="form-control" name="email" id="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form> -->