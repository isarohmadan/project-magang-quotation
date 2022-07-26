<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\table\QuotService; 
use app\models\table\Service;
use kartik\select2\Select2;
$quot = new QuotService();
?>
<?php $form = ActiveForm::Begin() ?>
<?= $form->field($quot, 'id_service')->widget(Select2::classname(), [
 'data' => ArrayHelper::map(Service::find()->all(),'id','service_name'),
 'language' => 'en',
 'options' => ['placeholder' => 'Pilih Id Service'],
 'pluginOptions' => [
 'allowClear' => true
 ],
 ]); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>  
    <?php ActiveForm::end();?>
</div>