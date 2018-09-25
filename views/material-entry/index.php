<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaterialEntrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Material Entries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-entry-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Material Entry', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'year',
            'review_type_id',
            'risk_type_id',
             'main_topic',
            // 'geographic_focus',
            // 'prisma_diagram_used',
            // 'timeframe_from',
            // 'timeframe_to',
            // 'search_string',
            // 'screening_criteria',
            // 'no_of_original_sources',
            // 'systhesis_method_id',
            // 'quantitative_map',
            // 'conclusions:ntext',
            // 'conflict_of_interest',
            // 'comments',
            // 'qa_1',
            // 'qa_2',
            // 'qa_3',
            // 'qa_4',
            // 'qa_5',
            // 'qa_6',
            // 'qa_7',
            // 'qa_8',
            // 'qa_9',
            // 'qa_10',
            // 'qa_11',
            // 'qa_12',
            // 'scale_id',
            // 'material_type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
