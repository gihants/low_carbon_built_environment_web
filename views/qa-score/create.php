<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QaScore */

$this->title = 'Create Qa Score';
$this->params['breadcrumbs'][] = ['label' => 'Qa Scores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qa-score-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
