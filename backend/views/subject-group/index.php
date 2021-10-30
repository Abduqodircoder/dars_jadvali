<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\SubjectGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fanlarni guruhlarga biriktirish';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-group-index">

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
                'label' => 'Fan nomi',
                'attribute' =>'subject_id',
                'value' => function($model){
        return $model->subject->name;
                },
                'filter' =>\yii\helpers\ArrayHelper::map(\common\models\SubjectGroup::find()->all(),'subject_id','subject.name')
                ],
            [
                'label' => 'Guruh nomi',
                'attribute' =>'group_id',
                'value' => function($model){
        return $model->group->name;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\SubjectGroup::find()->all(),'group_id','group->name')
                ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
