<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KeywordsOfMaterial */

$this->title = 'Create Keywords Of Material';
$this->params['breadcrumbs'][] = ['label' => 'Keywords Of Materials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keywords-of-material-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
