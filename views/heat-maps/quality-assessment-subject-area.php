<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TempQas;
use app\models\QualityAssesment;
use app\models\QaSubjectArea;

use yii\data\ActiveDataProvider;

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;




$subject_areas = QaSubjectArea::find()
    ->select('subject_area')
    ->distinct()
    ->asArray()
    ->all();

//print_r($subject_areas);
$i = 0;
foreach ($subject_areas as $subject_area) {
    $temp_subject_area = $subject_area['subject_area'];
    $a_count = QaSubjectArea::find()
        ->select('studies')
        ->where(['quality_index' => 'A', 'subject_area' => $temp_subject_area])
        ->asArray()
        ->one();
    if ($a_count == null) {
        $a_array[$i] = 0;
    }
    else {
        $a_array[$i] = intval($a_count['studies']);
    }

    $b_count = QaSubjectArea::find()
        ->select('studies')
        ->where(['quality_index' => 'B', 'subject_area' => $temp_subject_area])
        ->asArray()
        ->one();
    if ($b_count == null) {
        $b_array[$i] = 0;
    }
    else {
        $b_array[$i] = intval($b_count['studies']);
    }

    $c_count = QaSubjectArea::find()
        ->select('studies')
        ->where(['quality_index' => 'C', 'subject_area' => $temp_subject_area])
        ->asArray()
        ->one();
    if ($c_count == null) {
        $c_array[$i] = 0;
    }
    else {
        $c_array[$i] = intval($c_count['studies']);
    }

    $subject_areas_array[$i] = $temp_subject_area;

    $i = $i + 1;
}

###########################################################################################





$this->title = "Quality by Subject area";
$this->params['breadcrumbs'][] = ['label' => 'Quality by Subject area', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;



?>
<h4><?= Html::encode($this->title) ?></h4>
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

<p>The following diagram illustrate the distribution of overall quality index among different Subject areas, as number of articles with each overall quality index belonging to each Subject are (Note: Single review article may belong to multiple subject areas)</p>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container_1" style="min-width: 310px; max-width: 1000px; height: 350px; margin: 0 auto"></div>
<p>The following diagram illustrate the distribution of overall quality index among different Subject areas, as the percentage of articles with each overall quality index belonging to each Subject are (Note: Single review article may belong to multiple subject areas)</p>
<div id="container_2" style="min-width: 310px; max-width: 1000px; height: 1000px; margin: 0 auto"></div>




<script>

    a_array = <?php echo json_encode($a_array);?>;
    b_array = <?php echo json_encode($b_array);?>;
    c_array = <?php echo json_encode($c_array);?>;
    subject_areas = <?php echo json_encode($subject_areas_array);?>;

    Highcharts.chart('container_1', {
        chart: {
            type: 'bar',
            height: 350
        },
        title: {
            text: ''
        },
        xAxis: {
            title: {
                text: 'Subject area'
            },
            categories: subject_areas
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of reviews'
            }
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'normal',
                borderWidth:0,
                shadow: false,
                pointWidth: 18
            }

        },
        series: [ {
            name: 'C = Major flaws in many aspects of the review',
            data: c_array,
            color: '#8a1815',
            events: {
                click: function (event) {
                    var subject_area = event.point.category;
                    console.log(event.point);
                    var url_to = <?php echo json_encode(Url::to(['material-info-view/quality-index-subject-area'])); ?>;
                    var new_url = url_to.concat('&subject_area=', subject_area, '&quality_index=','C');
                    var win = window.open(new_url, '_blank');
                    win.focus();
                }
            }
        },{
            name: 'B = Some flaws',
            data: b_array,
            color: '#d87812',
            events: {
                click: function (event) {
                    var subject_area = event.point.category;
                    console.log(event.point);
                    var url_to = <?php echo json_encode(Url::to(['material-info-view/quality-index-subject-area'])); ?>;
                    var new_url = url_to.concat('&subject_area=', subject_area, '&quality_index=','B');
                    var win = window.open(new_url, '_blank');
                    win.focus();
                }
            }
        }, {
            name: 'A = Minimal flaws',
            data: a_array,
            color: '#579b62',
            events: {
                click: function (event) {
                    var subject_area = event.point.category;
                    console.log(event.point);
                    var url_to = <?php echo json_encode(Url::to(['material-info-view/quality-index-subject-area'])); ?>;
                    var new_url = url_to.concat('&subject_area=', subject_area, '&quality_index=','A');
                    var win = window.open(new_url, '_blank');
                    win.focus();
                }
            }

        }]
    });

    Highcharts.chart('container_2', {
        chart: {
            type: 'bar',
            height: 350
        },
        title: {
            text: ''
        },
        xAxis: {
            title: {
                text: 'Subject area'
            },
            categories: subject_areas
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
            name: 'C = Major flaws in many aspects of the review',
            data: c_array,
            color: '#8a1815',
            events: {
                click: function (event) {
                    var subject_area = event.point.category;
                    console.log(event.point);
                    var url_to = <?php echo json_encode(Url::to(['material-info-view/quality-index-subject-area'])); ?>;
                    var new_url = url_to.concat('&subject_area=', subject_area, '&quality_index=','C');
                    var win = window.open(new_url, '_blank');
                    win.focus();
                }
            }
        },{
            name: 'B = Some flaws',
            data: b_array,
            color: '#d87812',
            events: {
                click: function (event) {
                    var subject_area = event.point.category;
                    console.log(event.point);
                    var url_to = <?php echo json_encode(Url::to(['material-info-view/quality-index-subject-area'])); ?>;
                    var new_url = url_to.concat('&subject_area=', subject_area, '&quality_index=','B');
                    var win = window.open(new_url, '_blank');
                    win.focus();
                }
            }
        }, {
            name: 'A = Minimal flaws',
            data: a_array,
            color: '#579b62',
            events: {
                click: function (event) {
                    var subject_area = event.point.category;
                    console.log(event.point);
                    var url_to = <?php echo json_encode(Url::to(['material-info-view/quality-index-subject-area'])); ?>;
                    var new_url = url_to.concat('&subject_area=', subject_area, '&quality_index=','A');
                    var win = window.open(new_url, '_blank');
                    win.focus();
                }
            }

        }]
    });

</script>

