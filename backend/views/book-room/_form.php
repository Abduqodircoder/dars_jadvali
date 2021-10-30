<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BookRoom */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="book-room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'week_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\WeekDay::find()->all(),'id','name'),[
            'prompt' => 'tanlang',
    ]) ?>

    <?= $form->field($model, 'room_id')->dropdownList(\yii\helpers\ArrayHelper::map(\common\models\Room::find()->all(),'id',function($model){
        return $model->getRoom();
    }),[
            'prompt' => 'tanlang',
            'onchange' =>'$.post("'.\yii\helpers\Url::to(['book-room/room?id=']).'"+$("#bookroom-week_id")+"_"+$(this).val(),
                    function(data){$("#bookroom-para").html(data)});',
       ]) ?>

    <?= $form->field($model, 'para')->dropdownList([],['prompt' => 'tanlang',
        'onchange' => '$.post("'.\yii\helpers\Url::to(['book-room/group?id=']).'"+$("#bookroom-week_id")+$("#bookroom-room_id")+"_"+$(this).val(),
                    function(data){$("#bookroom-dj_table_id").html(data)});'
    ]) ?>

    <?= $form->field($model, 'dj_table_id')->dropdownList(\yii\helpers\ArrayHelper::map(\common\models\DjTable::find()->all(),'id',function($model){
        return $model->subjectGroup->group->getCourseGroup();
    }),['prompt'=>'tanlang']) ?>

    <div class="form-group">
        <?= Html::submitButton('Qo\'shish', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
