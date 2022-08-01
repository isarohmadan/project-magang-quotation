<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\table\Quotation */

$this->title = 'Update Quotation: ' . ucwords($model->name_company);
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quotation-update">
    <h3 class="font-weight-bold"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id
    ]) ?>

</div>
