<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CourseGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guruhlar ro\'yhati';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Guruh qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            ['attribute' =>'faculty_id','value' => function($model){
        return $model->faculty->name;
            },
             'filter' =>\yii\helpers\ArrayHelper::map(\common\models\CourseGroup::find()->groupBy(['faculty_id'])->all(),'id','faculty.name')
            ],
            ['attribute' =>'direction_id','value' => function($model){
                return $model->direction->name;
            },
                'filter' =>\yii\helpers\ArrayHelper::map(\common\models\CourseGroup::find()->groupBy(['direction_id'])->all(),'id','direction.name')
            ],
            [
                'attribute' =>'course_id',
                'value' => function($model){
        return $model->course_id."-kurs";
                },
                'filter' =>\yii\helpers\ArrayHelper::map(\common\models\CourseGroup::find()->groupBy(['course_id'])->all(),'id',function($model){
                    return $model->course_id."-kurs";
                })
            ],
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
