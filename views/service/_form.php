<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\table\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'service_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_status')->textInput() ?>

    <?= $form->field($model, 'registration_fee')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
