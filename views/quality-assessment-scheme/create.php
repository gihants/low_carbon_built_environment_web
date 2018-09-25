<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QualityAssessmentScheme */

$this->title = 'Create Quality Assessment Scheme';
$this->params['breadcrumbs'][] = ['label' => 'Quality Assessment Schemes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quality-assessment-scheme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
