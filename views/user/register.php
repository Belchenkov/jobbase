<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\user */
/* @var $form ActiveForm */
?>
<div class="user-register">

    <?php $form = ActiveForm::begin(); ?>
        <?php echo $form->errorSummary($user); ?>
        <?php echo $form->field($user, 'full_name');?>
        <?php echo $form->field($user, 'username');?>
        <?php echo $form->field($user, 'email');?>
        <?php echo $form->field($user, 'password')->passwordInput();?>
        <?php echo $form->field($user, 'password_repeat')->passwordInput();?>


        <div class="form-group">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-register -->
