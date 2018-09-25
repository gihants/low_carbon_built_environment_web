<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialInfoView */
/* @var $form ActiveForm */
?>
<div class="material-info-input">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id') ?>
        <?= $form->field($model, 'georaphically_focussed') ?>
        <?= $form->field($model, 'prisma_diagram_used') ?>
        <?= $form->field($model, 'number_of_original_sources') ?>
        <?= $form->field($model, 'peer_reviewed') ?>
        <?= $form->field($model, 'title') ?>
        <?= $form->field($model, 'year') ?>
        <?= $form->field($model, 'study_focus_starts') ?>
        <?= $form->field($model, 'study_focus_ends') ?>
        <?= $form->field($model, 'conference_date') ?>
        <?= $form->field($model, 'published_date') ?>
        <?= $form->field($model, 'review_type') ?>
        <?= $form->field($model, 'language') ?>
        <?= $form->field($model, 'edition') ?>
        <?= $form->field($model, 'issue') ?>
        <?= $form->field($model, 'series_sort_no') ?>
        <?= $form->field($model, 'series_volume_no') ?>
        <?= $form->field($model, 'volume') ?>
        <?= $form->field($model, 'risk_type') ?>
        <?= $form->field($model, 'main_topic') ?>
        <?= $form->field($model, 'screening_criteria') ?>
        <?= $form->field($model, 'conflicts_of_interest') ?>
        <?= $form->field($model, 'synthesis_method') ?>
        <?= $form->field($model, 'comclusions') ?>
        <?= $form->field($model, 'comments') ?>
        <?= $form->field($model, 'scale') ?>
        <?= $form->field($model, 'material_type') ?>
        <?= $form->field($model, 'material_category') ?>
        <?= $form->field($model, 'qa_score_1') ?>
        <?= $form->field($model, 'qa_score_2') ?>
        <?= $form->field($model, 'qa_score_3') ?>
        <?= $form->field($model, 'qa_score_4') ?>
        <?= $form->field($model, 'qa_score_5') ?>
        <?= $form->field($model, 'qa_score_6') ?>
        <?= $form->field($model, 'qa_score_7') ?>
        <?= $form->field($model, 'qa_score_8') ?>
        <?= $form->field($model, 'qa_score_9') ?>
        <?= $form->field($model, 'qa_score_10') ?>
        <?= $form->field($model, 'qa_score_11') ?>
        <?= $form->field($model, 'qa_score_12') ?>
        <?= $form->field($model, 'chapter_or_part') ?>
        <?= $form->field($model, 'conference_venue') ?>
        <?= $form->field($model, 'journal') ?>
        <?= $form->field($model, 'pagination') ?>
        <?= $form->field($model, 'publication_place') ?>
        <?= $form->field($model, 'publisher') ?>
        <?= $form->field($model, 'school_department_or_centre') ?>
        <?= $form->field($model, 'series_title') ?>
        <?= $form->field($model, 'website_owner') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- material-info-input -->
