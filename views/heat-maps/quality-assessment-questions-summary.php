<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TempQas;
use app\models\QualityAssesment;
use yii\data\ActiveDataProvider;

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

$qi_a= QualityAssesment::find()
    ->where(['quality_index' => 'A'])
    ->asArray()
    ->all();
$qi_a_count = count($qi_a);

$qi_b= QualityAssesment::find()
    ->where(['quality_index' => 'B'])
    ->asArray()
    ->all();
$qi_b_count = count($qi_b);

$qi_c= QualityAssesment::find()
    ->where(['quality_index' => 'C'])
    ->asArray()
    ->all();
$qi_c_count = count($qi_c);

$a_array = array($qi_a_count);
$b_array = array($qi_b_count);
$c_array = array($qi_c_count);


$qi_low= QualityAssesment::find()
    ->where(['risk_level' => 'low'])
    ->asArray()
    ->all();
$qi_low_count = count($qi_low);

$qi_medium= QualityAssesment::find()
    ->where(['risk_level' => 'medium'])
    ->asArray()
    ->all();
$qi_medium_count = count($qi_medium);

$qi_high= QualityAssesment::find()
    ->where(['risk_level' => 'high'])
    ->asArray()
    ->all();
$qi_high_count = count($qi_high);

$high_array = array($qi_high_count);
$medium_array = array($qi_medium_count);
$low_array = array($qi_low_count);


$temp_qas = TempQas::find()
    ->where(['score' => '0'])
    ->asArray()
    ->all();

foreach ($temp_qas as $temp_qa) {

    $zeros_array[0] = intval($temp_qa['qa_1']);
    $zeros_array[1] = intval($temp_qa['qa_2']);
    $zeros_array[2] = intval($temp_qa['qa_3']);
    $zeros_array[3] = intval($temp_qa['qa_4']);
    $zeros_array[4] = intval($temp_qa['qa_5']);
    $zeros_array[5] = intval($temp_qa['qa_6']);
    $zeros_array[6] = intval($temp_qa['qa_7']);
    $zeros_array[7] = intval($temp_qa['qa_8']);
    $zeros_array[8] = intval($temp_qa['qa_9']);
    $zeros_array[9] = intval($temp_qa['qa_10']);
    $zeros_array[10] = intval($temp_qa['qa_11']);
    $zeros_array[11] = intval($temp_qa['qa_12']);
    $zeros_array[12] = intval($temp_qa['qa_13']);
    $zeros_array[13] = intval($temp_qa['qa_14']);
    $zeros_array[14] = intval($temp_qa['qa_15']);
    $zeros_array[15] = intval($temp_qa['qa_16']);


}

$temp_qas = TempQas::find()
    ->where(['score' => '0.5'])
    ->asArray()
    ->all();

foreach ($temp_qas as $temp_qa) {

    $half_array[0] = intval($temp_qa['qa_1']);
    $half_array[1] = intval($temp_qa['qa_2']);
    $half_array[2] = intval($temp_qa['qa_3']);
    $half_array[3] = intval($temp_qa['qa_4']);
    $half_array[4] = intval($temp_qa['qa_5']);
    $half_array[5] = intval($temp_qa['qa_6']);
    $half_array[6] = intval($temp_qa['qa_7']);
    $half_array[7] = intval($temp_qa['qa_8']);
    $half_array[8] = intval($temp_qa['qa_9']);
    $half_array[9] = intval($temp_qa['qa_10']);
    $half_array[10] = intval($temp_qa['qa_11']);
    $half_array[11] = intval($temp_qa['qa_12']);
    $half_array[12] = intval($temp_qa['qa_13']);
    $half_array[13] = intval($temp_qa['qa_14']);
    $half_array[14] = intval($temp_qa['qa_15']);
    $half_array[15] = intval($temp_qa['qa_16']);


}

$temp_qas = TempQas::find()
    ->where(['score' => '1'])
    ->asArray()
    ->all();

