<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use common\widgets\Alert;
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
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
//    $menuItems = [
//        ['label' => 'Home', 'url' => ['/site/index']],
//    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {

        $menuItems[] = ['label' => 'Fakultetlar', 'url' => ['/faculty/index']];
        $menuItems[] = ['label' => 'Yo\'nalishlar', 'url' => ['/direction/index']];
        $menuItems[] = ['label' => 'O\'qituvchilar', 'url' => ['/teacher/index']];
        $menuItems[] = ['label' => 'Kurslarni guruhlarga bo\'lish', 'url' => ['/course-group/index']];
        $menuItems[] = ['label' => 'Fanlar', 'url' => ['/subject/index']];
        $menuItems[] = ['label' => 'Fanlarni guruhlarga biriktirish', 'url' => ['/subject-group/index']];
        $menuItems[] = ['label' => 'Xonalar', 'url' => ['/room/index']];
        $menuItems[] = ['label' => 'Fanni O\'qituvchiga biriktirish', 'url' => ['/dj-table/index']];
        $menuItems[] = ['label' => 'Xona band qilish', 'url' => ['/book-room/index']];
//        $menuItems[] = ['label' => 'Kurslar', 'url' => ['/course/index']];
        $menuItems[] = ['label' => 'Sayt ishlovchilar', 'url' => ['/user/index']];

        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
