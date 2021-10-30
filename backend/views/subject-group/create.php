<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SubjectGroup */

$this->title = 'Qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Fanlarni guruhlarga biriktirish', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