foreach ($temp_qas as $temp_qa) {

    $ones_array[0] = intval($temp_qa['qa_1']);
    $ones_array[1] = intval($temp_qa['qa_2']);
    $ones_array[2] = intval($temp_qa['qa_3']);
    $ones_array[3] = intval($temp_qa['qa_4']);
    $ones_array[4] = intval($temp_qa['qa_5']);
    $ones_array[5] = intval($temp_qa['qa_6']);
    $ones_array[6] = intval($temp_qa['qa_7']);
    $ones_array[7] = intval($temp_qa['qa_8']);
    $ones_array[8] = intval($temp_qa['qa_9']);
    $ones_array[9] = intval($temp_qa['qa_10']);
    $ones_array[10] = intval($temp_qa['qa_11']);
    $ones_array[11] = intval($temp_qa['qa_12']);
    $ones_array[12] = intval($temp_qa['qa_13']);
    $ones_array[13] = intval($temp_qa['qa_14']);
    $ones_array[14] = intval($temp_qa['qa_15']);
    $ones_array[15] = intval($temp_qa['qa_16']);


}

$temp_qas = TempQas::find()
    ->where(['score' => 'NA'])
    ->asArray()
    ->all();

foreach ($temp_qas as $temp_qa) {

    $na_array[0] = intval($temp_qa['qa_1']);
    $na_array[1] = intval($temp_qa['qa_2']);
    $na_array[2] = intval($temp_qa['qa_3']);
    $na_array[3] = intval($temp_qa['qa_4']);
    $na_array[4] = intval($temp_qa['qa_5']);
    $na_array[5] = intval($temp_qa['qa_6']);
    $na_array[6] = intval($temp_qa['qa_7']);
    $na_array[7] = intval($temp_qa['qa_8']);
    $na_array[8] = intval($temp_qa['qa_9']);
    $na_array[9] = intval($temp_qa['qa_10']);
    $na_array[10] = intval($temp_qa['qa_11']);
    $na_array[11] = intval($temp_qa['qa_12']);
    $na_array[12] = intval($temp_qa['qa_13']);
    $na_array[13] = intval($temp_qa['qa_14']);
    $na_array[14] = intval($temp_qa['qa_15']);
    $na_array[15] = intval($temp_qa['qa_16']);


}
#print_r($zeros_array);
#print(count($subject_ids));


$this->title = 'Detailed quality assessment of reviews';
$this->params['breadcrumbs'][] = $this->title;



?>
<h4><?= Html::encode($this->title) ?></h4>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>



<p>Quality assessment of the review articles was performed using
    modified AMSTAR (<a title="Limitations of A Measurement Tool to Assess Systematic Reviews (AMSTAR) and suggestions for improvement" href="https://systematicreviewsjournal.biomedcentral.com/articles/10.1186/s13643-016-0237-1">Burda,
        Holmer and Noris 2016</a><sup>1</sup>; <a title="Development of AMSTAR: a measurement tool to assess the methodological quality of systematic reviews" href="https://bmcmedresmethodol.biomedcentral.com/articles/10.1186/1471-2288-7-10">Shea
        et al. 2007</a><sup>2</sup>) and AMSTAR-2 (<a title="AMSTAR 2: a critical appraisal tool for systematic reviews that include randomised or non-randomised studies of healthcare interventions, or both" href="https://www.bmj.com/content/358/bmj.j4008.full">Shea et al.2017</a><sup>3</sup>)
    checklist. The quality assessment was carried out using 16 quality
    assessment questions. For more details of these 16 questions, please
    visit&nbsp;<a href="index.php?r=quality-assessment-scheme%2Findex">Quality
        assessment scheme.<br>
    </a>
</p>

<p>Based on the scoring for 16 questions&nbsp;and also based on the
    subjective overall evaluation of the assessors, an overall rating (<span style="font-weight: bold;">Quality&nbsp;Index</span>)
    was then assigned to each review article,&nbsp;highlighting whether
    major concerns arose during the quality assessment that may affect
    overall conclusions of the review article.Then a <span style="font-weight: bold;">risk of bias</span> score was assigned to
    each review article to
    represent how likely are the main conclusions of the review to be
    biased.</p>

<p>Reference:</p>

<ol>

    <li>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <span style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">Burda,
B.U., Holmer, H.K. and Norris, S.L., 2016. Limitations of A Measurement
Tool to Assess Systematic Reviews (AMSTAR) and suggestions for
improvement.<span>&nbsp;</span></span><i style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">Systematic
            reviews</i><span style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">,<span>&nbsp;</span></span><i style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">5</i><span style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">(1),
