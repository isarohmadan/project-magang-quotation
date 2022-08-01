<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\table\Service */
$this->title = 'View Quotation: ' . ucwords($model->service_name);
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
        
<div class="service-view">
<h3 class="font-weight-bold ml-3"><?= Html::encode($this->title) ?></h3>

    <p class="pb-5 pt-3">
    <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary float-right ml-2']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger float-right',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <div class="contain-table">
<div class="form-row">
<div class="table1 col-lg-6">
    <h4 class="display-text  text-white pl-2">Service Information</h4>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th style="width: 50% ;">Service Name</th>
                <td><?=  $model->service_name?></td>
                
            </tr>
            <tr>
                <th style="width: 50% ;">Contact Person</th>
                <td><?=  $model->service_description?></td> 
            </tr>
        </tbody>
    </table>
</div>
<div class="table1 col-lg-6">
    <h4 class="display-text  text-white pl-2">Status & Fee</h4>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th style="width: 50% ;">Status</th>
                <td><?= $model->service_status?></td>
            </tr>
            <tr>
                <th style="width: 50% ;">Regis Fee</th>
                <td><?=$model->registration_fee?></td>
                
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>

</div>
