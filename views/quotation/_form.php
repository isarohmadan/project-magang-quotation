<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\table\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="quotation-form">
<?php $form = ActiveForm::begin(); 
?>
<form autocomplete="Off">
  <div class="form-row">
    <div class="col-md-4">
    <?= $form->field($model, 'date')->widget(DatePicker::className(), [
    'inline' => false, 
    'options' => ['autocomplete' => 'off'],
    'clientOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd',
        'startDate' => date('1960-01-01'),
    ],
]) ?>
    </div>
    <div class="form-group col-md-8">
      <?= $form->field($model, 'no_quotation')->textInput(['maxlength' => true, 'value' => $id,'readonly'=>'true']) ?>
    </div>
  </div>
  <div class="form-group">
  <?= $form->field($model, 'name_company')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="form-group">
  <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="form-group">
  <?= $form->field($model, 'company_address')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <?= $form->field($model, 'service_type')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group col-md-4">
    <?= $form->field($model, 'offered_by')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="form-group col-md-2">
    <?= $form->field($model, 'offered_to')->textInput(['maxlength' => true]) ?>
    </div>
  </div>
 
  <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
</form> 
<?php ActiveForm::end(); ?>
</div>

    
