<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\table\QuotService; 
use app\models\table\Service;
use kartik\select2\Select2;
$quot = new QuotService();
?>
<div class="quotation-form">
<?php $form = ActiveForm::begin(); 
?>
<form autocomplete="Off">
<div class="row-quotService">
  <div class="col-md-12">
  <?= $form->field($quot, 'service')->widget(Select2::classname(), [
 'data' => ArrayHelper::map(Service::find()->where(['service_status'=>1])->all(),'id','service_name'),
 'language' => 'en',
 'options' => ['placeholder' => 'Select Service'],
 'pluginOptions' => [
 'allowClear' => true
 ],
 ]); ?>
    <?= Html::submitButton('Add', ['class' => 'btn btn-primary','style'=>['width'=>'100%']]) ?>
  </div>
    
</div>

</form>
<?php ActiveForm::end(); ?>
</div>