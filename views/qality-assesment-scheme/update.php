<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QalityAssesmentScheme */

$this->title = 'Update Qality Assesment Scheme: ' . $model->qa_question_id;
$this->params['breadcrumbs'][] = ['label' => 'Qality Assesment Schemes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->qa_question_id, 'url' => ['view', 'id' => $model->qa_question_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="qality-assesment-scheme-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
