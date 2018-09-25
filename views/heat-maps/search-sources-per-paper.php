<head>
    <meta content="en-au" http-equiv="Content-Language">
    <style type="text/css">
        .auto-style2 {
            border-width: 0px;
        }
        .auto-style5 {
            text-align: left;
            border-style: solid;
            border-width: 1px;
            background-color: #CEE2ED;
        }
        .auto-style6 {
            text-align: center;
            border-style: solid;
            border-width: 1px;
            background-color: #CEE2ED;
        }
        .auto-style8 {
            border-style: solid;
            border-width: 1px;
            background-color: #CEE2ED;
        }
        .auto-style9 {
            color: #0000FF;
        }
        .auto-style11 {
            border-style: solid;
            border-width: 1px;
            background-color: #F5F5F5;
        }
        .auto-style12 {
            text-align: center;
            border-style: solid;
            border-width: 1px;
            background-color: #F5F5F5;
        }
        .auto-style14 {
            border-style: solid;
            border-width: 1px;
        }
        .auto-style15 {
            color: #000000;
        }
    </style>
</head>
<h4 class="auto-style15"></h4>

<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SearchSourcesPerPaper;
use yii\data\ActiveDataProvider;

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;



$this->title = 'Number of search sources used in reviews';

$this->params['breadcrumbs'][] = $this->title;

?>

<h4><?= Html::encode($this->title) ?></h4>

<p>Distribution of numbers of search sources (databases, search engines, etc.) that were used to find relevant papers in the review articles claiming to be systematic reviews or meta-analyses.</p>
<p><em>You can click on each bar to obtain the filtered list of corresponding review articles.</em></p>

