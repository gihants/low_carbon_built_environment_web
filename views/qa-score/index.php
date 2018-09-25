<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QaScoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Qa Scores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qa-score-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Qa Score', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'qa_score',
            'description',
            'colour_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
