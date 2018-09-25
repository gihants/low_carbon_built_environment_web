<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SearchSource */

$this->title = 'Create Search Source';
$this->params['breadcrumbs'][] = ['label' => 'Search Sources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-source-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
