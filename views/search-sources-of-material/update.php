<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SearchSourcesOfMaterial */

$this->title = 'Update Search Sources Of Material: ' . $model->material_id;
$this->params['breadcrumbs'][] = ['label' => 'Search Sources Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->material_id, 'url' => ['view', 'id' => $model->material_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="search-sources-of-material-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
