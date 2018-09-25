<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CopyrightsOfMaterial */

$this->title = 'Create Copyrights Of Material';
$this->params['breadcrumbs'][] = ['label' => 'Copyrights Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="copyrights-of-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
