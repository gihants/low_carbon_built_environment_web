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
<h4 class="auto-style15">Geographical distribution of affiliated organisations of the review articles</h4>
<p>Map of the geographical distribution of the institutions of the authors of the included review articles claiming to be systematic reviews or meta-analyses. The country of the organisation the authors were affiliated with was considered as the country of the authors. The intensity of the shading is proportional to the number of institutional affiliations from a given country.</p>
<p><em>You can click on each country to obtain the filtered list of corresponding review articles.</em></p>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CountriesOfOrganisations;
use yii\data\ActiveDataProvider;

use miloschuman\highcharts\Highmaps;
use yii\web\JsExpression;



$this->title = 'Geographical distribution of affiliated organisations of the review articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-of-first-authors-index">
    <?php
    $countries = CountriesOfOrganisations::find()
        ->asArray()
        ->all();



    #print_r($subject_ids);
    #print(count($subject_ids));



    ?>

    <?php
    $i = 0;
    foreach ($countries as $country) {
        $data[$i] = [$country['country_code'], $country['number_of_organisations']];
        $i = $i + 1;
    }
    $this->registerJsFile('https://code.highcharts.com/mapdata/custom/world.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);

    echo Highmaps::widget([
        'options' => [
            'title' => [
                'text' => '',
            ],

            'chart'=> [
                'borderWidth'=> 0,
                'height' => 600
            ],

            'mapNavigation' => [
                'enabled' => true,
                'buttonOptions' => [
                    'verticalAlign' => 'top',
                ]
            ],
            'legend' => [
                'layout' => 'vertical',
                'align' => 'left',
                'verticalAlign' => 'bottom'
            ],
            'colorAxis'=> [
                'min' => 1,
                'max' => 20,
                'type' => 'logarithmic'
            ],

            'series' => [
                [
                    'data' => $data,
                    'mapData' => new JsExpression('Highcharts.maps["custom/world"]'),
                    'joinBy' => 'hc-key',
                    'animation' => true,
                    'name' => 'Organisations',
                    'states' => [
                        'hover' => [
                            'color' => '#a4edba',
                        ]
                    ],
                    'shadow' => false,
                    'dataLabels' => [
                        'enabled' => 'true',
                        'style' => [
                                'fontSize' => '15px'
                        ]
                    ]

                ]
            ]
        ]
    ]);


    $this->registerJsFile('https://code.highcharts.com/highcharts.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);

    $this->registerJsFile('https://code.highcharts.com/modules/histogram-bellcurve.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);









    ?>





