<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DjTable */

$this->title = 'Update Dj Table: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dj Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dj-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
