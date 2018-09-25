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
<h4 class="auto-style15">Popular Terms</h4>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\TopApplications;
use app\models\TopBuiltEnvironments;
use app\models\TopSubjects;
use app\models\TopSystems;
use yii\data\ActiveDataProvider;

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;



$this->title = 'Popular Terms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-of-first-authors-index">
    <?php
    $applications = TopApplications::find()
        ->asArray()
        ->all();

    $applications_array =[];

    $i = 0;
    foreach ($applications as $application) {

        $applications_array[$i] = [$application['application'], doubleval($application['articles'])];
        $i = $i + 1;


    }

    $bets = TopBuiltEnvironments::find()
        ->asArray()
        ->all();

    $bets_array =[];

    $i = 0;
    foreach ($bets as $bet) {

        $bets_array[$i] = [$bet['built_environment_type'], doubleval($bet['articles'])];
        $i = $i + 1;


    }


    $subjects = TopSubjects::find()
        ->asArray()
        ->all();

    $subjects_array =[];

    $i = 0;
    foreach ($subjects as $subject) {

        $subjects_array[$i] = [$subject['subject'], doubleval($subject['articles'])];
        $i = $i + 1;


    }


    $systems = TopSystems::find()
        ->asArray()
        ->all();

    $systems_array =[];

    $i = 0;
    foreach ($systems as $system) {

        $systems_array[$i] = [$system['systems'], doubleval($system['articles'])];
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

    $this->registerJsFile('https://code.highcharts.com/highcharts-3d.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);

    #$hist_data = [3.5, 3, 3.2, 3.1, 3.6, 3.9, 3.4, 3.4, 2.9, 3.1];

    #print_r($hist_data);
    $applications_graph = Highcharts::widget([

        'options' => [
                'type' => 'pie',
                'options3d' => [
                    'enabled' => true,
                    'alpha'=> '45',
                    'beta' => '0'
                ],
            'chart' => [
                'type' => 'pie',
                'borderWidth' => 1,
                'options3d' => [
                    'enabled' => true,
                    'alpha'=> '45',
                    'beta' => '0'
                ],
            ],
            'title' => ['text' => 'Popular Applications'],
            'plotOptions' => [
                'pie' => [
                    'cursor' => 'pointer',
                    'options3d' => [
                        'enabled' => true,
                        'alpha'=> 45,
                        'beta' => 0
                    ],
                ]

            ],
            'series' => [
                [ // new opening bracket
                    'type' => 'pie',
                    'options3d' => [
                        'enabled' => true,
                        'alpha'=> 45,
                        'beta' => 0
                    ],
                    'name' => 'Elements',
                    'data' => $applications_array
                ] // new closing bracket
            ],
        ],
    ]);





    $bets_graph = Highcharts::widget([

        'options' => [
            'type' => 'pie',
            'options3d' => [
                'enabled' => true,
                'alpha'=> '45',
                'beta' => '0'
            ],
            'chart' => [
                'type' => 'pie',
                'borderWidth' => 1,
                'options3d' => [
                    'enabled' => true,
                    'alpha'=> '45',
                    'beta' => '0'
                ],
            ],
            'title' => ['text' => '10 Most Popular Built Environment Types'],
            'plotOptions' => [
                'pie' => [
                    'cursor' => 'pointer',
                    'options3d' => [
                        'enabled' => true,
                        'alpha'=> 45,
                        'beta' => 0
                    ],
                ]

            ],
            'series' => [
                [ // new opening bracket
                    'type' => 'pie',
                    'options3d' => [
                        'enabled' => true,
                        'alpha'=> 45,
                        'beta' => 0
                    ],
                    'name' => 'Elements',
                    'data' => $bets_array
                ] // new closing bracket
            ],
        ],
    ]);




    $subjects_graph = Highcharts::widget([

        'options' => [
            'type' => 'pie',
            'options3d' => [
                'enabled' => true,
                'alpha'=> '45',
                'beta' => '0'
            ],
            'chart' => [
                'type' => 'pie',
                'borderWidth' => 1,
                'options3d' => [
                    'enabled' => true,
                    'alpha'=> '45',
                    'beta' => '0'
                ],
            ],
            'title' => ['text' => '10 most popular Subjects'],
            'plotOptions' => [
                'pie' => [
                    'cursor' => 'pointer',
                    'options3d' => [
                        'enabled' => true,
                        'alpha'=> 45,
                        'beta' => 0
                    ],
                ]

            ],
            'series' => [
                [ // new opening bracket
                    'type' => 'pie',
                    'options3d' => [
                        'enabled' => true,
                        'alpha'=> 45,
                        'beta' => 0
                    ],
                    'name' => 'Elements',
                    'data' => $subjects_array
                ] // new closing bracket
            ],
        ],
    ]);





    $systems_graph = Highcharts::widget([

        'options' => [
            'type' => 'pie',
            'options3d' => [
                'enabled' => true,
                'alpha'=> '45',
                'beta' => '0'
            ],
            'chart' => [
                'type' => 'pie',
                'borderWidth' => 1,
                'options3d' => [
                    'enabled' => true,
                    'alpha'=> '45',
                    'beta' => '0'
                ],
            ],
            'title' => ['text' => '10 most popular Systems'],
            'plotOptions' => [
                'pie' => [
                    'cursor' => 'pointer',
                    'options3d' => [
                        'enabled' => true,
                        'alpha'=> 45,
                        'beta' => 0
                    ],
                ]

            ],
            'series' => [
                [ // new opening bracket
                    'type' => 'pie',
                    'options3d' => [
                        'enabled' => true,
                        'alpha'=> 45,
                        'beta' => 0
                    ],
                    'name' => 'Elements',
                    'data' => $systems_array
                ] // new closing bracket
            ],
        ],
    ]);

?>

 <table style="width:100%">
  <tr>
    <th><?php echo $applications_graph ?></th>
      <th><?php echo $bets_graph ?></th>
  </tr>
  <tr>
      <th><?php echo $subjects_graph ?></th>
      <th><?php echo $systems_graph ?></th>
  </tr>
</table>







</div>


