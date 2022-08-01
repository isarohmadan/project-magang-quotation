<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\table\Quotation */

$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="quotation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="pb-5 pt-3">
        <?= Html::a('Add Service id', ['quot-service','id' => $model->id], ['class' => 'btn btn-dark float-right ml-2']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary float-right ml-2']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger float-right ml-2',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

<?= Html::a('Generate', ['gen-pdf', 'id' => $model->id], ['class' => 'btn btn-warning float-right']) ?>
    </p>
<div class="contain-table">
<div class="table-full">
    <h4 class="display-text  text-white pl-2">Table Information</h4>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th style="width: 50% ;">ID</th>
                <td><?= $model->id ?></td>
            </tr>
            <tr>
                <th style="width: 50% ;">DATE</th>
                <td><?= $model->date ?></td>
            </tr>
            <tr>
                <th style="width: 50% ;">NO QUOT</th>
                <td><?= $model->no_quotation ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="form-row">
<div class="table1 col-lg-6">
    <h4 class="display-text  text-white pl-2">Company Information</h4>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th style="width: 50% ;">Company Name</th>
                <td><?= $model->name_company ?></td>
            </tr>
            <tr>
                <th style="width: 50% ;">Contact Person</th>
                <td><?= $model->contact_person ?></td>
            </tr>
            <tr>
                <th style="width: 50% ;">Company Adress</th>
                <td><?= $model->company_address ?></td>
            </tr>
            <tr>
                <th style="width: 50% ;">Service Type</th>
                <td><?= $model->service_type ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="table1 col-lg-6">
    <h4 class="display-text  text-white pl-2">Offer</h4>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th style="width: 50% ;">Offered By</th>
                <td><?= $model->offered_by ?></td>
            </tr>
            <tr>
                <th style="width: 50% ;">Offered To</th>
                <td><?= $model->offered_to ?></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
</div>

</div>
