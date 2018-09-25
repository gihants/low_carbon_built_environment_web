<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CopyrightType */

$this->title = 'Create Copyright Type';
$this->params['breadcrumbs'][] = ['label' => 'Copyright Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="copyright-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
