<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use lo\modules\noty\Wrapper;
use common\models\User;
//use common\models\Pages;

AppAsset::register($this);

if (!Yii::$app->user->isGuest) {
	$user=User::findOne(Yii::$app->user->id);
	}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, maximum-scale=1.0">
    <meta name="HandheldFriendly" content="True">

    <title>IMBA-IT – Системный интегратор</title>
    <meta name="keywords" content="IMBA-IT,системный интегратор,HPE">
    <meta name="description" content="IMBA-IT – реализуем комплексные IТ-проекты">
    <link rel="stylesheet" href="/html/css/style.css">
    <link rel="stylesheet" href="/html/css/table.css">
<!--    <link rel="stylesheet" href="../../web/html/css/style.css">-->
    <link rel="stylesheet" href="/html/css/table.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#da532c">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="wraper__<?php echo Yii::$app->controller->id; ?>">

<?php $this->beginBody();
echo $this->render('header');
echo $this->render("_" . Yii::$app->controller->id . '.php', ['content' => $content]);

?>

<?php $this->endBody() ?>
<?php
//$this->registerJsFile("/js/jquery-ui.js");
//$this->registerJsFile("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
//$this->registerJsFile("https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js");
//$this->registerJsFile("https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js");
//?>

</body>
</html>
<?php $this->endPage() ?>
