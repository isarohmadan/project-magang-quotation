<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\table\Quotation; 
use app\assets\QuotAsset;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\QuotationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Quotations';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="quotation-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row mt-3">
    <?= Html::a('+ Create Quotation', ['create'], ['class' => 'btn btn-primary mt-3 mb-2 float-right ']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=> '',
        'tableOptions' => ['class' => 'table borderless'],
        'columns' => [
           ['class' => 'yii\grid\SerialColumn'],

           [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'date',
            'headerOptions' => ['class' => 'text-center'],
            'label' => 'Date',
            'contentOptions' => ['style' => 'width: 110px;', 'class' => 'borderless'],
        ],
        [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'name_company',
            'headerOptions' => ['class' => 'text-center'],
            'label' => 'Company',
            'contentOptions' => ['style' => 'width: 200px;', 'class' => 'borderless'],
        ],
        [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'contact_person',
            'headerOptions' => ['class' => 'text-center'],
            'label' => 'Contact Person',
            'contentOptions' => ['style' => 'width: 150px;', 'class' => 'borderless'],
        ],
            'company_address',
            'service_type',
            
            [
                
                'class' => ActionColumn::className(),
                
                'header' => 'Actions',
                'urlCreator' => function ($action, Quotation $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],  
        ],
    ]); ?>
    </div>
    

</div>
<?




?>