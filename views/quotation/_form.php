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
  
  <?= $form->field($model, 'name_company')->textInput(['maxlength' => true , 'required' => 'required']) ?>
  <?= $form->field($model, 'company_address')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'service_type')->textInput(['maxlength' => true]) ?>
  <?php 
  echo $form->field($model, 'date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Enter date ...'],
    'pluginOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-mm-dd'

    ],
    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
    
'pickerButton' => ['title' => false],
]);
 ?>
   <?= $form->field($model, 'offered_by')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'offered_to')->textInput(['maxlength' => true]) ?>

  <?= Html::submitButton('Save', ['class' => 'btn btn-primary','style'=>['width'=>'100%']]) ?>
  </div>
</div>

</form>
<?php ActiveForm::end(); ?>
<div class="none"></div>
</div>

    
