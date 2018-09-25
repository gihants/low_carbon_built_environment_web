<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SearchSourcesOfMaterial */

$this->title = $model->material_id;
$this->params['breadcrumbs'][] = ['label' => 'Search Sources Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-sources-of-material-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->material_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->material_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'material_id',
            'sarch_source_name',
            'weblink',
            'source_type',
            'comments:ntext',
        ],
    ]) ?>

</div>
