<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ApplicationsOfMaterial */

$this->title = 'Create Applications Of Material';
$this->params['breadcrumbs'][] = ['label' => 'Applications Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-of-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
