<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialInfoView */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-info-view-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'material_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Authors')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'quality_index')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quality_index_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'risk_level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'risk_level_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'actual_review_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'review_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_topic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'georaphically_focussed')->textInput() ?>

    <?= $form->field($model, 'prisma_diagram_used')->textInput() ?>

    <?= $form->field($model, 'study_focus_starts')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'study_focus_ends')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'screening_criteria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'search_string')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number_of_original_sources')->textInput() ?>

    <?= $form->field($model, 'synthesis_method')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantitative_map_included')->textInput() ?>

    <?= $form->field($model, 'comclusions')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'conflicts_of_interest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comments')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'scale')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material_category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chapter_or_part')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conference_date')->textInput() ?>

    <?= $form->field($model, 'conference_venue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'published_date')->textInput() ?>

    <?= $form->field($model, 'edition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'issue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'journal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pagination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'peer_reviewed')->textInput() ?>

    <?= $form->field($model, 'publication_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publisher')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_department_or_centre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'series_sort_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'series_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'series_volume_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'volume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website_owner')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
