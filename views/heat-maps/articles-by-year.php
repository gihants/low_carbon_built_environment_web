<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<h4 class="auto-style15">Review articles published per year</h4>

<html><head>
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
    </style><?php use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ArticlesByYear;
use yii\data\ActiveDataProvider;

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;



$this->title = 'Review articles published per year';
$this->params['breadcrumbs'][] = $this->title;
?></head><body><h4 class="auto-style15"></h4>



<h4></h4>


<p>Number of systematic reviews and meta-analytic reviews published per year, from 2001 to the start of 2018.</p>

    <p style="font-style: italic;">You can click on each bar to obtain the filtered list of corresponding review articles.</p>


<div class="countries-of-first-authors-index">
    <?php $years_view = ArticlesByYear::find()
        ->asArray()
        ->all();

    $data_a =[];

    $i = 0;
    foreach ($years_view as $year_item) {
        if (doubleval($year_item['year'] > 0)) {
            $years[$i] = doubleval($year_item['year']);
            $i = $i + 1;
        }

    }

    $min_year = $years[0];
    $max_year = $years[sizeof($years)-1];
    $j = 0;
    for ($i = $min_year; $i<=$max_year; $i++) {
        $year_array[$j] = $i;


        $articles = ArticlesByYear::find()
            ->select('articles')
            ->where(['year' => $i])
            ->asArray()
            ->all();

        if ($articles == null) {
            $article_array[$j] = 0;
        }
        else {
            $article_array[$j] = ($articles[0]['articles']);
        }
        array_push($data_a, [$year_array[$j], $article_array[$j]]);


        $article_array[$j] = doubleval($article_array[$j]);
        #$article_array[$j] = $articles;
        $j++;
    }

    #print_r($article_array);




    ?>

    <?php function add($a,$b){
        $c=$a+$b;
        return $c;
    }


   # $this->registerJsFile('https://code.highcharts.com/highcharts.js', [
   #     'depends' => 'miloschuman\highcharts\HighchartsAsset'
  #  ]);


    $this->registerJsFile('https://code.highcharts.com/modules/exporting.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);


  #  $hist_data = [3.5, 3, 3.2, 3.1, 3.6, 3.9, 3.4, 3.4, 2.9, 3.1];
    #$article_array = $hist_data;

    $url_temp = 'https://www.researchweaving.com/lcl-meta/web/index.php?MaterialInfoViewSearch%5Bid%5D=&MaterialInfoViewSearch%5Bmaterial_key%5D=&MaterialInfoViewSearch%5Btitle%5D=&MaterialInfoViewSearch%5Byear%5D=2017&MaterialInfoViewSearch%5BAuthors%5D=&MaterialInfoViewSearch%5Breview_type%5D=&MaterialInfoViewSearch%5Bactual_review_type%5D=&MaterialInfoViewSearch%5Bquality_index%5D=&MaterialInfoViewSearch%5Brisk_level%5D=&r=material-info-view%2Findex';


    ?>







</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container" style="margin: 0pt auto; min-width: 310px; height: 400px;"></div>

<script>

    year_array = <?php echo json_encode($year_array);?>;
    article_array = <?php echo json_encode($article_array);?>;
    url_temp = <?php echo json_encode($url_temp);?>;

    Highcharts.chart('container', {
        chart: {
            type: 'column',
            dataLabels: {
                enable: true
            }

        },
        title: {
            text: ''
        },
        xAxis: {
            categories: year_array,
            crosshair: true,
            title: {
                text: 'Year'
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of reviews'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },
            series: {
                cursor: 'pointer',
                events: {
                    click: function (event) {
                        var year = event.point.category;
                        var url_to = <?php echo json_encode(Url::to(['material-info-view/index-year'])); ?>;
                        console.log(url_to);
                        var new_url = url_to.concat('&year=', year);
                       var win = window.open(new_url, '_blank');
                        win.focus();
                    }
                }
            }
        },
        series: [{
            name: ' ',
            data: article_array,
            pointWidth: 35,
            dataLabels: {
                enable: true,
                style: {
                    fontSize: '15px'
                }
            },
            dataLabels: {
                enabled: true,
                style: {
                    fontSize: '15px'
                }
            },
            color:'#1b5838'

        }]
    });
</script>


<center> </center></body></html>