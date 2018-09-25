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
<h4 class="auto-style15">Geographical distribution of first authors of review articles</h4>
<p>Map of the geographical distribution of the locations of the first authors of the included review articles claiming to be systematic reviews or meta-analyses. The country of the organisation to which the first author was affiliated with, was considered as the country of the first author. The intensity of the shading is proportional to the number of first authors affiliated to a given country.</p>
<p><em>You can click on each country to obtain the filtered list of corresponding review articles.</em></p>

<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CountriesOfFirstAuthors;
use yii\data\ActiveDataProvider;

use miloschuman\highcharts\Highmaps;
use yii\web\JsExpression;



$this->title = 'Geographical distribution of first authors of review articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-of-first-authors-index">
<?php
    $countries = CountriesOfFirstAuthors::find()
    ->asArray()
    ->all();



    #print_r($subject_ids);
    #print(count($subject_ids));



    ?>

    <?php
    $i = 0;
    foreach ($countries as $country) {
        $data[$i] = [$country['country_code'], doubleval($country['number_of_articles'])];
        $i = $i + 1;
    }
    $this->registerJsFile('https://code.highcharts.com/mapdata/custom/world.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);

   /* echo Highmaps::widget([
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
                    'verticalAlign' => 'vertical',
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
                'type' => 'logarithmic',
                'maxColor' => '#1E8312'
            ],
            'series' => [
                [
                    'data' => $data,
                    'mapData' => new JsExpression('Highcharts.maps["custom/world"]'),
                    'joinBy' => 'hc-key',
                    'animation' => true,
                    'name' => 'First Authors',
                    'states' => [
                        'hover' => [
                            'color' => '#a4edba',
                        ]
                    ],
                    'shadow' => false,
                    'dataLabels' => [
                        'enabled' => 'true'
                    ]

                ]
            ]
        ]
    ]);
*/

    $this->registerJsFile('https://code.highcharts.com/highcharts.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);

    $this->registerJsFile('https://code.highcharts.com/modules/histogram-bellcurve.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);



    ?>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/maps/modules/data.js"></script>
    <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>
    <script src="https://code.highcharts.com/mapdata/custom/world.js"></script>

    <div id="container" style="height: 600px; min-width: 310px; max-width: 1200px; margin: 0 auto"></div>


    <script>


        $.getJSON('https://cdn.rawgit.com/highcharts/highcharts/057b672172ccc6c08fe7dbb27fc17ebca3f5b770/samples/data/world-population.json', function (data) {
            data_array = <?php echo json_encode($data);?>;

            console.log(data);
            console.log(data_array);
            Highcharts.mapChart('container', {
                chart: {
                    borderWidth: 0,
                    map: 'custom/world'
                },

                title: {
                    text: ''
                },

                subtitle: {
                    text: ''
                },

                legend: {
                    enabled: true,
                    layout: 'vertical',
                    align: 'left',
                    verticalAlign: 'bottom'
                },

                mapNavigation: {
                    enabled: true,
                    buttonOptions: {
                        verticalAlign: 'bottom'
                    }
                },
                colorAxis: {
                    min: 1,
                    max:20,
                    type: 'logarithmic',
                    maxColor: '#1E8312'
                },

                series: [{
                    name: 'Countries',
                    color: '#E0E0E0',
                    enableMouseTracking: false
                }, {
                    name: 'review articles',
                    joinBy: 'hc-key',
                    data: data_array,
                    minSize: 5,
                    maxSize: '20%',
                    tooltip: {
                        pointFormat: '{point.properties.name}: {point.value}'
                    },
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
                                var country = event.point.properties['hc-key'];
                                console.log(event.point);
                                var url_to = <?php echo json_encode(Url::to(['material-info-view/index-first-author-country'])); ?>;
                                //console.log(url_to);
                                var new_url = url_to.concat('&country=', country);
                                var win = window.open(new_url, '_blank');
                                win.focus();
                            }

                        }
                    },
                }]
            });
        });

    </script>





