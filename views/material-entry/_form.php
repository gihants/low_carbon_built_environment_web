<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialEntry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-entry-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review_type_id')->textInput() ?>

    <?= $form->field($model, 'risk_type_id')->textInput() ?>

    <?= $form->field($model, 'main_topic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'geographic_focus')->textInput() ?>

    <?= $form->field($model, 'prisma_diagram_used')->textInput() ?>

    <?= $form->field($model, 'timeframe_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'timeframe_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'search_string')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'screening_criteria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_of_original_sources')->textInput() ?>

    <?= $form->field($model, 'systhesis_method_id')->textInput() ?>

    <?= $form->field($model, 'quantitative_map')->textInput() ?>

    <?= $form->field($model, 'conclusions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'conflict_of_interest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comments')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qa_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qa_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qa_3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qa_4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qa_5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qa_6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qa_7')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qa_8')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qa_9')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qa_10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qa_11')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'qa_12')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'scale_id')->textInput() ?>

    <?= $form->field($model, 'material_type_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
