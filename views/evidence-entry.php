<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialEntry */
/* @var $form ActiveForm */
?>
<div class="evidence-entry">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'year') ?>
        <?= $form->field($model, 'timeframe_from') ?>
        <?= $form->field($model, 'timeframe_to') ?>
        <?= $form->field($model, 'review_type_id') ?>
        <?= $form->field($model, 'risk_type_id') ?>
        <?= $form->field($model, 'geographic_focus') ?>
        <?= $form->field($model, 'prisma_diagram_used') ?>
        <?= $form->field($model, 'no_of_original_sources') ?>
        <?= $form->field($model, 'systhesis_method_id') ?>
        <?= $form->field($model, 'quantitative_map') ?>
        <?= $form->field($model, 'scale_id') ?>
        <?= $form->field($model, 'material_type_id') ?>
        <?= $form->field($model, 'conclusions') ?>
        <?= $form->field($model, 'main_topic') ?>
        <?= $form->field($model, 'screening_criteria') ?>
        <?= $form->field($model, 'conflict_of_interest') ?>
        <?= $form->field($model, 'search_string') ?>
        <?= $form->field($model, 'comments') ?>
        <?= $form->field($model, 'qa_1') ?>
        <?= $form->field($model, 'qa_2') ?>
        <?= $form->field($model, 'qa_3') ?>
        <?= $form->field($model, 'qa_4') ?>
        <?= $form->field($model, 'qa_5') ?>
        <?= $form->field($model, 'qa_6') ?>
        <?= $form->field($model, 'qa_7') ?>
        <?= $form->field($model, 'qa_8') ?>
        <?= $form->field($model, 'qa_9') ?>
        <?= $form->field($model, 'qa_10') ?>
        <?= $form->field($model, 'qa_11') ?>
        <?= $form->field($model, 'qa_12') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- evidence-entry -->
