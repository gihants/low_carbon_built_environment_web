<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RiskTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Risk Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="risk-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Risk Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'risk_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
