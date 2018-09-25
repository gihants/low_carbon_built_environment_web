<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ListView;
use app\models\AuthorsOfMaterial;
use app\models\KeywordsOfMaterial;
use app\models\SearchSourcesOfMaterial;
use app\models\FundingSourcesOfMaterial;
use app\models\BuiltEnvironmentTypesOfMaterial;
use app\models\SubjectsOfMaterial;
use app\models\SystemsOfMaterial;
use app\models\IdentifiersOfMaterial;
use app\models\LicenseOfMaterial;
use app\models\ApplicationsOfMaterial;
use app\models\CopyrightsOfMaterial;
use app\models\MaterialHasSubjectArea;
use app\models\SubjectArea;
use app\models\MaterialHasBuiltEnvironmentScale;
use app\models\BuiltEnvironmentScale;
use app\models\SubjectAreaVsBuiltEnvironmentScale;
use app\models\MaterialsPerSubjectArea;
use app\models\MaterialsPerBetScale;
use app\models\ReviewTypesOfMaterial;

use miloschuman\highcharts\Highcharts;






/* @var $this yii\web\View */
/* @var $model app\models\MaterialInfoView */

$this->title = "Claimed vs suggested review types of the articles";
$this->params['breadcrumbs'][] = ['label' => 'Claimed vs suggested review types of the articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;



################################## Data Collection #################################


$subject_area_ids = MaterialHasSubjectArea::find()
    ->select('subject_area_id')
    ->distinct()
    ->asArray()
    ->all();

$unique_claimed = ReviewTypesOfMaterial::find()
    ->select('claimed_review_type')
    ->distinct()
    ->asArray()
    ->all();

$unique_actual = ReviewTypesOfMaterial::find()
    ->select('actual_review_type')
    ->distinct()
    ->asArray()
    ->all();

for ($i=0; $i < count($unique_claimed); $i++) {
    $unique_claimed_array[$i] = $unique_claimed[$i]['claimed_review_type'];
}

for ($i=0; $i < count($unique_actual); $i++) {
    $unique_actual_array[$i] = $unique_actual[$i]['actual_review_type'];
}




for ($i=0; $i < count($subject_area_ids); $i++) {
    $unique_subject_areas[$i] = $subject_area_ids[$i]['subject_area_id'];
    $subject_area = SubjectArea::find()
        ->select('description')
        ->where(['id' => $subject_area_ids[$i]['subject_area_id']])
        ->asArray()
        ->one();
    $subject_area_array[$i] = $subject_area['description'];

}
#print_r($unique_subjects);


$bet_scale_ids = MaterialHasBuiltEnvironmentScale::find()
    ->select('built_environment_scale_id')
    ->distinct()
    ->asArray()
    ->all();



#print_r($subject_array);
#print(count($bet_ids));


for ($i=0; $i < count($bet_scale_ids); $i++) {
    $unique_bet_scales[$i] = $bet_scale_ids[$i]['built_environment_scale_id'];
    $bet_scale = BuiltEnvironmentScale::find()
        ->select('description')
        ->where(['id' => $bet_scale_ids[$i]['built_environment_scale_id']])
        ->asArray()
        ->one();
    $bet_scale_array[$i] = $bet_scale['description'];

}












$data_array = [];
$count_array = [];

for ($i=0; $i < count($unique_bet_scales); $i++) {
    for ($j=0; $j < count($unique_subject_areas); $j++) {
        $materials = SubjectAreaVsBuiltEnvironmentScale::find()
            ->select('material_id')
            ->where(['subject_area_id' => $unique_subject_areas[$j]])
            ->andWhere(['built_environment_scale_id' => $unique_bet_scales[$i]])
            ->all();
        array_push($data_array, [$j, $i, count($materials)]);
        array_push($count_array, [count($materials)]);
    }


}

$data_array = [];
$count_array = [];

for ($i=0; $i < count($unique_claimed); $i++) {
    for ($j=0; $j < count($unique_actual); $j++) {
        $materials = ReviewTypesOfMaterial::find()
            ->select('material_id')
            ->where(['claimed_review_type' => $unique_claimed[$i]])
            ->andWhere(['actual_review_type' => $unique_actual[$j]])
            ->all();
        array_push($data_array, [$i, $j, count($materials)]);
        array_push($count_array, [count($materials)]);
    }


}

#print_r($data_array);
####################################################################################





$heatmap_options = [
    'scripts' => [
        'modules/heatmap',  // adds heatmap support
    ],
    'options' => [
        'title' => [
            'text' => ''
        ],
        'chart' => [
            'type' => 'heatmap',
            'height' => 300,
            'width' => 1180
        ],
        'yAxis' => [
            'categories' =>   $unique_claimed_array,
            'title' => [
                'text' => 'Claimed review type'
            ]
        ],
        'xAxis' => [
            'categories' =>  $unique_actual_array,
            'title' => [
                'text' => 'Actual review type'
            ]
        ],
        'colorAxis' =>[
            'minColor' => '#FFFFFF',
            'maxColor' => '#660066'


        ],
        'series' => [
            [
                'name' => 'Subject Areas Vs. Built Environment Scales',
                'borderWidth' => 1,
                'data' =>   $data_array,
                'dataLabels' => [
                    'enabled' => true,
                    'color' => '#000c2d',
                ],
                'turboThreshold' => 0

            ]
        ],
        'tooltip' => [

            'pointFormat' => '{point.}'
        ],

        'colsize' => 5
    ]

];

?>
    <h4><?= Html::encode($this->title) ?></h4>
    <p>The following heatmap illustrates the correlation between the suggested review types of the included articles vs the review types they were claimed to be.&nbsp;&nbsp;</p>
<?php
//echo Highcharts::widget($heatmap_options);
?>

<div id="container_1" style="min-width: 310px; max-width: 1000px; height: 350px; margin: 0 auto"></div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/heatmap.js"></script>
<script>
    claimed_array = <?php echo json_encode($unique_claimed_array);?>;
    actual_array = <?php echo json_encode($unique_actual_array);?>;
    data_array = <?php echo json_encode($data_array);?>;

    Highcharts.chart('container_1', {

        chart: {
            type: 'heatmap',
            marginTop: 40,
            marginBottom: 80,
            plotBorderWidth: 1,
            width: 600
        },


        title: {
            text: ''
        },

        xAxis: {
            categories: claimed_array,
            title: {
                text: 'Claimed review type'
            }
        },

        yAxis: {
            categories: actual_array,
            title: {
                text: 'Suggested review type'
            }
        },

        colorAxis: {
            min: 0,
            minColor: '#FFFFFF',
            maxColor: '#660066'
        },

        legend: {
            align: 'right',
            layout: 'vertical',
            margin: 0,
            verticalAlign: 'top',
            y: 25,
            symbolHeight: 280,
            enabled:false
        },

        tooltip: {
            formatter: function () {
                return 'Claimed review type: <b>' + this.series.xAxis.categories[this.point.x] + '</b> and <br>' +
                    '</b>Suggested review type: <b>' + this.series.yAxis.categories[this.point.y] + '</br></b> => <b>' + this.point.value + '</b> review articles';
            }
        },

        series: [{
            name: 'Sales per employee',
            borderWidth: 1,
            data: data_array,
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '15px'
                }
            },
            events: {
                click: function (event) {
                    if (event.point.value == 0)  {
                        alert("No review articles found!");
                    }
                    else {
                        var claimed = this.xAxis.categories[event.point.x];
                        var suggested = this.yAxis.categories[event.point.y];
                        var url_to = <?php echo json_encode(Url::to(['material-info-view/review-types'])); ?>;
                        console.log(url_to);
                        var new_url = url_to.concat('&claimed=', claimed);
                        var new_url = new_url.concat('&suggested=', suggested);
                        var win = window.open(new_url, '_blank');
                        win.focus();
                    }

                }
            },
        }]

    });

