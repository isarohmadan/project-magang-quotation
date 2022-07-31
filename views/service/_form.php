<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\table\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-12">
    <?= $form->field($model, 'service_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_status')->textInput() ?>

    <?= $form->field($model, 'registration_fee')->textInput(['maxlength' => true]) ?>
    <?= Html::submitButton('Save', ['class' => 'btn btn-success' ,'style' => ['width'=>'100%;']]) ?>
    </div>


</div>

  


    <?php ActiveForm::end(); ?>

</div>
