<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\QaScore */

$this->title = 'Update Qa Score: ' . $model->qa_score;
$this->params['breadcrumbs'][] = ['label' => 'Qa Scores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->qa_score, 'url' => ['view', 'id' => $model->qa_score]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="qa-score-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
