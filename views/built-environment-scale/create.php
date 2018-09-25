<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BuiltEnvironmentScale */

$this->title = 'Create Built Environment Scale';
$this->params['breadcrumbs'][] = ['label' => 'Built Environment Scales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="built-environment-scale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
