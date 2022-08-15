<?php

use app\models\table\Service;
use Codeception\Step\Action;
use yii\bootstrap4\Modal;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\table\Quotation */
$this->title = 'View ' . ucwords($model->name_company);
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="quotation-view">
    
    <h2 class=" font-weight-bold"><?= Html::encode($this->title) ?></h2>
    <?php echo Breadcrumbs::widget([
    'homeLink' => [
        'label' => 'Quotation',
        'url' => '',
        'style' => ['margin-left' => '15px'],
    ],
    'links' => [
        ['label' => 'Index', 'url' => ['index']
        ,'template' => "<li><b> &#160;> {link} </b></li>\n",
        'options' => ['class' => 'bg-transparent'
        
        ]
    ,'style' => ['text-decoration'=>'none','color'=>'black']
    ],
    ],
    ]);?>
    <p class="">
    <?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['index'], ['class' => 'btn btn-secondary']) ?>
        <?= Html::button('<i class="fas fa-concierge-bell"></i> Service', ['value' => Url::to('index.php?r=quotation/quot-service'.'&id='.$model->id),'class' => 'btn btn-dark float-right ml-2','id' => 'modalbutton']) ?>
        <?= Html::a('<i class="fas fa-edit"></i> Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-primary float-right ml-2']) ?>
        <?= Html::a('<i class="fas fa-eraser"></i> Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger float-right ml-2',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

<?= Html::a('<i class="fas fa-file-pdf"></i> PDF', ['generate-pdf', 'id' => $model->id,'token'=>1234], ['class' => 'btn btn-warning float-right']) ?>
<?php
        Modal::begin([
            'title' => '<h4>Add Service</h4>',
            'id' => 'modal', 

        ]);

        echo "<div id='modalContent'> modal Content </div>";
        Modal::end();
        ?>
    </p>
<div class="contain-table">
<div class="table-full">
    <h4 class="display-text  text-white pl-2">Table Information</h4>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th style="width: 50% ;">DATE</th>
                <td><?= $model->date_quotation ?></td>
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
    <h4 class="display-text  text-white pl-2">Offer & Service</h4>
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
<div class="table1 col-lg-12">
    <h4 class="display-text  text-white pl-2">Service Infromation</h4>
    <table class="table table-bordered">
        <tbody>
            <?php 
           
            $no = 1;
            if ($service == NULL) {?>
            <tr>
                <th style="width: 50% ;">--</th>
                <td>--</td>
            </tr>
            <?php }else{
                foreach($service as $val) {
                $id_quotService = $val->id;
                $service_name = Service::find()
                ->where(['id' => $val->id_service])
                ->all();
                $output[] = [$service_name,$id_quotService];
                 }
            foreach ($output as $key) {
               $hasil = $key[0][0];
               $id = $key[1];
               ?>

            <tr>
                <th style="width: 70px ;"><?= $no++ ?></th>
                <td><?= $hasil->service_name ?></td>
                <td><?= $hasil->id ?></td>
                <td> <?= Html::a('<i class="fas fa-eraser"></i> Delete', ['delete-quotservice', 'id' => $id], [
            'class' => 'btn btn-danger float-right ml-2',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) 
        ?>
        
        <?= Html::a('<i class="fas fa-eraser"></i> Update', ['update-quotservice', 'id' => $id], [
            'class' => 'btn btn-info float-right ml-2','id'=>'buttonUpdateQuotService'],
            
            )
        ?>
    </td>
            
            </tr>
            <?php } }?>
            <?php
        Modal::begin([
            'title' => '<h4>Add Service</h4>',
            'id' => 'modal', 

        ]);

        echo "<div id='modalContent'> modal Content </div>";
        Modal::end();
        ?>
        </tbody>
    </table>
</div>
</div>
</div>
<?php
        Modal::begin([
            'title' => '<h4>Add Service</h4>',
            'id' => 'modal', 

        ]);

        echo "<div id='modalContent'> modal Content </div>";
        Modal::end();
        ?>

</div>
<script></script>
