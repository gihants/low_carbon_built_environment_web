<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialEntrySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-entry-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'year') ?>

    <?= $form->field($model, 'review_type_id') ?>

    <?= $form->field($model, 'risk_type_id') ?>

    <?php // echo $form->field($model, 'main_topic') ?>

    <?php // echo $form->field($model, 'geographic_focus') ?>

    <?php // echo $form->field($model, 'prisma_diagram_used') ?>

    <?php // echo $form->field($model, 'timeframe_from') ?>

    <?php // echo $form->field($model, 'timeframe_to') ?>

    <?php // echo $form->field($model, 'search_string') ?>

    <?php // echo $form->field($model, 'screening_criteria') ?>

    <?php // echo $form->field($model, 'no_of_original_sources') ?>

    <?php // echo $form->field($model, 'systhesis_method_id') ?>

    <?php // echo $form->field($model, 'quantitative_map') ?>

    <?php // echo $form->field($model, 'conclusions') ?>

    <?php // echo $form->field($model, 'conflict_of_interest') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'qa_1') ?>

    <?php // echo $form->field($model, 'qa_2') ?>

    <?php // echo $form->field($model, 'qa_3') ?>

    <?php // echo $form->field($model, 'qa_4') ?>

    <?php // echo $form->field($model, 'qa_5') ?>

    <?php // echo $form->field($model, 'qa_6') ?>

    <?php // echo $form->field($model, 'qa_7') ?>

    <?php // echo $form->field($model, 'qa_8') ?>

    <?php // echo $form->field($model, 'qa_9') ?>

    <?php // echo $form->field($model, 'qa_10') ?>

    <?php // echo $form->field($model, 'qa_11') ?>

    <?php // echo $form->field($model, 'qa_12') ?>

    <?php // echo $form->field($model, 'scale_id') ?>

    <?php // echo $form->field($model, 'material_type_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
