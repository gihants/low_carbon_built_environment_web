<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BuiltEnvironmentType */

$this->title = 'Create Built Environment Type';
$this->params['breadcrumbs'][] = ['label' => 'Built Environment Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="built-environment-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
