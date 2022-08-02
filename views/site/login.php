<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
?>
<div class="site-login">
    
<div class="login-form">
    <?php $form = ActiveForm::begin() ?>
    <div class="card" style="width: 400px;">
  <div class="card-body">
  <h1 class="card-title font-weight-bold text-center">LOGIN</h1>
  <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'password')->passwordInput() ?>
  <?= $form->field($model, 'rememberMe')->checkbox([
            'style' => ['float'=>'left']
        ]) ?>
         <?= Html::submitButton('Save', ['class' => 'btn btn-primary','style'=>['width'=>'100%']]) ?>
  </div>
</div>

    <?php ActiveForm::end(); ?>
    </div>


</div>
