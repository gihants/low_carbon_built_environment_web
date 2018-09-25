<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QualityAssessmentSchemeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quality assessment scheme';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quality-assessment-scheme-index">

    <h4><?= Html::encode($this->title) ?></h4>
    <p>Quality assessment of the review articles is performed using modified AMSTAR (<a title="Limitations of A Measurement Tool to Assess Systematic Reviews (AMSTAR) and suggestions for improvement" href="https://systematicreviewsjournal.biomedcentral.com/articles/10.1186/s13643-016-0237-1">Burda, Holmer and Noris 2016</a>; <a title="Development of AMSTAR: a measurement tool to assess the methodological quality of systematic reviews" href="https://bmcmedresmethodol.biomedcentral.com/articles/10.1186/1471-2288-7-10">Shea et al. 2007</a>) and AMSTAR-2 (<a title="AMSTAR 2: a critical appraisal tool for systematic reviews that include randomised or non-randomised studies of healthcare interventions, or both" href="https://www.bmj.com/content/358/bmj.j4008.full">Shea et al.2017</a>) checklist. The preliminary&nbsp;quality assessment is carried out using 16 quality assessment questions.&nbsp;</p>
    <p>Based on the scoring for preliminary&nbsp;questions&nbsp;and also based on the subjective overall evaluation of the assessors, an overall rating (Quality&nbsp;Index) is assigned to each review article,&nbsp;highlighting whether major concerns arose during the quality assessment that may affect overall conclusions of the review article. Possible quality indices are:</p>
    <ol>
        <li>A = minimal flaws</li>
        <li>B = some flaws</li>
        <li>C = major flaws in many aspects of the review.</li>
    </ol>
    <p>Then a risk of bias score is assigned to each review article to represent how likely are the main conclusions of the review to be biased. Possible risk of bias scores are:</p>
    <ol>
        <li>low risk</li>
        <li>medium risk</li>
        <li>high risk.</li>
    </ol>
    <p>The list of questions used for the preliminary quality assessment is provided in the following table, along with the marking scheme.</p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [


            'qa_question_id',
            'question',
            'yes',
            'no',
            'cannot_answer',


        ],
    ]); ?>
</div>
