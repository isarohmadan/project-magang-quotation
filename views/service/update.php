<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\table\Service */

$this->title = 'Update Service: ' . $model->service_name;
$this->params['breadcrumbs'][] = ['label' => 'Services', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="service-update">

    <h3 class="font-weight-bold"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
