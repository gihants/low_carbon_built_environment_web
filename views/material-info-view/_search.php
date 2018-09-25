<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialInfoViewSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-info-view-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'material_key') ?>

    <?= $form->field($model, 'Authors') ?>

    <?= $form->field($model, 'quality_index') ?>

    <?= $form->field($model, 'quality_index_comment') ?>

    <?php // echo $form->field($model, 'risk_level') ?>

    <?php // echo $form->field($model, 'risk_level_comment') ?>

    <?php // echo $form->field($model, 'actual_review_type') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'review_type') ?>

    <?php // echo $form->field($model, 'main_topic') ?>

    <?php // echo $form->field($model, 'georaphically_focussed') ?>

    <?php // echo $form->field($model, 'prisma_diagram_used') ?>

    <?php // echo $form->field($model, 'study_focus_starts') ?>

    <?php // echo $form->field($model, 'study_focus_ends') ?>

    <?php // echo $form->field($model, 'screening_criteria') ?>

    <?php // echo $form->field($model, 'search_string') ?>

    <?php // echo $form->field($model, 'number_of_original_sources') ?>

    <?php // echo $form->field($model, 'synthesis_method') ?>

    <?php // echo $form->field($model, 'quantitative_map_included') ?>

    <?php // echo $form->field($model, 'comclusions') ?>

    <?php // echo $form->field($model, 'conflicts_of_interest') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'scale') ?>

    <?php // echo $form->field($model, 'material_type') ?>

    <?php // echo $form->field($model, 'material_category') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'chapter_or_part') ?>

    <?php // echo $form->field($model, 'conference_date') ?>

    <?php // echo $form->field($model, 'conference_venue') ?>

    <?php // echo $form->field($model, 'published_date') ?>

    <?php // echo $form->field($model, 'edition') ?>

    <?php // echo $form->field($model, 'issue') ?>

    <?php // echo $form->field($model, 'journal') ?>

    <?php // echo $form->field($model, 'pagination') ?>

    <?php // echo $form->field($model, 'peer_reviewed') ?>

    <?php // echo $form->field($model, 'publication_place') ?>

    <?php // echo $form->field($model, 'publisher') ?>

    <?php // echo $form->field($model, 'school_department_or_centre') ?>

    <?php // echo $form->field($model, 'series_sort_no') ?>

    <?php // echo $form->field($model, 'series_title') ?>

    <?php // echo $form->field($model, 'series_volume_no') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'website_owner') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
