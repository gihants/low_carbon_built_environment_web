<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CountriesOfFirstAuthors */

$this->title = 'Update Countries Of First Authors: ' . $model->country;
$this->params['breadcrumbs'][] = ['label' => 'Countries Of First Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country, 'url' => ['view', 'id' => $model->country]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="countries-of-first-authors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
