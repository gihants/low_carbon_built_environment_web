<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CountriesOfFirstAuthors */

$this->title = 'Create Countries Of First Authors';
$this->params['breadcrumbs'][] = ['label' => 'Countries Of First Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-of-first-authors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
