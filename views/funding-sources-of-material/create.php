<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FundingSourcesOfMaterial */

$this->title = 'Create Funding Sources Of Material';
$this->params['breadcrumbs'][] = ['label' => 'Funding Sources Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funding-sources-of-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
