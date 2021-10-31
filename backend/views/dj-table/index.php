<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DjTableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guruhga o\'qituvchi biriktirish';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dj-table-index">

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
                'attribute' => 'teacher_id',
                'value' => function($model){
        return $model->teacher->getFullName();
                },
                'filter' => \yii\helpers\ArrayHelper::map(common\models\DjTable::find()->groupBy(['teacher_id'])->all(),'teacher_id',function($model){
                    return $model->teacher->getFullName();
                }),
            ],
            [
                'attribute' => 'subject_id',
                'value' => function($model){
        return $model->subject->getGroupSubject();
                },
                'filter' =>\yii\helpers\ArrayHelper::map(common\models\DjTable::find()->groupBy(['subject_id'])->all(),'subject_id',function($model){
                    return $model->subject->getGroupSubject();
                }),
                ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