p.58.</span></li>
    <li>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <span style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">Shea,
B.J., Grimshaw, J.M., Wells, G.A., Boers, M., Andersson, N., Hamel, C.,
Porter, A.C., Tugwell, P., Moher, D. and Bouter, L.M., 2007.
Development of AMSTAR: a measurement tool to assess the methodological
quality of systematic reviews.<span>&nbsp;</span></span><i style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">BMC
            medical research methodology</i><span style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">,<span>&nbsp;</span></span><i style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">7</i><span style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">(1),
p.10.</span></li>
    <li>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <span style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">Shea,
B.J., Reeves, B.C., Wells, G., Thuku, M., Hamel, C., Moran, J., Moher,
D., Tugwell, P., Welch, V., Kristjansson, E. and Henry, D.A., 2017.
AMSTAR 2: a critical appraisal tool for systematic reviews that include
randomised or non-randomised studies of healthcare interventions, or
both.<span>&nbsp;</span></span><i style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">bmj</i><span style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">,<span>&nbsp;</span></span><i style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">358</i><span style="color: rgb(34, 34, 34); font-family: Arial,sans-serif; font-size: 13px; font-style: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">,
p.j4008.</span></li>
</ol>

<p>The following diagram illustrates the distribution of scores for each quality assessment question among included review articles.</p>
<div id="container_1" style="min-width: 350px; max-width: 1000px; height: 520px; margin: 0 auto" ></div>

<p>&nbsp;</p>

<script>
    zero_array = <?php echo json_encode($zeros_array);?>;
    half_array = <?php echo json_encode($half_array);?>;
    ones_array = <?php echo json_encode($ones_array);?>;
    na_array = <?php echo json_encode($na_array);?>;
    a_array = <?php echo json_encode($a_array);?>;
    b_array = <?php echo json_encode($b_array);?>;
    c_array = <?php echo json_encode($c_array);?>;
    high_array = <?php echo json_encode($high_array);?>;
    medium_array = <?php echo json_encode($medium_array);?>;
    low_array = <?php echo json_encode($low_array);?>;

    Highcharts.chart('container_1', {
        chart: {
            type: 'bar',
            height: 500
        },
        title: {
            text: ''
        },
        xAxis: {
            title: {
                text: 'Quality assessment question'
            },
            categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Percentage of reviews'
            }
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'percent',
                borderWidth:0,
                shadow: false,
                pointWidth: 18
            }

        },
        series: [ {
            name: 'N/A = Not applicable (Not a meta-analysis)',
            data: na_array,
            color: '#bac3bc',
            events: {
                click: function (event) {
                    var question = event.point.category;
                    var url_to = <?php echo json_encode(Url::to(['material-info-view/quality-assessment'])); ?>;
                    var new_url = url_to.concat('&question=',question,'&score=', 'N/A');
                    var win = window.open(new_url, '_blank');
                    win.focus();
                }
            }

        }, {
            name: '0 = No',
            data: zero_array,
            color: '#ff4628',
            events: {
                click: function (event) {
                    var question = event.point.category;
                    var url_to = <?php echo json_encode(Url::to(['material-info-view/quality-assessment'])); ?>;
                    var new_url = url_to.concat('&question=',question,'&score=', 0);
                    var win = window.open(new_url, '_blank');
                    win.focus();
                }
            }
        },{
            name: '0.5 = Cannot answer',
            data: half_array,
            color: '#cccf2c',
            events: {
                click: function (event) {
                    var question = event.point.category;
                    var url_to = <?php echo json_encode(Url::to(['material-info-view/quality-assessment'])); ?>;
                    var new_url = url_to.concat('&question=',question,'&score=', 0.5);
                    var win = window.open(new_url, '_blank');
                    win.focus();
                }
            }
        }, {
            name: '1 = Yes',
            data: ones_array,
            color: '#00c819',
            events: {
                click: function (event) {
                    var question = event.point.category;
                    var url_to = <?php echo json_encode(Url::to(['material-info-view/quality-assessment'])); ?>;
                    var new_url = url_to.concat('&question=',question,'&score=', 1);
                    var win = window.open(new_url, '_blank');
                    win.focus();
                }
            }


        }]
    });

</script>


