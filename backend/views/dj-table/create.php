<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DjTable */

$this->title = 'Guruh fani va O\'qituvchini biriktirish';
$this->params['breadcrumbs'][] = ['label' => 'Guruh fani va O\'qituvchi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dj-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
