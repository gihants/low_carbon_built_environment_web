<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LicenseOfMaterial */

$this->title = 'Create License Of Material';
$this->params['breadcrumbs'][] = ['label' => 'License Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="license-of-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
