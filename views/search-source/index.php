<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchSourceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Search Sources';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="search-source-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Search Source', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'source_name',
            'weblink',
            'source_type',
            'comments',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
