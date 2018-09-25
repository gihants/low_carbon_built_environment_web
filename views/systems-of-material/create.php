<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SystemsOfMaterial */

$this->title = 'Create Systems Of Material';
$this->params['breadcrumbs'][] = ['label' => 'Systems Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="systems-of-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
