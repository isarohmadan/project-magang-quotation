<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\table\Service */

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-update">


<?= Html::a('<i class="fas fa-arrow-left"></i> Back', ['index'], ['class' => 'btn btn-secondary float-right mt-3']) ?>
    <h1 class="font-weight-bold"><?= Html::encode($this->title) ?></h1>
    <?php echo Breadcrumbs::widget([
    'homeLink' => [
        'label' => 'Service',
        'url' => '?r=service',
    ],
    'links' => [
        ['label' => 'Create', 'url' => ['create']
        ,'template' => "<li><b> &#160;> {link} </b></li>\n",
        'options' => ['class' => 'bg-transparent'
        
        ]
    ,'style' => ['text-decoration'=>'none','color'=>'black']
    ],
    ],
    ]);?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
