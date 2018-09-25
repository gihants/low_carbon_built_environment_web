<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BuiltEnvironmetType */

$this->title = 'Create Built Environmet Type';
$this->params['breadcrumbs'][] = ['label' => 'Built Environmet Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="built-environmet-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
