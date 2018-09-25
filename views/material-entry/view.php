<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\BaseHtml;

/* @var $this yii\web\View */
/* @var $model app\models\MaterialEntry */
?>
 <?= $form = Html::beginForm(['/material-entry/index', 'id' => $model->id], 'POST'); ?>



<div class="form-group">
    <?= Html::submitButton('POST', ['class' => 'btn btn-primary']) ?>
</div>

<?php BaseHtml::endForm() ?>
