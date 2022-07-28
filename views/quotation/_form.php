<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\bootstrap4\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\table\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="quotation-form">
<?php $form = ActiveForm::begin(); 
?>
<form autocomplete="Off">
<div class="row">
  <div class="col-md-12">
  <?php 
  echo $form->field($model, 'date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter birth date ...'],
    'pluginOptions' => [
        'autoclose' => true
    ],
    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
'pickerButton' => ['title' => false],
]);
 ?>
  <?= $form->field($model, 'no_quotation')->textInput(['maxlength' => true, 'value' => $id,'readonly'=>'true']) ?>
  <?= $form->field($model, 'name_company')->textInput(['maxlength' => true , 'required' => 'required']) ?>
  <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'service_type')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'company_address')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'offered_by')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'offered_to')->textInput(['maxlength' => true]) ?>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="float-left">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
  </div>
</div>
</form>
<?php ActiveForm::end(); ?>
</div>

    
