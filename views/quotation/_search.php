<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\QuotationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'no_quotation') ?>

    <?= $form->field($model, 'contact_person') ?>

    <?= $form->field($model, 'company_address') ?>

    <?php // echo $form->field($model, 'service_type') ?>

    <?php // echo $form->field($model, 'offered_by') ?>

    <?php // echo $form->field($model, 'offered_to') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
