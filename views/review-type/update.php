<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReviewType */

$this->title = 'Update Review Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Review Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="review-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
