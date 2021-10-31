<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DjTable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dj-table-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacher_id')->dropDownList(\yii\helpers\ArrayHelper::map(common\models\Teacher::find()->all(),'id', function ($model){
        return $model->getFullName();
    })) ?>

    <?= $form->field($model, 'subject_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
