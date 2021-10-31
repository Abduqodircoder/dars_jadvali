<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DjTable */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="dj-table-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacher_id')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\Teacher::find()->all(),'id', function ($model){
        return $model->getFullName();
    }),['prompt' => 'tanlang']) ?>

    <?= $form->field($model, 'subject_id')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\SubjectGroup::find()->all(),'id', function ($model){
       return $model->getGroupSubject();
    }),['prompt' => 'tanlang']) ?>

    <div class="form-group">
        <?= Html::submitButton('Qo\'shish', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
