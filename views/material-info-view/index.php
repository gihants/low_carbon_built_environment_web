<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaterialInfoViewSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Review articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-info-view-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <p>A preview of included review articles is given in the table below.</p>
    <p>Notes:&nbsp;</p>
    <ol>
        <li>Articles can be searched using the search fields: Article key, Title, Year, Authors, Claimed review type, Actual review type, Quality index, Risk of bias and Main topic.&nbsp;</li>
        <li>Quality index and Risk of bias have been derived using modified AMSTAR (<a title="Limitations of A Measurement Tool to Assess Systematic Reviews (AMSTAR) and suggestions for improvement" href="https://systematicreviewsjournal.biomedcentral.com/articles/10.1186/s13643-016-0237-1">Burda, Holmer and Noris 2016</a>; <a title="Development of AMSTAR: a measurement tool to assess the methodological quality of systematic reviews" href="https://bmcmedresmethodol.biomedcentral.com/articles/10.1186/1471-2288-7-10">Shea et al. 2007</a>) and AMSTAR-2 (<a title="AMSTAR 2: a critical appraisal tool for systematic reviews that include randomised or non-randomised studies of healthcare interventions, or both" href="https://www.bmj.com/content/358/bmj.j4008.full">Shea et al.2017</a>) checklist. For more details of the quality assessment process, please visit&nbsp;<a href="index.php?r=quality-assessment-scheme%2Findex">Quality assessment scheme.</a></li>
        <li>To visit detailed view of each review article, please click on  <span class="glyphicon glyphicon-eye-open"></span> icon at the end of each row.</li>
    </ol>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            //'id',
            'material_key',
            'title',
            'year',
            'Authors:ntext',
            'review_type',
            'actual_review_type',
            'quality_index',
            //'quality_index_comment:ntext',
             'risk_level',
            // 'risk_level_comment:ntext',
            // 'actual_review_type',
             'main_topic',
            // 'georaphically_focussed',
            // 'prisma_diagram_used',
            // 'study_focus_starts',
            // 'study_focus_ends',
            // 'screening_criteria',
            // 'search_string',
            // 'number_of_original_sources',
            // 'synthesis_method',
            // 'quantitative_map_included',
            // 'comclusions:ntext',
            // 'conflicts_of_interest',
            // 'comments',
            // 'scale',
            // 'material_type',
            // 'material_category',
            // 'language',
            // 'chapter_or_part',
            // 'conference_date',
            // 'conference_venue',
            // 'published_date',
            // 'edition',
            // 'issue',
            // 'journal',
            // 'pagination',
            // 'peer_reviewed',
            // 'publication_place',
            // 'publisher',
            // 'school_department_or_centre',
            // 'series_sort_no',
            // 'series_title',
            // 'series_volume_no',
            // 'volume',
            // 'website_owner',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
