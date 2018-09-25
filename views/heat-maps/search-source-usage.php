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

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\SearchSourceUsage;
use yii\data\ActiveDataProvider;

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;



$this->title = 'Most popular search databases used in reviews';
$this->params['breadcrumbs'][] = $this->title;
?>
<h4 class="auto-style15">Most popular search databases used in reviews</h4>
<p>Ten most popular search databases used in the included review articles claiming to be systematic reviews or meta-analyses.</p>
<p><em>You can click on each cell to obtain the filtered list of corresponding review articles.</em></p>
<div class="countries-of-first-authors-index">
    <?php
    $ss = SearchSourceUsage::find()
        ->asArray()
        ->all();

    $data_a =[];

    $i = 0;
    foreach ($ss as $s) {

        $ss_array[$i] = [$s['source_name'], doubleval($s['percentage_usage'])];
        $i = $i + 1;


    }



    #print_r($article_array);




    ?>

    <?php



    $this->registerJsFile('https://code.highcharts.com/highcharts.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);


    $this->registerJsFile('https://code.highcharts.com/modules/exporting.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);


    #$hist_data = [3.5, 3, 3.2, 3.1, 3.6, 3.9, 3.4, 3.4, 2.9, 3.1];

    #print_r($hist_data);
    echo Highcharts::widget([
        'options' => [
            'title' => ['text' => ''],
            'plotOptions' => [
                'pie' => [
                    'cursor' => 'pointer',
                ],
            ],
            'series' => [
                [ // new opening bracket
                    'type' => 'pie',
                    'name' => 'Articles',
                    'data' => $ss_array,
                ] // new closing bracket
            ],
        ],
    ]);






    ?>




</div>


