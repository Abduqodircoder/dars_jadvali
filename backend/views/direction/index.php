<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Direction */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yo\'nalishlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direction-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Yo\'nalish qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'fakultet_id',
                'value' => function($model){
        return $model->fakultet->name;
                },
                'filter' =>\yii\helpers\ArrayHelper::map(\common\models\Direction::find()->groupBy(['fakultet_id'])->all(),'id','fakultet.name')
            ],
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
