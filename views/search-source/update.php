<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SearchSource */

$this->title = 'Update Search Source: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Search Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="search-source-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
