<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubjectsAreasOfMaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subjects Areas Of Materials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjects-areas-of-material-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Subjects Areas Of Material', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'material_id',
            'subject_area',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
