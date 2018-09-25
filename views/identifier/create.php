<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IdentifierType */

$this->title = 'Create Identifier Type';
$this->params['breadcrumbs'][] = ['label' => 'Identifier Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="identifier-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
