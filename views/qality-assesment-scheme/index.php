<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QalityAssesmentSchemeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quality assessment scheme';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qality-assesment-scheme-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'qa_question_id',
            'question',
            'yes',
            'no',
            'cannot_answer',

        ],
    ]); ?>
</div>
