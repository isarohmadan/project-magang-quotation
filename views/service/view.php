<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\table\Service */
$this->title = 'View ' . ucwords($model->service_name);
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
        
<div class="service-view">
<h1 class="font-weight-bold ml-1"><?= Html::encode($this->title) ?></h1>
<?php echo Breadcrumbs::widget([
    'homeLink' => [
        'label' => 'Service',
        'url' => '?r=service',
        'style' => ['margin-left' => '15px']
    ],
    'links' => [
        ['label' => 'View', 'url' => ['view']
        ,'template' => "<li><b> &#160;> {link} </b></li>\n",
        'options' => ['class' => 'bg-transparent'
        
        ]
    ,'style' => ['text-decoration'=>'none','color'=>'black']
    ],
    ],
    ]);?>

    <p class="pt-3">
    <?= Html::a('<i class="fas fa-arrow-left"></i>Back', ['index'], ['class' => 'btn btn-secondary']) ?>

    <?= Html::a('<i class="fas fa-edit"></i> Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary float-right ml-2']) ?>
        <?= Html::a('<i class="fas fa-eraser"></i> Delete', ['delete', 'id' => $model->id], [
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
                <?php if ($model->service_status > 0) {?>
                    <td class="text-success font-weight-bold">ACTIVE</td>
                <?php }else {?>
                    <td class="text-danger font-weight-bold">INACTIVE</td>
                <?php } ?>
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
