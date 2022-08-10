<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\PdfAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

PdfAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100 wrapper">
<?php $this->beginBody() ?>
<div class="main_body">
<main role="main" id="main" class="main flex-shrink-0">
    <div class="container">

        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main> 
        </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<?
       ?> 