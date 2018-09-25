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


use miloschuman\highcharts\Highcharts;






/* @var $this yii\web\View */
/* @var $model app\models\MaterialInfoView */

$this->title = "Subject areas and Applications reviewed in the articles";
$this->params['breadcrumbs'][] = ['label' => 'Subject areas vs Applications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div>

    <h4><?= Html::encode($this->title) ?></h4>





    <?php
    $sas = MaterialsPerSubjectArea::find()
        ->asArray()
        ->all();

    $sa_array =[];
    $title_array = [];

    $i = 0;
    foreach ($sas as $sa) {

        $sa_array[$i] = [$sa['subject_area'], doubleval($sa['materials'])];
        $title_array[$i] = $sa['subject_area'];
        $i = $i + 1;

    }

    $subject_area_titles_array = $title_array;
    $subject_area_articles_array = $sa_array;

    $this->registerJsFile('https://code.highcharts.com/highcharts.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);


    $this->registerJsFile('https://code.highcharts.com/modules/exporting.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);


    #$hist_data = [3.5, 3, 3.2, 3.1, 3.6, 3.9, 3.4, 3.4, 2.9, 3.1];

    #print_r($hist_data);
    $pie_1 =  Highcharts::widget([
        'options' => [
            'title' => ['text' => 'Distribution of Subject areas reviewed in articles',
                'align' => 'left'],
            'plotOptions' => [
                'pie' => [
                    'cursor' => 'pointer',
                ],
            ],
            'xAxis' => [
                'categories' =>   $title_array,
                'title' => ['text'=>'Subject area']
            ],
            'yAxis' => [
                'title' => ['text' => 'Number of articles']
            ],

            'series' => [
                [ // new opening bracket
                    'type' => 'bar',
                    'name' => 'Articles',
                    'data' => $sa_array,
                    'color' =>'#3d0101',
                    'dataLabels' => [
                        'enabled' => 'true'
                    ]
                ] // new closing bracket
            ],
        ],
    ]);



    ##################################################################################

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
            'title' => ['text' => 'Distribution of Applications reviewed in articles',
                'align' => 'left'],
            'plotOptions' => [
                'pie' => [
                    'cursor' => 'pointer',
                ],
            ],
            'xAxis' => [
                'categories' =>   $title_array,
                'title' => ['text'=> 'Applications']
            ],
            'yAxis' => [
                'title' => ['text'=> 'Number of Articles']
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


    ################################## Data Collection #################################


    $subject_area_ids = MaterialHasSubjectArea::find()
        ->select('subject_area_id')
        ->distinct()
        ->asArray()
        ->all();



    #print_r($subject_ids);
    #print(count($subject_ids));


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
        for ($j=0; $j < count($unique_subject_areas); $j++) {
            $materials = \app\models\SubjectAreaVsApplication::find()
                ->select('material_id')
                ->where(['subject_area_id' => $unique_subject_areas[$j]])
                ->andWhere(['application_id' => $unique_applications[$i]])
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
                'text' => 'Heatmap of Subject area(s) vs Application(s) reviewed in articles',
                'align' => 'left'
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
                'categories' =>  $subject_area_array,
                'title' => ['text'=>'Subject Area']
            ],
            'colorAxis' =>[
                'minColor' => '#FFFFFF',
                'maxColor' => '#0a4400'


            ],
            'series' => [
                [
                    'name' => 'Subject areas Vs. applications',
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
    <p>The following diagrams illustrate the distribution of Subject areas and Applications reviewed in the articles</p>
    <p><em>Note:&nbsp;each article may belong to multiple Subject areas and / or Applications therefore may not be exclusive to single bar/cell in diagrams.</em></p>
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
            categories_array = <?php echo json_encode($subject_area_titles_array);?>;
            data_array = <?php echo json_encode($subject_area_articles_array);?>;

            Highcharts.chart('sas', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Distribution of Subject areas reviewed in the articles'
                },
                xAxis: {
                    categories: categories_array,
                    title: {
                        text: 'Subject area'
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
                    color: '#3d0101',
                    events: {
                        click: function (event) {
                            if (event.point.value == 0)  {
                                alert("No review articles found!");
                            }
                            else {
                                var subject_area = this.xAxis.categories[event.point.index];
                                //console.log(this.xAxis.categories[event.point.index]);
                                var url_to = <?php echo json_encode(Url::to(['material-info-view/index-subject-area'])); ?>;
                                //console.log(url_to);
                                var new_url = url_to.concat('&subject_area=', subject_area);
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
            categories_array = <?php echo json_encode($application_titles_array);?>;
            data_array = <?php echo json_encode($application_articles_array);?>;

            Highcharts.chart('bets', {
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



        <script src="https://code.highcharts.com/modules/heatmap.js"></script>





        <script>
            subject_area_array = <?php echo json_encode($subject_area_array);?>;
            application_array = <?php echo json_encode($application_array);?>;
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
                    text: 'Heatmap of Subject areas vs Applications reviewed in the articles'
                },

                xAxis: {
                    categories: application_array,
                    title: {
                        text: 'Subject area'
                    }
                },

                yAxis: {
                    categories: subject_area_array,
                    title: {
                        text: 'Application'
                    }
                },

                colorAxis: {
                    min: 0,
                    minColor: '#FFFFFF',
                    maxColor: '#0a4400'
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
                        return 'Subject area: <b>' + this.series.xAxis.categories[this.point.x] + '</b> and <br>' +
                            '</b>Application: <b>' + this.series.yAxis.categories[this.point.y] + '</br></b> => <b>' + this.point.value + '</b> review articles';
                    }
                },

                series: [{
                    name: 'Subject areas vs Applications',
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
                                var subject_area = this.xAxis.categories[event.point.x];
                                var application = this.yAxis.categories[event.point.y];
                                var url_to = <?php echo json_encode(Url::to(['material-info-view/index-subject-area-application'])); ?>;
                                console.log(url_to);
                                var new_url = url_to.concat('&subject_area=', subject_area);
                                var new_url = new_url.concat('&application=', application);
                                var win = window.open(new_url, '_blank');
                                win.focus();
                            }

                        }
                    },
                }]

            });

        </script>