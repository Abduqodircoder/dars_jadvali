<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BookRoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Book Rooms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-room-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Book Room', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'week_id',
            'room_id',
            'dj_table_id',
            'para',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
