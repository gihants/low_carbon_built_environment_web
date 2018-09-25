<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QalityAssesmentScheme */

$this->title = 'Create Qality Assesment Scheme';
$this->params['breadcrumbs'][] = ['label' => 'Qality Assesment Schemes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qality-assesment-scheme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
