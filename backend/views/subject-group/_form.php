<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\SubjectGroup */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="subject-group-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject_id')->dropdownList(\yii\helpers\ArrayHelper::map(\common\models\Subject::find()->all(),'id','name'),[
            'prompt' => 'tanlang',
    ]) ?>

    <?= $form->field($model, 'group_id')->dropdownList(\yii\helpers\ArrayHelper::map(\common\models\CourseGroup::find()->all(),
    'id', function ($model){
        return $model->getCourseGroup();
        }),['prompt' => 'tanlang']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
