<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthorsOfMaterial */

$this->title = 'Create Authors Of Material';
$this->params['breadcrumbs'][] = ['label' => 'Authors Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authors-of-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
