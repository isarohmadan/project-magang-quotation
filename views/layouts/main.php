<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100 wrapper">
<?php $this->beginBody() ?>

<header class="navbar">
    <?php
    NavBar::begin([
        'brandLabel' => 'Quotation Generator',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => 'Quotation', 'url' => ['/quotation/index']],
            ['label' => 'Service', 'url' => ['/service/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/user/security/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/user/security/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],  
    ]);
    NavBar::end();
    ?>
</header>
<div class="main_body">
<main role="main" id="main" class="main flex-shrink-0">
    <div class="container">

        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main> 
<div class="content-footer">
<footer class="footer fixed-bottom mt-auto text-muted">
    <div class="container">
        <p class="float-left">&copy; Pt.Gerbang Akses  <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>
</div>
        </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<!-- 
<?
// Breadcrumbs::widget([
//             'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//         ]) 
       ?> 