<div class="countries-of-first-authors-index">
    <?php
    $materials = SearchSourcesPerPaper::find()
        ->asArray()
        ->all();


    $i = 0;
    $max = 0;
    foreach ($materials as $material) {
        if (doubleval($material['search_sources']) > $max) {
            $max = doubleval($material['search_sources']);
        }
        if (doubleval($material['search_sources'] > 0)) {
            $temp_value = doubleval($material['search_sources']);
            $hist_data[$i] = $temp_value;
            $i = $i + 1;
        }

    }

    for($x = 0; $x < $max; $x++) {
       $indices[$x] = $x+1;
    }


    $columns = array_fill(0, $max, 0);

    foreach ($hist_data as $hist_point) {
        $columns[$hist_point-1] = $columns[$hist_point-1] +1;
    }

    #print_r($hist_data);
    #print(count($subject_ids));



    ?>

    <?php



    $this->registerJsFile('https://code.highcharts.com/highcharts.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);

    $this->registerJsFile('https://code.highcharts.com/modules/histogram-bellcurve.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);


    #$hist_data = [3.5, 3, 3.2, 3.1, 3.6, 3.9, 3.4, 3.4, 2.9, 3.1];







    ?>




</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/histogram-bellcurve.js"></script>


<script>

    hist_data = <?php echo json_encode($hist_data);?>;
    var data = [3.5, 3, 3.2, 3.1, 3.6, 3.9, 3.4, 3.4, 2.9, 3.1, 3.7, 3.4, 3, 3, 4, 4.4, 3.9, 3.5, 3.8, 3.8, 3.4, 3.7, 3.6, 3.3, 3.4, 3, 3.4, 3.5, 3.4, 3.2, 3.1, 3.4, 4.1, 4.2, 3.1, 3.2, 3.5, 3.6, 3, 3.4, 3.5, 2.3, 3.2, 3.5, 3.8, 3, 3.8, 3.2, 3.7, 3.3, 3.2, 3.2, 3.1, 2.3, 2.8, 2.8, 3.3, 2.4, 2.9, 2.7, 2, 3, 2.2, 2.9, 2.9, 3.1, 3, 2.7, 2.2, 2.5, 3.2, 2.8, 2.5, 2.8, 2.9, 3, 2.8, 3, 2.9, 2.6, 2.4, 2.4, 2.7, 2.7, 3, 3.4, 3.1, 2.3, 3, 2.5, 2.6, 3, 2.6, 2.3, 2.7, 3, 2.9, 2.9, 2.5, 2.8, 3.3, 2.7, 3, 2.9, 3, 3, 2.5, 2.9, 2.5, 3.6, 3.2, 2.7, 3, 2.5, 2.8, 3.2, 3, 3.8, 2.6, 2.2, 3.2, 2.8, 2.8, 2.7, 3.3, 3.2, 2.8, 3, 2.8, 3, 2.8, 3.8, 2.8, 2.8, 2.6, 3, 3.4, 3.1, 3, 3.1, 3.1, 3.1, 2.7, 3.2, 3.3, 3, 2.5, 3, 3.4, 3];

    Highcharts.chart('container', {
        title: {
            text: ''
        },
        plotOptions: {
            column: {
                pointPlacement: 'between'
            }
        },
        description:{
            text: 'test'
        },
        xAxis: [{
            title: { text: 'Search sources per article' },
            alignTicks: true,
            tickInterval:1,
            tickmarkPlacement: 'between'
        }, {
            title: { text: '' },
            alignTicks: false,
            opposite: true,
            tickInterval:10
        }],

        yAxis: [{
            title: { text: 'Number of articles' }
        }, {
            title: { text: '' },
            opposite: true,

        }],

        series: [{
            name: 'Histogram',
            type: 'histogram',
            xAxis: 0,
            yAxis: 0,
            baseSeries: 's1',
            zIndex: -1,
            dataLabels: {
                enabled: true,
                step:0.5,
                style: {
                    fontSize: '15px'
                }
            },
            events: {
                click: function (event) {
                    var lower = event.point.x;
                    var higher = event.point.x2;
                    var url_to = <?php echo json_encode(Url::to(['material-info-view/index-search-sources'])); ?>;
                    console.log(url_to);
                    var new_url = url_to.concat('&higher=', higher);
                    var new_url = new_url.concat('&lower=', lower);
                    var win = window.open(new_url, '_blank');
                    win.focus();
                    console.log(lower);
                    console.log(higher);
                }
            },
            binWidth:1,
            labels:{
                step:1
            },
            color: '#170555'
        },
            {
                name: 'Data',
                type: 'scatter',
                xAxis: 1,
                yAxis: 1,
                data: hist_data,
                id: 's1',
                marker: {
                    radius: 1.5
                },
                visible: false
            }]
    });

</script>

<div id="container_2"></div>

<script>

    x_data = <?php echo json_encode($indices);?>;
    y_data = <?php echo json_encode($columns);?>;
    var data = [3.5, 3, 3.2, 3.1, 3.6, 3.9, 3.4, 3.4, 2.9, 3.1, 3.7, 3.4, 3, 3, 4, 4.4, 3.9, 3.5, 3.8, 3.8, 3.4, 3.7, 3.6, 3.3, 3.4, 3, 3.4, 3.5, 3.4, 3.2, 3.1, 3.4, 4.1, 4.2, 3.1, 3.2, 3.5, 3.6, 3, 3.4, 3.5, 2.3, 3.2, 3.5, 3.8, 3, 3.8, 3.2, 3.7, 3.3, 3.2, 3.2, 3.1, 2.3, 2.8, 2.8, 3.3, 2.4, 2.9, 2.7, 2, 3, 2.2, 2.9, 2.9, 3.1, 3, 2.7, 2.2, 2.5, 3.2, 2.8, 2.5, 2.8, 2.9, 3, 2.8, 3, 2.9, 2.6, 2.4, 2.4, 2.7, 2.7, 3, 3.4, 3.1, 2.3, 3, 2.5, 2.6, 3, 2.6, 2.3, 2.7, 3, 2.9, 2.9, 2.5, 2.8, 3.3, 2.7, 3, 2.9, 3, 3, 2.5, 2.9, 2.5, 3.6, 3.2, 2.7, 3, 2.5, 2.8, 3.2, 3, 3.8, 2.6, 2.2, 3.2, 2.8, 2.8, 2.7, 3.3, 3.2, 2.8, 3, 2.8, 3, 2.8, 3.8, 2.8, 2.8, 2.6, 3, 3.4, 3.1, 3, 3.1, 3.1, 3.1, 2.7, 3.2, 3.3, 3, 2.5, 3, 3.4, 3];

    Highcharts.chart('container_2', {
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: x_data,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of reviews'
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0.0,
                pointWidth:29,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Number of search sources used',
            data: y_data,
            events: {
                click: function (event) {
                    var lower = event.point.x;
                    var url_to = <?php echo json_encode(Url::to(['material-info-view/index-search-sources'])); ?>;
                    console.log(url_to);
                    var new_url = url_to.concat('&higher=', lower+1);
                    var new_url = new_url.concat('&lower=', lower);
                    var win = window.open(new_url, '_blank');
                    win.focus();
                    console.log(lower);
                    console.log(higher);
                }
            },
            binWidth:1,
            dataLabels: {
                enabled: true,
                step:0.5,
                style: {
                    fontSize: '15px'
                }
            },
            color: '#170555'


        }]
    });

</script>

<center> </center>