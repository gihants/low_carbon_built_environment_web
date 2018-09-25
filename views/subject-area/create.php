<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SubjectArea */

$this->title = 'Create Subject Area';
$this->params['breadcrumbs'][] = ['label' => 'Subject Areas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-area-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
