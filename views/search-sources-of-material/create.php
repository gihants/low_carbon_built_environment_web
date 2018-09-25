<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SearchSourcesOfMaterial */

$this->title = 'Create Search Sources Of Material';
$this->params['breadcrumbs'][] = ['label' => 'Search Sources Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-sources-of-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
