<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CountriesOfFirstAuthors */

$this->title = $model->country;
$this->params['breadcrumbs'][] = ['label' => 'Countries Of First Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-of-first-authors-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->country], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->country], [
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
            'country',
            'number_of_articles',
        ],
    ]) ?>

</div>
