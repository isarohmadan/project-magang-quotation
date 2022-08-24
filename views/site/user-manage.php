<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\QuotationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'User Manage';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-management-user col-md-12">
    <h1><?= Html::encode($this->title) ?></h1>
       <?php echo Breadcrumbs::widget([
    'homeLink' => [
        'label' => 'Management User',
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
    <div class="row mt-3 col-md-12">
    <table class="table" width = "100%">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">username</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1;
     foreach($model as $key) {?>
    <tr>
        <th> <?= $no++ ?></th>
      <th width = "30%" scope="row"><?= $key['username'] ?></th>
      <td width = "20%"> <?= $key['first_name'] ?> </td>
      <td width = "20%"> <?= $key['last_name'] ?> </td>
      <td width = "25%"> <?= $key['email'] ?> </td>
      <td style="width: 30px; border-radius:10px;" class= "borderless text-center text-success"><?= (($key['status'] == 1)? "ACTIVE" : "INACTIVE") ?></td>
    </tr>
    <?php }?>
  </tbody>
</table>
    </div>
    

</div>
<?