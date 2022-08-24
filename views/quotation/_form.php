<?php

use app\models\table\Service;
use kartik\date\DatePicker;
use kartik\form\ActiveField;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use richardfan\widget\JSRegister;

?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
            <div class="row bg-transparent p-0 col-md-12">
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
        

        <div class="row col-md-12">
    <table width="100%" class="quotationServiceTable  " id="quotService">
      <thead>
          <th class="service-table p-3 text-left font-weight-bold">Service</th>
          <th class="text-center p-3 font-weight-bold">Fee</th>
      </thead>
      <tbody>
        <tr class="duplicate">
          <td class="addQuotService[0] pb-0 pt-3" id="QuotService"><?=  $form->field($model, 'id_service[0]')->dropDownList(ArrayHelper::map(Service::find()->all(),'id','service_name'),['prompt'=>'Select User'])->label(false) ?></td>
        <td class="text-center align-middle" id="hargaService-0">Rp <span class="amountService[0]">0</span></td>
        </tr>
      </tbody>
        
    </table>
    <div class="p-4">
    </div>
            
            <button type="button" class="add-item btn btn-outline-primary float-right font-weight-bold" width="100%"><i class="far fa-plus-square"></i> Add</button>
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
])->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-md-4
  ">
      <?= $form->field($model, 'service_type', ['addon' => ['prepend' => ['content'=>'<i class="far fa-envelope-open"></i>']]
])->textInput(['maxlength' => true]) ?>
  </div>
  <?= Html::submitButton('Save', ['class' => 'btn btn-primary submitAll' ,'style' => ['width'=>'100%']]) ?>
  </div>
  </div>
<div class="none"></div>

    <?php ActiveForm::end(); ?>
    <?php JSRegister::begin(); ?>
<script>
  let num = 0
       
  
console.log($('#hargaService-'+num+'').text())




      $(document).ready(function(){   
        $('select[name="Quotation[id_service]['+num+']"]').on('change',function(){
        let val = $(this).val()
        addHargaService(val);
    })

      function addHargaService(val) {
        if (val){
        $.get('?r=quotation/get-service-fee',{val : val},function(data){
          console.log(num)
            let res = $.parseJSON(data);
            let html = `<td class='text-center' id='hargaService-`+num+`'>Rp `+ res.registration_fee+`  </td>`
            $( "td#hargaService-"+num+"" ).replaceWith(html)
         })
          } else {
        $( "td#hargaService-"+num+"" ).replaceWith( "<td class='text-center' id='hargaService-"+num+"'>Rp 0  </td>" )
          
    }
      }
      
      $('.add-item').on('click',function(){
        if ($('select[name="Quotation[id_service]['+num+']"]').val() > 0) {
          num += 1
          let html = `
        <tr class='duplicate'  style='width:100%;'>
          <td class='addQuotService[`+num+`] pb-0 pt-3' id='QuotService'>
          <?=  $form->field($model, 'id_service[`+num+`]')->dropDownList(ArrayHelper::map(Service::find()->all(),'id','service_name'),['prompt'=>'Select User'])->label(false) ?>
          </td>
          <td class="text-center align-middle" id="hargaService-`+num+`">Rp 0</td>
        </tr>
        `
        $('tbody').append(html)  
        $('select[name="Quotation[id_service]['+num+']"]').on('change',function(){
          let val = $(this).val()
          addHargaService(val)
        })
        }else{
          alert('Isi service dahulu')
        }
        

      })
    })
</script>
<?php JSRegister::end(); ?>
</div>

<?php
// $html = ArrayHelper::map(Service::find()->where(['service_status' => 1])->all(),'id','service_name');
// $arr = Json::encode($html, $asArray = true);





