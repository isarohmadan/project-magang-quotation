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
        ])->textInput(['maxlength' => true , 'placeholder' => 'nama company']) ?>
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
    <table width="100%" class="quotationServiceTable" id="quotationService">
      <thead>
          <th class="service-table p-3 text-left font-weight-bold">Service</th>
          <th class="text-center p-3 font-weight-bold">Fee</th>
          <th class="text-center p-3 font-weight-bold" width="15px">Act</th>
      </thead>
      <tbody>
        <tr class="duplicate-0">
          <td class=" QuotService pb-0 pt-3" id="addQuotService-0"><?=  $form->field($model, 'id_service[0]')->dropDownList(ArrayHelper::map(Service::find()->all(),'id','service_name'),['prompt'=>'Select Service'])->label(false) ?></td>
          <td class="text-center align-middle amountService" id="hargaService-0">Rp <span class="allAmount" id="amountService[0]">0</span></td>
          <td class="actService"><button type="button" disabled="disabled" id="buttonDelete-0" class="btn btn-danger button-delete"><i class='fas fa-eraser'></i></button></td>
        </tr>
      </tbody>
        
    </table>
    <div class="p-4">
    </div>
            
            <button type="button" class="add-item btn btn-outline-primary float-right font-weight-bold" width="100%"><i class="far fa-plus-square"></i> Add</button>
            </div>
            
    <div class="row col-md-6 mt-4">
    <div class="form-row">
  <div class="col-md-6">
    <?= $form->field($model, 'offered_by',['addon' => ['prepend' => ['content'=>'<i class="fab fa-creative-commons-by"></i>']]
])->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-md-6
  ">
      <?= $form->field($model, 'offered_to', ['addon' => ['prepend' => ['content'=>'<i class="far fa-envelope-open"></i>']]
])->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-md-12
  ">
      <?= $form->field($model, 'service_type', ['addon' => ['prepend' => ['content'=>'<i class="far fa-envelope-open"></i>']]
])->textInput(['maxlength' => true]) ?>
  </div>
  
  </div>
  </div>
  <div class="row col-md-5 float-right mt-4 mr-3 total-service">
        <h4 class="text-left font-weight-bold col-md-5">Total</h4>
        <h4 class="col-md-6 float-right text-right">Rp. <span class="totalService" >0</span></h4>
  </div>
  <?= Html::submitButton('<i class="far fa-plus-square"></i> Save', ['class' => 'btn btn-primary submitAll mt-3' ,'style' => ['width'=>'50%']]) ?>
<div class="none"></div>

    <?php ActiveForm::end(); ?>
    <?php JSRegister::begin(); ?>
<script>
  let num = 0
      
      $(document).ready(function(){
        $('select[name="Quotation[id_service]['+num+']"]').on('change',function(){
        let val = $(this).val()
        if (val){
        $.get('?r=quotation/get-service-fee',{val : val},function(data){
            let res = $.parseJSON(data);
            let html = `<td class='text-center align-middle amountService' id='hargaService-`+num+`'>Rp <span class='allAmount' id='totalHargaService-`+num+`'>`+ res.registration_fee+` </span>  </td>
            `
            $( "td#hargaService-"+num+"" ).replaceWith(html)
            $( ".totalService" ).replaceWith(`<span class="totalService"> ${res.registration_fee}</span>`)
         })
          } else {
          $( "td#hargaService-"+num+"" ).replaceWith( "<td class='text-center align-middle' id='hargaService-"+num+"'>Rp 0  </td>" )
          $( ".totalService" ).replaceWith(`<span class="totalService">0</span>`)
          }
    })

    $('#buttonDelete-0').on('click',function(){
        removeElement();
      })
      function addHargaService(val) {
        if (val){
        $.get('?r=quotation/get-service-fee',{val : val},function(data){
            let res = $.parseJSON(data);
            let html = `<td class='text-center align-middle amountService' id='hargaService-`+num+`'>Rp <span class='allAmount' id='totalHargaService-`+num+`'>`+ res.registration_fee+`</span </td>
            `
            $( "td#hargaService-"+num+"" ).replaceWith(html)
            addSum(num)
         })
          } else {
        $( "td#hargaService-"+num+"" ).replaceWith( `<td class='text-center align-middle amountService' id='hargaService-`+num+`'>Rp <span class="allAmount" id='totalHargaService-`+num+`'>0</span></td>`)
        $( ".totalService" ).replaceWith(`<span class="totalService">0</span>`)
    }
      }
      
      $('.add-item').on('click',function(){
       
        if ($('select[name="Quotation[id_service]['+num+']"]').val() > 0) {
          $("#buttonDelete-"+num+"").removeAttr("disabled");
          $('select[name="Quotation[id_service]['+num+']"]').prop('disabled',true)
          $('.submitAll').prop('disabled',true)
          
          num += 1
          let html = `
        <tr class='duplicate-`+num+`'  style='width:100%;'>
          <td class='QuotService pb-0 pt-3' id='addQuotService-`+num+`'>
          <?=  $form->field($model, 'id_service[`+num+`]')->dropDownList(ArrayHelper::map(Service::find()->all(),'id','service_name'),['prompt'=>'Select Service'])->label(false) ?>
          </td>
          <td class="text-center align-middle" id="hargaService-`+num+`">Rp 0</td>
          <td class="actService"><button type="button" disabled="disabled" id="buttonDelete-`+num+`" class="btn btn-danger button-delete"><i class='fas fa-eraser'></i></button></td>
        </tr>
        `
        $('tbody').append(html)  
        }else{
          alert('Isi service dahulu')
        }
        $('.button-delete').on('click',function(){
          let id = $(this).attr('id')
          let res = id.split("-").pop()
          removeElement(res);
      })
        $('select[name="Quotation[id_service]['+num+']"]').on('change',function(){
          let val = $(this).val()
          if (val.length > 0) {
            addHargaService(val)
            $('.submitAll').removeAttr('disabled')
            $('.warningText').remove()
          }else{
            addHargaService(val)
            $('.submitAll').prop('disabled',true)
            $('#addQuotService-'+num+'').append('<h6 class="text-danger warningText font-weight-bold">*Wajib isi terlebih dahulu</h6>')
          }
          
        })
        
      })
      

      function addSum(val) {
        let all = $('.allAmount').map(function(){
          return this.innerHTML
        }).get()
        let html = 0
        for(var sumAll in all){
          html += parseInt(all[sumAll])
        }
        $( ".totalService" ).replaceWith(`<span class="totalService">${html}</span>`)
      }
      
      
      function removeElement(numb=0){
         $('.duplicate-'+numb+'').remove()
         addSum()
      }
    })
    
</script>
<?php JSRegister::end(); ?>
</div>

<?php
// $html = ArrayHelper::map(Service::find()->where(['service_status' => 1])->all(),'id','service_name');
// $arr = Json::encode($html, $asArray = true);