</script>



<p>Definitions for the review types are given in the table below.</p>
<table style="height: 341px; width: 700px; border-color: #000033;" border="2">
    <tbody>
    <tr>
        <td style="width: 145px; text-align: center;"><strong>Review type</strong></td>
        <td style="width: 817px; text-align: center;"><strong>Description</strong></td>
        <td style="width: 411px; text-align: center;"><strong>Comments</strong></td>
    </tr>
    <tr>
        <td style="width: 145px;">
            <p><strong>Systematic&nbsp;review</strong></p>
        </td>
        <td style="width: 817px;">
            <ul>
                <li>Methods&nbsp;and&nbsp;scope&nbsp;of&nbsp;the&nbsp;review&nbsp;are&nbsp;predetermined&nbsp;(e.g.&nbsp;in&nbsp;a&nbsp;protocol,&nbsp;registration)&nbsp;</li>
                <li>Comprehensive&nbsp;search&nbsp;performed&nbsp;to&nbsp;find&nbsp;(almost)&nbsp;all&nbsp;relevant&nbsp;studies&nbsp;on&nbsp;a&nbsp;given&nbsp;topic&nbsp;</li>
                <li>Explicit&nbsp;criteria&nbsp;to&nbsp;include/exclude&nbsp;studies</li>
                <li>Quality&nbsp;of&nbsp;individual&nbsp;included&nbsp;studies&nbsp;is&nbsp;apprised</li>
                <li>Describes&nbsp;explicit&nbsp;methods&nbsp;used&nbsp;to&nbsp;extract&nbsp;and&nbsp;synthesise&nbsp;(qualitatively&nbsp;or&nbsp;quantitatively)&nbsp;study&nbsp;findings</li>
            </ul>
        </td>
        <td style="width: 411px;">
            <p>Sometimes&nbsp;named&nbsp;as&nbsp;meta-analysis</p>
            &nbsp;</td>
    </tr>
    <tr>
        <td style="width: 145px;">
            <p><strong>Systematic&nbsp;map</strong></p>
        </td>
        <td style="width: 817px;">
            <ul>
                <li>&nbsp;Systematic&nbsp;review&nbsp;that&nbsp;aims&nbsp;to&nbsp;show&nbsp;gaps&nbsp;and&nbsp;gluts&nbsp;in&nbsp;evidence,&nbsp;often&nbsp;via&nbsp;extensive&nbsp;tables&nbsp;and&nbsp;graphics</li>
            </ul>
        </td>
        <td style="width: 411px;">&nbsp;
            <p>Sometimes&nbsp;named&nbsp;as&nbsp;systematic&nbsp;review,&nbsp;or&nbsp;evidence&nbsp;map</p>
        </td>
    </tr>
    <tr>
        <td style="width: 145px;">
            <p><strong>Meta-analysis</strong></p>
        </td>
        <td style="width: 817px;">
            <ul>
                <li>Systematic&nbsp;review&nbsp;(or&nbsp;rapid&nbsp;review)&nbsp;that&nbsp;includes&nbsp;statistical&nbsp;analysis&nbsp;of&nbsp;effect&nbsp;sizes,&nbsp;ideally&nbsp;using&nbsp;formal&nbsp;meta-analytical&nbsp;statistical&nbsp;models</li>
            </ul>
        </td>
        <td style="width: 411px;">&nbsp;
            <p>There&nbsp;are&nbsp;different&nbsp;types/definitions&nbsp;of&nbsp;meta-analysis</p>
        </td>
    </tr>
    <tr>
        <td style="width: 145px;">
            <p><strong>Rapid&nbsp;review</strong></p>
        </td>
        <td style="width: 817px;">
            <ul>
                <li>Searched&nbsp;sources&nbsp;are&nbsp;limited&nbsp;due&nbsp;to&nbsp;time&nbsp;constraints&nbsp;of&nbsp;searching</li>
                <li>Search&nbsp;methods&nbsp;transparent&nbsp;and&nbsp;reproducible.</li>
                <li>Selection&nbsp;based&nbsp;on&nbsp;inclusion/exclusion&nbsp;criteria</li>
                <li>Critical&nbsp;and&nbsp;rigorous&nbsp;appraisal&nbsp;of&nbsp;studies,&nbsp;but&nbsp;not&nbsp;in&nbsp;depth</li>
                <li>Descriptive&nbsp;summary&nbsp;or&nbsp;categorization&nbsp;of&nbsp;data,&nbsp;may&nbsp;be&nbsp;partially&nbsp;quantitative</li>
            </ul>
        </td>
        <td style="width: 411px;">&nbsp;
            <p>Sometimes&nbsp;named&nbsp;as&nbsp;systematic&nbsp;review</p>
        </td>
    </tr>
    <tr>
        <td style="width: 145px;">
            <p><strong>Scoping&nbsp;review</strong></p>
        </td>
        <td style="width: 817px;">
            <ul>
                <li>&nbsp;Broad&nbsp;search&nbsp;scope,&nbsp;often&nbsp;comprehensive</li>
                <li>Aims&nbsp;to&nbsp;describe&nbsp;existing&nbsp;literature&nbsp;in&nbsp;terms&nbsp;of&nbsp;volume,&nbsp;distribution,&nbsp;features</li>
                <li>Can&nbsp;clarify&nbsp;working&nbsp;definitions&nbsp;and&nbsp;conceptual&nbsp;boundaries&nbsp;of&nbsp;a&nbsp;topic&nbsp;or&nbsp;field</li>
                <li>Can&nbsp;identify&nbsp;gaps&nbsp;and&nbsp;trends&nbsp;in&nbsp;the&nbsp;literature/research</li>
            </ul>
        </td>
        <td style="width: 411px;">&nbsp;
            <p>Sometimes&nbsp;named&nbsp;as&nbsp;systematic&nbsp;review</p>
        </td>
    </tr>
    <tr>
        <td style="width: 145px;">
            <p><strong>Narrative&nbsp;review</strong></p>
        </td>
        <td style="width: 817px;">
            <ul>
                <li>&nbsp;Descriptive&nbsp;summary&nbsp;of&nbsp;previous&nbsp;work.</li>
                <li>Does&nbsp;not&nbsp;specify&nbsp;methods&nbsp;by&nbsp;which&nbsp;the&nbsp;reviewed&nbsp;studies&nbsp;were&nbsp;identified,&nbsp;</li>
                <li>selected&nbsp;and&nbsp;evaluated</li>
                <li>Possible&nbsp;biases&nbsp;in&nbsp;selecting&nbsp;and&nbsp;assessing&nbsp;the&nbsp;literature</li>
                <li>Cannot&nbsp;be&nbsp;replicated</li>
            </ul>
        </td>
        <td style="width: 411px;">&nbsp;&nbsp;</td>
    </tr>
    </tbody>
</table>
