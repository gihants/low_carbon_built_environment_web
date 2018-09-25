<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchSource */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="search-source-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'source_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weblink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source_type')->dropDownList([ 'Online Database' => 'Online Database', 'Other Source' => 'Other Source', '' => '', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'comments')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
