<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IdentifiersOfMaterial */

$this->title = 'Create Identifiers Of Material';
$this->params['breadcrumbs'][] = ['label' => 'Identifiers Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identifiers-of-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
