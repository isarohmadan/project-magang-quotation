<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\table\Quotation */
$this->title = 'Create Quotation';
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-create">
<?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['index'], ['class' => 'btn btn-secondary float-right mt-3']) ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo Breadcrumbs::widget([
    'homeLink' => [
        'label' => 'Quotation',
        'url' => 'index',
    ],
    'links' => [
        ['label' => 'Create', 'url' => ['index']
        ,'template' => "<li><b> &#160;> {link} </b></li>\n",
        'options' => ['class' => 'bg-transparent'
        
        ]
    ,'style' => ['text-decoration'=>'none','color'=>'black','font-weight' => 'bold']
    ],
    ],
    ]);?>
    <?= 
    $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
