<h4 class="auto-style15">Wordcloud of journals of the review articles</h4>
<p>The word-cloud represents the journals where the included systematic reviews and meta-analytic reviews were published in. The sizes of the journal titles are proportional to the number of review articles in our database from a given journal.</p>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\AdditionalMaterialInformation;
use yii\data\ActiveDataProvider;

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;



$this->title = 'Wordcloud of journals of the review articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-of-first-authors-index">
    <?php
    $journals = AdditionalMaterialInformation::find()
        ->where(['not', ['journal_name' => null]])
        ->asArray()
        ->all();


    $i = 0;
    $words = "";
    foreach ($journals as $journal) {
        if ($words == '') {
            $words = $journal['journal_name'];
        }
        else {
            $words = $words. ','. $journal['journal_name'];
        }

        $i = $i + 1;


    }

    #$words_2 = 'Transportation Research Part D: Transport and Environment,Landscape and Urban Planning,Environment International,Energy and Buildings,Environmental Science and Policy,Renewable and Sustainable Energy Reviews,Local Environment,Green Energy and Technology,Sustainability,Renewable and Sustainable Energy Reviews,Sustainable Development,Journal of Cleaner Production,Contemporary Hospitality Management,Landscape and Urban Planning,European Journal of Public Health,Social Psychiatry and Psychiatric Epidemiology,Erdkunde,Renewable and Sustainable Energy Reviews,PLoS ONE,Waste Management,Social Science and Medicine,Transportation Journal,Journal of Cleaner Production,European Journal of Sustainable Development,Urban Forestry and Urban Greening,Urban Ecosystems,BMC Public Health,Journal of Health Services Research & Policy,Frontiers of Engineering Management,Noise and Health,Trauma Violence Abuse,Renewable and Sustainable Energy Reviews,Renewable and Sustainable Energy Reviews,Energy Economics,Journal of Managerial Psychology,Social Science and Medicine,Landscape and Urban Planning,Energy Efficiency,Renewable and Sustainable Energy Reviews,Obesity Reviews,Renewable and Sustainable Energy Reviews,BMC Public Health,Journal of Cleaner Production,Atmospheric Environment,Global Environmental Change,Building and Environment,Transport Policy,The Cochrane database of systematic reviews,Science of the Total Environment,Urban Ecosystem,Sustainability,International Journal of Tourism Research,International Journal of Environmental Research and Public Health,Research in Transportation Economics,Pan American journal of public health,International Journal of Environmental Research and Public Health,BMC Public Health,Environmental Research,Journal of clearner production,International Journal of Behavioral Nutrition and Physical Activity,CHEMICAL ENGINEERING TRANSACTIONS,Procedia Engineering,Nature Climate Change,International Journal of Behavioral Nutrition and Physical Activity,Annual Review of Environment and Resources';
    #var_dump($words);
    #echo "<br>";
    #echo "<br>";
    #$words_2 = substr($words, 1);
    #var_dump($words_2);
    #print(count($subject_ids));

    #print_r($words);


    ?>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/wordcloud.js"></script>
    <div id="container"></div>
    <script>
        var text = "<?php echo $words?>";

        var lines = text.split(/[,\.]+/g),
            data = Highcharts.reduce(lines, function (arr, word) {
                var obj = Highcharts.find(arr, function (obj) {
                    return obj.name === word;
                });
                if (obj) {
                    obj.weight += 1;
                } else {
                    obj = {
                        name: word,
                        weight: 4
                    };
                    arr.push(obj);
                }
                return arr;
            }, []);
        console.log(data);
        Highcharts.chart('container', {
            chart: {
                borderWidth: 2
            },
            tooltip:{
                formatter: function () {
                    if (this.point.weight > 4) {
                        return (this.point.weight - 3) +  '</b> review articles are published in ' + this.point.name ;
                    }
                    else {
                        return (this.point.weight - 3) +  '</b> review article is published in ' + this.point.name ;
                    }

                }
            },

            series: [{
                type: 'wordcloud',
                data: data,
                name: 'Review articles',
                rotation: {
                    from: 0,
                    to: 0,
                    orientations: 2
                }
            }],
            title: {
                text: ''
            }
        });


    </script>

    <?php



    $this->registerJsFile('https://code.highcharts.com/highcharts.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);

    $this->registerJsFile('https://code.highcharts.com/modules/wordcloud.js', [
        'depends' => 'miloschuman\highcharts\HighchartsAsset'
    ]);


    #$hist_data = [3.5, 3, 3.2, 3.1, 3.6, 3.9, 3.4, 3.4, 2.9, 3.1];

    #print_r($hist_data);




    ?>




</div>


