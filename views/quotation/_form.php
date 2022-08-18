<?php

use app\models\table\Service;
use kartik\date\DatePicker;
use kartik\form\ActiveField;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;

?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
            <div class="row bg-transparent col-md-12">
        <div class="form-row">
        <div class="col-md-5 form-group">
                <?= $form->field($model, 'name_company',['addon' => ['prepend' => ['content'=>'<i class="fas fa-building"></i>']]
        ])->textInput(['maxlength' => true , 'required' => true, 'placeholder' => 'nama company']) ?>
        </div>
        <div class="col-md-4">
        <?= $form->field($model, 'contact_person',['addon' => ['prepend' => ['content'=>'<i class="fas fa-user-tie"></i>']]
        ])->textInput(['maxlength' => true , 'placeholder'=>'contact person']) ?>
        </div>
        <div class="col-md-3">
        <?php
            echo $form->field($model, 'date_quotation')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'Enter date'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy/mm/dd'
            ]
        ]);
        ?>
        </div>
        <div class="col-md-12">
        <?php echo $form->field($model, 'company_address', [
            'hintType' => ActiveField::HINT_SPECIAL,
            'hintSettings' => ['placement' => 'right', 'onLabelClick' => true, 'onLabelHover' => false]
        ])->textArea([
            'id' => 'address-input', 
            'placeholder' => 'Enter address...', 
            'rows' => 4
        ]);
        ?>
        </div>
        </div>
        </div>
        </div>

        <div class="row col-md-12">
    <table width="100%" class="quotationServiceTable" id="quotService">
        <tr>
          <th class="service-table p-3 text-left font-weight-bold">Service</th>
          <th class="text-center p-3 font-weight-bold">Fee</th>
        </tr>
        <tr class="duplicate">
          <td class="pt-3 addQuotService" id="QuotService"><?= $form->field($modelService, 'id_service',['addon' => ['prepend' => ['content'=>'<i class="fas fa-concierge-bell"></i>']]
      ])->widget(Select2::classname(), [
      'data' => ArrayHelper::map(Service::find()->where(['service_status' => 1])->all(),'id','service_name'),
      'language' => 'en',
      'options' => ['placeholder' => 'Select Service','id'=>'paymentQuotService'],
      'pluginOptions' => [
      'allowClear' => true
    
      ],
      
      ])->label(false); ?></td>
      <td class="text-center" id="hargaService">Rp 0</td>
        </tr>
    </table>
    <div class="p-4">
    </div>
            <button type="button" class="add-item btn btn-outline-primary btn-xs float-right"><i class="far fa-plus-square"></i></button>
            <!-- <button type="button" onclick="buttonQuotService()" class="add-item btn btn-outline-primary float-right font-weight-bold" width="100%"><i class="far fa-plus-square"></i> Add</button> -->
            </div>

    <div class="row col-md-12 mt-4">
    <div class="form-row">
  <div class="col-md-4">
    <?= $form->field($model, 'offered_by',['addon' => ['prepend' => ['content'=>'<i class="fab fa-creative-commons-by"></i>']]
])->textInput(['maxlength' => true,'required'=>true]) ?>
  </div>
  <div class="col-md-4
  ">
      <?= $form->field($model, 'offered_to', ['addon' => ['prepend' => ['content'=>'<i class="far fa-envelope-open"></i>']]
])->textInput(['maxlength' => true,'required'=>true]) ?>
  </div>
  <div class="col-md-4">
        <?= $form->field($model, 'service_type',['addon' => ['prepend' => ['content'=>'<i class="fas fa-concierge-bell"></i>']]
        ])->textInput(['maxlength' => true , 'placeholder'=>'service type']) ?>
        </div>
  </div>
  <?= Html::submitButton('Save', ['class' => 'btn btn-primary' ,'style' => ['width'=>'100%']]) ?>
  </div>

<div class="none"></div>

    <?php ActiveForm::end(); ?>

</div>