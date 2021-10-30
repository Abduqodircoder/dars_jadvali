<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BookRoom */

$this->title = 'Create Book Room';
$this->params['breadcrumbs'][] = ['label' => 'Book Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
