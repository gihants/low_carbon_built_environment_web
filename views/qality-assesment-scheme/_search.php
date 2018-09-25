<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QalityAssesmentSchemeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qality-assesment-scheme-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'qa_question_id') ?>

    <?= $form->field($model, 'question') ?>

    <?= $form->field($model, 'yes') ?>

    <?= $form->field($model, 'no') ?>

    <?= $form->field($model, 'cannot_answer') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
