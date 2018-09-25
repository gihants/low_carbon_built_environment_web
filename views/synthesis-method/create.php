<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SynthesisMethod */

$this->title = 'Create Synthesis Method';
$this->params['breadcrumbs'][] = ['label' => 'Synthesis Methods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="synthesis-method-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
