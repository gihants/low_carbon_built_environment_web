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
<h4 class="auto-style15">Wordcloud of search terms used in review articles</h4>
<p>Main search terms used during the searches for the original sources in used in the included review articles claiming to be systematic reviews or meta-analyses and reporting their search terms. The sizes of the term words are proportional to the number of review articles that used that term in their database search.</p>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Keyword;
use yii\data\ActiveDataProvider;

use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;



$this->title = 'Wordcloud of search terms used in review articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="countries-of-first-authors-index">
    <?php
    $keywords = Keyword::find()
        ->asArray()
        ->all();


    $i = 0;
    $words = "";
    foreach ($keywords as $keyword) {

            $words = $words. " ". $keyword['description'];
            $i = $i + 1;


    }

    #$words_2 = 'test health environment green environmental sustainability carbon footprint CO2 emission LSP logistic service third party logistics 3PL freight transport Design for environment Environmentally conscious product design Eco-design Design for sustainability Life cycle design Green modularization Design for disassembly Design for recycling Material selection eco-design Software tool and eco-design urban city district neighborhood neighbourhood quarter principle category attribute criteria guideline framework sustainable psychological distress psychological stress depression depressive disorder depressed anxiety anxious common mental dissorder housing condition housing quality built environment urban environment physical environment local environment open space public space density infrastructure facility facilities accessibility walkable walkability neighbourhood neighborhood building transport transportation safety crime land use green building green construction sustainable building high performance building sustainable construction building environmental performance ecological building assessment method assessment system ecological construction rating method rating system certification evaluation labeling method labeling system guideline benchmark assessment standard LEED CASBEE DGNB BREEAM Green Star Green Mark ESGB GLB EcoEffect EcoProfile ESCALE HK-BEAM BEAM Plus GB Tool SB Tool millennium development goals MDG Environmental sustainability environmental policy sustainable development biodiversity water sanitation slums distributed electricity generation distributed generation decentralised electricity generation decentralised generation net meter feed in tariff feed-in tariff electricity electrical energy smart city intelligent city digital city urban environment internet of things heterogeneous sensors architecture middleware platform sustainability indicator construction project sustainability criteria infrastructure sustainability metric consumer target audience tourism tourist travel holiday VFR vacation response perception attitude behaviour motivation sustain green environment ecological CSR carbon emission energy waste accommodation backpacker hostel motel hotel lodging caravan park holiday park cabin campground resort mitigation climate change computable general equilibrium GCE low carbon energy efficiency residential factors consumption barriers challenges obstacles green building green construction sustainable construction sustainable building materials energy land water use efficient efficiency driver barrier sustainable unsustainable sustainability eco-friendly green environmental corporate social responsibility (CSR) green vegetation tree open space park wood forest garden climate change heat island temperature ultraviolet (UV) ozone (O3) heatwave volatile organic compounds (VOC) nitrogen oxide (NOx) environment design transportation bicycling city planning exercise neighbourhood neighborhood community environment community level living environment residential environment cognitive function cognitive decline cognitive impairment dementia Alzheimer air heating cooling evaporation humidity humidness moisture temperature microclimate thermal environment urban heat island effect heat wave urban climate city urban town township quarter ward creek fountain lake pond pool river stream water mortality future climate climate change impacts projection heat temperature deaths scenario recycling recyclable recycled reusable solid waste msu reuse of materials sustainability waste solid garbage recycling recycling cooperative recycling waste waste collector waste management electronic waste decision support system DSS decision support business intelligence BI information technology IT data mining data warehouse analytical processing analytical procedure OLAP KDD knowledge discovery pattern recognition machine learning geographic information system GIS geoprocessing geographical information system tool system software application model modeling technique method project physical activity exercise walking cycling biking bicycle travel transport commute play recreation leisure sport urban green space green space open space public space public open space park city park public park urban park municipal park greenway urban greenway trail urban trail intervention randomised control comparative study control group randomised groups quasi experiment natural experiment pretest post-test pre-intervention post-intervention control follow-up intervention process intervention program evaluation treatment green environment sustainable ecological eco-transport transport freight cargo logistic shipping modelling algorithm passenger bus car bicycle optimality strategic experiment experiment transition policy experiment climate energy efficiency renewable energy mobility transport governance experiment climate policy policy low energy energy saving global city occupational sustainability health united states social europe urban world community health natural environment natural space natural infrastructure greenspace greenery green greener greening greenness environment space infrastructure city cities area neigbourhood greenspace open space urban city value benefit social ecology biodiversity environment determinant correlate influence association associations environment environmental physical built neighbourhood facilities walkability aesthetics safety equipment physical activity physically active lifestyle leisure activities exercise walking cycling commute active commuting active transportation active travel intervention comment disabled patients institutionalised sustainability hospital green environment architecture energy water travel life cycle assessment waste recycling reusing reprocessing psychology and behaviour construction quality function deployment ruido plantas espacio verde parque urban green spaces vegetation greenery noise people health park psychology urban population urban residents cities neighbourhood public housing green space trees greening city planning environmental design ecosystem environment urban design crime crime statics violence outcome program evaluation green real estate development green property development eco-housing green building green project green housing sustainable property sustainable building sustainable project sustainable housing renewable energy willingness-to-pay wind energy hydro energy solar energy bioenergy geothermal energy green energy sustainable energy green electricity willingness to pay renewable green energy electricity power biomass wind solar photovoltaic hydro housing home energy efficiency health heat stress indoor temperature intervention overheat trial greenspace energy efficiency energy efficient low energy zero carbon low carbon passive house passivhaus whole house retrofit energy saving building housing new building refurbishment renovation retrofit whole-house retrofit deep retrofit innovation technology technical change niche market socio-technical system change actor network system building process Green building incentives sustainability incentives sustainability incentives sustainable building energy intervention energy consumption energy efficiency intervention context behaviour change smart grid intervention power grid intervention energy reduction DSR renewable technology adoption community energy conservation natural environment renewal volunteer participation practical regeneration restoration maintain care enhance preserve create active action involve steward redeveloping establish founding building cultivation stakeholder trust ranger rural countryside outdoor green urban exercise city community extreme weather conditions heat waves hot spell health overheating mechanisms building clean energy renewable energy green energy adoption wind power LEED BREEAM CASBEE Green Star NZ green building sustainable building walkability green space greenness greenery parkland wilderness vegetation natural open public community municipal natural wild land space city garden botanic park wood environment neighbourhood path walk cycle green trail recreation belt living residential physical activity facilities amenities characteristic urban design built environment excercise physical fitness active sedentary obesity BMI adiposity body fat body mass index waist to hip skinfold waist circumference body composition healthy weight overweight metabolic syndrome insulin resistance diabetics type 2 dyslipidaemia hypertens coronary CHD cardio cardiac stroke heart disease ransientischaemic attack cancer respiratory liver diseas hepatic disease iver cirrhosis gallbladder disease gall bladder disease arthritis joint disease bone health impotence infertile fertility health status health outcome health behaviour disease mortality death life expectancy public transport mass transport user ridership car user private vehicle private transport quality attitude perception satisfaction public transport travel demand management improvement hard travel demand management hard travel demand measure hard travel demand policy public transit mass transit bus rapid transit public transport service improvement public transport service upgrade bus service upgrade bus service improvement house home apartment bunglow dwellings housing rehousing tenant highriser indoor air quality living environment living quarter multistory owner occupied tower block health illness medical condition martality phycological psychiatric mental allergence asthma death depression deprivation life expectancy life satisfaction qol quality of life respiration sick symptom trial random controlled study studies intervention longitudinal prospective worse impact harmful gain changing better walkability neighborhood leisure activities active travel leisure activities Policy Failure Social Sciences Humanities holiday home mood disorder Dysthimic disorder bipolar disorder stress mental health mental disorder emotonial well-being psychological well-being social well-being GHG Emissions Austerity Sustainable transport Transport Economics Urban Mobility Plans Transport policy Sustainable Development Renewable Energy Systematic Review forest obesity overweight body composition weight loss environmental influence environmental determinant environmental factor environmental characteristic obesogenic environment land use mix rural environment recreational facilities BIM guidelines BIM standards BIM sustainability BIM LCA green BIM Built Environment Physical Activity Natural Environment Risk of Bias Review Nanotechnology Smart city City Sensing Green building Rental attributes Meta analysis Symbolic value';
    #var_dump($words);
    #$words_2 = substr($words, 10202);
    #print(count($subject_ids));
    #var_dump($words_2);



    ?>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/wordcloud.js"></script>
    <div id="container"></div>
    <script>
        var text = "<?php echo $words?>";

        var lines = text.split(/[,\. ]+/g),
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
        Highcharts.chart('container', {
            chart: {
              borderWidth: 2
            },
            tooltip:{
                formatter: function () {
                    if (this.point.weight > 4) {
                        return 'Search term \'' + this.point.name +  '\' is used in ' + (this.point.weight - 3) + ' review articles' ;
                    }
                    else {
                        return 'Search term \'' + this.point.name +  '\' is used in ' + (this.point.weight - 3) + ' review article' ;
                    }

                }
            },

            series: [{
                type: 'wordcloud',
                data: data,
                name: 'Occurrences',
                rotation: {
            from: 0,
            to: 0,
            orientations: 2
        },
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


