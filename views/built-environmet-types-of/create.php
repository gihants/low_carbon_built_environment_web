<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BuiltEnvironmetTypesOfMaterial */

$this->title = 'Create Built Environmet Types Of Material';
$this->params['breadcrumbs'][] = ['label' => 'Built Environmet Types Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="built-environmet-types-of-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
