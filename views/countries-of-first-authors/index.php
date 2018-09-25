<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountriesOfFirstAuthorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries Of First Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-of-first-authors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Countries Of First Authors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'country',
            'number_of_articles',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
