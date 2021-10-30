<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Xonalar ro\'yhati';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Xona qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'room_number',
                'value' =>function($model){
        return $model->room_number."-xona";
                }
            ],
            'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
