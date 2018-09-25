<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RiskType */

$this->title = 'Create Risk Type';
$this->params['breadcrumbs'][] = ['label' => 'Risk Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="risk-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
