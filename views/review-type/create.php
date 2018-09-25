<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReviewType */

$this->title = 'Create Review Type';
$this->params['breadcrumbs'][] = ['label' => 'Review Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
