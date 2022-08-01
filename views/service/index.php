<?php

use yii\helpers\Html;
use app\assets\QuotAsset;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\table\Service;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ServiceSearch */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="row mt-3">
    <?= Html::a('+ Create Quotation', ['create'], ['class' => 'btn btn-primary float-right mt-3']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '',
        'tableOptions' => ['class' => 'table borderless'],
        'columns' => [
           ['class' => 'yii\grid\SerialColumn'],

           [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'service_name',
            'headerOptions' => ['class' => 'text-center'],
            'label' => 'Service Name',
            'contentOptions' => ['style' => 'width: 250px;', 'class' => 'borderless'],
        ],
        [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'service_description',
            'headerOptions' => ['class' => 'text-center'],
            'label' => 'Description',
            'contentOptions' => ['style' => 'width: 400px;', 'class' => 'borderless'],
        ],
        [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'service_status',
            'headerOptions' => ['class' => 'text-center'],
            'label' => 'Status',
            'contentOptions' => ['style' => 'width: 30px;', 'class' => 'borderless'],
        ],
            'registration_fee',
            
            [
                
                'class' => ActionColumn::className(),
                'header' => 'Actions',
                'urlCreator' => function ($action, Service $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],  
        ],
    ]); ?>

</div>
</div>
