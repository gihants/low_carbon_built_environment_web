<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BuiltEnvironmentTypesOfMaterial */

$this->title = 'Create Built Environment Types Of Material';
$this->params['breadcrumbs'][] = ['label' => 'Built Environment Types Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="built-environment-types-of-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
