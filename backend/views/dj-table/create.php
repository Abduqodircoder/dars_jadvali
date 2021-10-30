<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DjTable */

$this->title = 'Create Dj Table';
$this->params['breadcrumbs'][] = ['label' => 'Dj Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dj-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
