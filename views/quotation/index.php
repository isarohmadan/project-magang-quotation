<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\table\Quotation; 
use yii\widgets\Breadcrumbs;
use app\assets\QuotAsset;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\QuotationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Quotations';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="quotation-index">
    <h1><?= Html::encode($this->title) ?></h1>
       <?php echo Breadcrumbs::widget([
    'homeLink' => [
        'label' => 'Quotation',
        'url' => '',
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
    <div class="row mt-3">
    <?= Html::a('<i class="far fa-plus-square"></i>', ['create'], ['class' => 'btn btn-primary mt-3 mb-2 float-right ']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary'=> '',
        'tableOptions' => ['class' => 'table borderless'],
        'columns' => [
           ['class' => 'yii\grid\SerialColumn'],

           [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'date_quotation',
            'headerOptions' => ['class' => 'text-center'],
            'label' => 'Date',
            'contentOptions' => ['style' => 'width: 150px;', 'class' => 'borderless'],
        ],
        [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'name_company',
            'headerOptions' => ['class' => 'text-center'],
            'label' => 'Company',
            'contentOptions' => ['style' => 'width: 170px;', 'class' => 'borderless'],
        ],
        [
            'class' => 'yii\grid\DataColumn',
            'attribute' => 'contact_person',
            'headerOptions' => ['class' => 'text-center'],
            'label' => 'Contact Person',
            'contentOptions' => ['style' => 'width: 180px;', 'class' => 'borderless'],
        ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'company_address',
                'headerOptions' => ['class' => 'text-center'],
                'label' => 'Company Address',
                'contentOptions' => ['style' => 'width: 180px;', 'class' => 'borderless'],
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => 'service_type',
                'headerOptions' => ['class' => 'text-center'],
                'label' => 'Service Type',
                'contentOptions' => ['style' => 'width: 180px;', 'class' => 'borderless'],
            ],
            
            [
                'class' => ActionColumn::class,
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        if (Yii::$app->user->identity['username'] == 'admin' ) {
                        
                            return Html::a("<i class='fas fa-eraser'></i>", $url, [
                                'title' => "Delete",
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Are you sure? This will Delete this.',
                                ],
                             ]);
                        }else {
                            return "";
                        }
                    },
                    'update' => function ($url,$model){
                        return Html::a("<i class='fas fa-edit'></i>", $url, [
                            'title' => "Update",
                            'class' => 'btn btn-primary',
                            'data' => [
                                'method' => 'post',
                            ],
                         ]);
                    },
                    'view' => function ($url,$model){
                        return Html::a("<i class='fas fa-eye'></i>", $url, [
                            'title' => "View",
                            'class' => 'btn btn-warning',
                            'data' => [
                                'method' => 'post',
                            ],
                         ]);
                    }
                        

                ]
                // you may configure additional properties here
            ],
        ],
    ]); ?>
    </div>
    

</div>
<?




?>