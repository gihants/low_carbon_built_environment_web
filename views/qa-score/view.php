<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\QaScore */

$this->title = $model->qa_score;
$this->params['breadcrumbs'][] = ['label' => 'Qa Scores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qa-score-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->qa_score], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->qa_score], [
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
            'qa_score',
            'description',
            'colour_code',
        ],
    ]) ?>

</div>
