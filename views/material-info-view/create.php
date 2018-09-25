<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaterialInfoView */

$this->title = 'Create Material Info View';
$this->params['breadcrumbs'][] = ['label' => 'Material Info Views', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-info-view-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
