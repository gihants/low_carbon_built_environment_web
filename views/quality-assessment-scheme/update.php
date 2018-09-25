<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QualityAssessmentScheme */

$this->title = 'Update Quality Assessment Scheme: ' . $model->qa_question_id;
$this->params['breadcrumbs'][] = ['label' => 'Quality Assessment Schemes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->qa_question_id, 'url' => ['view', 'id' => $model->qa_question_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="quality-assessment-scheme-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
