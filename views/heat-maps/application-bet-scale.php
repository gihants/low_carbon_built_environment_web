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
use app\models\MaterialsPerApplication;
use app\models\MaterialsPerBetScale;
use app\models\BetScaleVsApplication;

use miloschuman\highcharts\Highcharts;






/* @var $this yii\web\View */
/* @var $model app\models\MaterialInfoView */

$this->title = "Applications and Built environment scales";
$this->params['breadcrumbs'][] = ['label' => 'Applications vs Built environment scales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

    <h4><?= Html::encode($this->title) ?></h4>





    <?php
    $sas = MaterialsPerApplication::find()
        ->asArray()
        ->all();

    $sa_array =[];
    $title_array =[];

    $i = 0;
    foreach ($sas as $sa) {

        $sa_array[$i] = [$sa['application'], doubleval($sa['materials'])];
        $title_array[$i] = $sa['application'];
        $i = $i + 1;

    }
    $application_titles_array = $title_array;
    $application_articles_array = $sa_array;

    $this->registerJsFile('https://code.highcharts.com/highcharts.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);


    $this->registerJsFile('https://code.highcharts.com/modules/exporting.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);


    #$hist_data = [3.5, 3, 3.2, 3.1, 3.6, 3.9, 3.4, 3.4, 2.9, 3.1];

    #print_r($hist_data);
    $pie_2 = Highcharts::widget([
        'options' => [
            'title' => ['text' => 'Distribution of Applications reviewed in articles'],
            'plotOptions' => [
                'pie' => [
                    'cursor' => 'pointer',
                ],
            ],
            'xAxis' => [
                'categories' =>   $title_array,
                'title' => ['text'=>'Application']
            ],
            'yAxis' => [
                'title' => ['text'=>'Number of articles']
            ],
            'series' => [
                [ // new opening bracket
                    'type' => 'bar',
                    'name' => 'Articles',
                    'data' => $sa_array,
                    'color' => '#0d4fba',
                    'dataLabels' => [
                        'enabled' => 'true'
                    ]
                ] // new closing bracket

            ],
        ],
    ]);

    ###################################################################################################

    $sas = MaterialsPerBetScale::find()
        ->asArray()
        ->all();

    $sa_array =[];
    $title_array =[];

    $i = 0;
    foreach ($sas as $sa) {

        $sa_array[$i] = [$sa['built_environment_scale'], doubleval($sa['materials'])];
        $title_array[$i] = $sa['built_environment_scale'];
        $i = $i + 1;

    }

    $bet_titles_array = $title_array;
    $bet_articles_array = $sa_array;

    $this->registerJsFile('https://code.highcharts.com/highcharts.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);


    $this->registerJsFile('https://code.highcharts.com/modules/exporting.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);


    #$hist_data = [3.5, 3, 3.2, 3.1, 3.6, 3.9, 3.4, 3.4, 2.9, 3.1];

    #print_r($hist_data);
    $pie_1 = Highcharts::widget([
        'options' => [
            'title' => ['text' => 'Distribution of Built environment scales reviewed in articles'],
            'plotOptions' => [
                'pie' => [
                    'cursor' => 'pointer',
                ],
            ],
            'xAxis' => [
                'categories' =>   $title_array,
                'title'  => ['text'=>'Built environment scale']
            ],
            'yAxis' => [
                'title'  => ['text'=>'Number of articles']
            ],
            'series' => [
                [ // new opening bracket
                    'type' => 'bar',
                    'name' => 'Articles',
                    'data' => $sa_array,
                    'color' => '#052603',
                    'dataLabels' => [
                        'enabled' => 'true'
                    ]
                ] // new closing bracket

            ],
        ],
    ]);


    ##################################################################################



    ################################## Data Collection #################################


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



    $application_ids = \app\models\MaterialHasApplication::find()
        ->select('application_id')
        ->distinct()
        ->asArray()
        ->all();



    #print_r($subject_array);
    #print(count($bet_ids));


    for ($i=0; $i < count($application_ids); $i++) {
        $unique_applications[$i] = $application_ids[$i]['application_id'];
        $application = \app\models\Application::find()
            ->select('description')
            ->where(['id' => $application_ids[$i]['application_id']])
            ->asArray()
            ->one();
        $application_array[$i] = $application['description'];

    }












    $data_array = [];
    $count_array = [];

    for ($i=0; $i < count($unique_applications); $i++) {
        for ($j=0; $j < count($unique_bet_scales); $j++) {
            $materials = BetScaleVsApplication::find()
                ->select('material_id')
                ->where(['built_environment_scale_id' => $unique_bet_scales[$j]])
                ->andWhere(['application_id' => $unique_applications[$i]])
                ->all();
            array_push($data_array, [$j, $i, count($materials)]);
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
                'text' => 'Heatmap of Application(s) vs Built evironment scale reviewed in articles'
            ],
            'chart' => [
                'type' => 'heatmap',
                'height' => 300,
                'width' => 1180
            ],
            'yAxis' => [
                'categories' =>   $application_array,
                'title' => ['text'=>'Application']
            ],
            'xAxis' => [
                'categories' =>  $bet_scale_array,
                'title' => ['text'=>'Built Environment Scale']
            ],
            'colorAxis' =>[
                'minColor' => '#FFFFFF',
                'maxColor' => '#560000'


            ],
            'series' => [
                [
                    'name' => 'Applications Vs. Built Environment Scales',
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



    <p>The following diagrams illustrate the distribution of Applications and Built environment scales reviewed in the articles</p>
    <p><em>Note:&nbsp;each article may belong to multiple Applications, therefore may not be exclusive to single bar/cell in diagrams.</em></p>
    <p><em>click on each bar / cell to obtain the filtered list of corresponding articles.</em></p>
    <div>
        <div style="text-align: center;">
        </div>
        <table style="text-align: left; width: 1200px; height: 707px;" border="1" cellpadding="2" cellspacing="2">
            <tbody>
            <tr>
                <td style="vertical-align: top; text-align: center;"><br>
                    <div id="sas" style="margin: 0pt auto; height: 300px; min-width: 310px; max-width: 1500px;"></div>

                </td>
                <td style="vertical-align: top; width: 600px;"><br>
                    <div id="bets" style="margin: 0pt auto; height: 300px; min-width: 310px; max-width: 1500px;"></div>

                </td>
            </tr>
            <tr>
                <td colspan="2" rowspan="1" style="vertical-align: top;"><br>
                    <div id="heatmap" style="margin: 0pt auto; height: 400px; min-width: 310px; max-width: 1500px;"></div>
                </td>
            </tr>
            </tbody>
        </table>
        <br>


        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>



        <script>
            categories_array = <?php echo json_encode($application_titles_array);?>;
            data_array = <?php echo json_encode($application_articles_array);?>;

            Highcharts.chart('sas', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Distribution of Applications reviewed in the articles'
                },
                xAxis: {
                    categories: categories_array,
                    title: {
                        text: 'Application'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Number of reviews'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ''
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true,
                            style: {
                                fontSize: '15px'
                            }
                        }
                    }
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Articles',
                    data: data_array,
                    color: '#0d4fba',
                    events: {
                        click: function (event) {
                            if (event.point.value == 0)  {
                                alert("No review articles found!");
                            }
                            else {
                                var application = this.xAxis.categories[event.point.index];
                                //console.log(this.xAxis.categories[event.point.index]);
                                var url_to = <?php echo json_encode(Url::to(['material-info-view/index-application'])); ?>;
                                //console.log(url_to);
                                var new_url = url_to.concat('&application=', application);
                                var win = window.open(new_url, '_blank');
                                win.focus();
                            }

                        }
                    },
                }],
                legend: {
                    enabled: false
                }
            });
        </script>



        <script>
            categories_array = <?php echo json_encode($bet_titles_array);?>;
            data_array = <?php echo json_encode($bet_articles_array);?>;

            Highcharts.chart('bets', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Distribution of Built environment scales reviewed in the articles'
                },
                xAxis: {
                    categories: categories_array,
                    title: {
                        text: 'Built environment scale'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Number of reviews'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ''
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true,
                            style: {
                                fontSize: '15px'
                            }
                        }
                    }
                },
                credits: {
                    enabled: false
                },
                series: [{
                    name: 'Articles',
                    data: data_array,
                    color: '#052603',
                    events: {
                        click: function (event) {
                            if (event.point.value == 0)  {
                                alert("No review articles found!");
                            }
                            else {
                                var built_environment_scale = this.xAxis.categories[event.point.index];
                                //console.log(this.xAxis.categories[event.point.index]);
                                var url_to = <?php echo json_encode(Url::to(['material-info-view/index-built-environment-scale'])); ?>;
                                //console.log(url_to);
                                var new_url = url_to.concat('&built_environment_scale=', built_environment_scale);
                                var win = window.open(new_url, '_blank');
                                win.focus();
                            }

                        }
                    },
                }],
                legend: {
                    enabled: false
                }
            });
        </script>



        <script src="https://code.highcharts.com/modules/heatmap.js"></script>





        <script>
            applications_array = <?php echo json_encode($application_array);?>;
            bet_scale_array = <?php echo json_encode($bet_scale_array);?>;
            data_array = <?php echo json_encode($data_array);?>;

            Highcharts.chart('heatmap', {

                chart: {
                    type: 'heatmap',
                    marginTop: 40,
                    marginBottom: 80,
                    plotBorderWidth: 1,
                    height: 400
                },


                title: {
                    text: 'Heatmap of Applications vs Built environment scales reviewed in the articles'
                },

                xAxis: {
                    categories: bet_scale_array,
                    title: {
                        text: 'Application'
                    }
                },

                yAxis: {
                    categories: applications_array,
                    title: {
                        text: 'Built environment scale'
                    }
                },

                colorAxis: {
                    min: 0,
                    minColor: '#FFFFFF',
                    maxColor: '#560000'
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
                        return 'Apllication: <b>' + this.series.xAxis.categories[this.point.x] + '</b> and <br>' +
                            '</b>Built environment scale: <b>' + this.series.yAxis.categories[this.point.y] + '</br></b> => <b>' + this.point.value + '</b> review articles';
                    }
                },

                series: [{
                    name: 'Applications vs Built Environment Scales',
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
                                var application = this.xAxis.categories[event.point.x];
                                var built_environment_scale = this.yAxis.categories[event.point.y];
                                var url_to = <?php echo json_encode(Url::to(['material-info-view/index-application-built-environment-scale'])); ?>;
                                console.log(url_to);
                                var new_url = url_to.concat('&application=', application);
                                var new_url = new_url.concat('&built_environment_scale=', built_environment_scale);
                                var win = window.open(new_url, '_blank');
                                win.focus();
                            }

                        }
                    },
                }]

            });

        </script>