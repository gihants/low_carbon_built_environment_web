<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BuiltEnvironmentScaleOfMaterial */

$this->title = 'Create Built Environment Scale Of Material';
$this->params['breadcrumbs'][] = ['label' => 'Built Environment Scale Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="built-environment-scale-of-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
