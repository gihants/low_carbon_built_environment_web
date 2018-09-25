<?php

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
use app\models\MaterialHasApplication;
use app\models\Application;
use app\models\MaterialHasBuiltEnvironmentType;
use app\models\BuiltEnvironmentType;
use app\models\ApplicationsVsBets;


use miloschuman\highcharts\Highcharts;






/* @var $this yii\web\View */
/* @var $model app\models\MaterialInfoView */

$this->title = "Applications Vs. Built Environment Types";
$this->params['breadcrumbs'][] = ['label' => 'Material Info', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div>

    <h5><?= Html::encode($this->title) ?></h5>





<?php

################################## Data Collection #################################


$application_ids = MaterialHasApplication::find()
    ->select('application_id')
    ->distinct()
    ->asArray()
    ->all();



#print_r($subject_ids);
#print(count($subject_ids));


for ($i=0; $i < count($application_ids); $i++) {
    $unique_applications[$i] = $application_ids[$i]['application_id'];
    $application = Application::find()
        ->select('description')
        ->where(['id' => $application_ids[$i]['application_id']])
        ->asArray()
        ->one();
    $application_array[$i] = $application['description'];

}
#print_r($subject_array);


$bet_ids = MaterialHasBuiltEnvironmentType::find()
    ->select('built_environment_type_id')
    ->distinct()
    ->asArray()
    ->all();



#print_r($subject_ids);
#print(count($bet_ids));


for ($i=0; $i < count($bet_ids); $i++) {
    $unique_bets[$i] = $bet_ids[$i]['built_environment_type_id'];
    $bet = BuiltEnvironmentType::find()
        ->select('description')
        ->where(['id' => $bet_ids[$i]['built_environment_type_id']])
        ->asArray()
        ->one();
    $bet_array[$i] = $bet['description'];

}
#print_r($bet_array);


$data_array = [];

for ($i=0; $i < count($unique_applications); $i++) {
    for ($j=0; $j < count($unique_bets); $j++) {
        $materials = ApplicationsVsBets::find()
            ->select('material_id')
            ->where(['application_id' => $unique_applications[$i]])
            ->andWhere(['built_environment_type_id' => $unique_bets[$j]])
            ->all();
        array_push($data_array, [$j, $i, count($materials)]);
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
            'text' => ''
        ],
        'chart' => [
            'type' => 'heatmap',
            'height' => 350,
            'width' => 800
        ],
        'xAxis' => [
            'categories' =>$bet_array,
            'title' => 'Built Environment Type'
        ],
        'yAxis' => [
            'categories' => $application_array,
            'title' => 'Built Environment Type'
        ],
        'colorAxis' =>[
        ],
        'series' => [
            [

                'name' => 'Applications Vs. Built Environment Types',
                'borderWidth' => 1,
                'data' =>   $data_array,
                'dataLabels' => [
                    'enabled' => true,
                    'color' => '#000000',
                ],

            ]
        ],
        'tooltip' => [

            'pointFormat' => '{point.}'
        ],
        'colsize' => 5
    ]

];


echo Highcharts::widget($heatmap_options);








?>