<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\table\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">
<?php $form = ActiveForm::begin(); ?>
<div class="row col-md-10` p-5">
    <div class="form-row">
    <div class="col-md-12">
    <?= $form->field($model, 'service_name',['addon' => ['prepend' => ['content'=>'<i class="fas fa-user-tie"></i>']]
])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-12">
    <?= $form->field($model, 'service_description',['addon' => ['prepend' => ['content'=>'<i class="fas fa-atlas"></i>']]
])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-12">
    <?= $form->field($model, 'registration_fee' ,['addon' => ['prepend' => ['content'=>'<i class="fas fa-hand-holding-usd"></i>']]
])->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-12">
    <?php
        echo $form->field($model, 'service_status')->radioList(
            [0 => 'INACTIVE', 1 => 'ACTIVE'], 
            ['custom' => true, 'inline' => true, 'id' => 'custom-radio-list-inline']
        );

     ?>
     </div>
    </div>
    <?= Html::submitButton('Save', ['class' => 'btn btn-primary' ,'style' => ['width'=>'100%;']]) ?>
    </div>


</div>
    <?php ActiveForm::end(); ?>
</div>
