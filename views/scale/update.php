<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Scale */

$this->title = 'Update Scale: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Scales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scale-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
