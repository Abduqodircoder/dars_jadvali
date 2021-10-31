<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\BookRoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Xona band qilish';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-room-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'week_id',
                'value' => function($model){
        return $model->week->name;
                },
                'filter' =>\yii\helpers\ArrayHelper::map(common\models\BookRoom::find()->groupBy(['week_id'])->all(),'id', function ($model){
                    return $model->week->name;
                })
                ],
            [
                'attribute' => 'room_id',
                'value' =>function ($model){
        return $model->room->getRoom();
                },
                'filter'=>\yii\helpers\ArrayHelper::map(common\models\BookRoom::find()->groupBy(['room_id'])->all(),'id', function ($model){
                    return $model->room->getRoom();
                })
                ],
            [
                'attribute' =>'dj_table_id',
                'value' => function($model){
        return $model->djTable->getGroupSubject();
                },
                'filter' => \yii\helpers\ArrayHelper::map(common\models\BookRoom::find()->groupBy(['dj_table_id'])->all(),'id', function ($model){
                    return $model->djTable->getGroupSubject();
                }),
                ],
            [
                'attribute' => 'para',
                'filter' =>\yii\helpers\ArrayHelper::map(common\models\BookRoom::find()->groupBy(['para'])->all(),'id', 'para')
                ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
