<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DjTableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dj Tables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dj-table-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dj Table', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'teacher_id',
            'subject_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
