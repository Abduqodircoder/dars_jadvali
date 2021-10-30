<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CourseGroup */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="course-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'faculty_id')->dropdownList(\yii\helpers\ArrayHelper::map(\common\models\Faculty::find()->all(),'id','name'),[
        'prompt' => 'tanlang',
        'onchange' =>'$.post("'.\yii\helpers\Url::to(['course-group/direction?faculty_id=']).'"+$(this).val(),
                    function(data){$("#coursegroup-direction_id").html(data)});',
    ]) ?>

    <?= $form->field($model, 'direction_id')->dropdownList(\yii\helpers\ArrayHelper::map(\common\models\Direction::find()->andWhere($model->faculty_id)->all(),'id','name'),[
        'prompt' =>'tanlang',
    ]) ?>

    <?= $form->field($model, 'course_id')->dropdownList(\yii\helpers\ArrayHelper::map(\common\models\Course::find()->all(),'id',function ($model){
        return $model->getCourse();
    }),[
         'prompt'=>'tanlang',

    ]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Qo\'shish', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
