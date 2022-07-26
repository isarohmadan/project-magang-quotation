<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\table\Quotation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="quotation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

<?= Html::a('Generate', ['gen-pdf', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'no_quotation',
            'name_company',
            'contact_person',
            'company_address',
            'service_type',
            'offered_by',
            'offered_to',
            
        ],
    ]) ?>
<?= Html::a('Add Service id', ['quot-service','id' => $model->id], ['class' => 'btn btn-primary float-right']) ?>
</div>
