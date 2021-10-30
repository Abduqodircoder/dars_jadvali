<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Subject */

$this->title = 'Yangilash: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Fanlar ro\'hati', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Yangilash';
?>
<div class="subject-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
