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
use app\models\MaterialHasSubject;
use app\models\Subject;
use app\models\MaterialHasBuiltEnvironmentType;
use app\models\BuiltEnvironmentType;
use app\models\SubjectsVsBets;


use miloschuman\highcharts\Highcharts;






/* @var $this yii\web\View */
/* @var $model app\models\MaterialInfoView */

$this->title = "Subjects Vs. Built Environment Types";
$this->params['breadcrumbs'][] = ['label' => 'Material Info', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div>

    <h3><?= Html::encode($this->title) ?></h3>





<?php

################################## Data Collection #################################


$subject_ids = MaterialHasSubject::find()
    ->select('subject_id')
    ->distinct()
    ->asArray()
    ->all();



#print_r($subject_ids);
#print(count($subject_ids));


for ($i=0; $i < count($subject_ids); $i++) {
    $unique_subjects[$i] = $subject_ids[$i]['subject_id'];
    $subject = Subject::find()
        ->select('description')
        ->where(['id' => $subject_ids[$i]['subject_id']])
        ->asArray()
        ->one();
    $subject_array[$i] = $subject['description'];

}
#print_r($unique_subjects);


$bet_ids = MaterialHasBuiltEnvironmentType::find()
    ->select('built_environment_type_id')
    ->distinct()
    ->asArray()
    ->all();



#print_r($subject_array);
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












$data_array = [];
$count_array = [];

for ($i=0; $i < count($unique_bets); $i++) {
    for ($j=0; $j < count($unique_subjects); $j++) {
        $materials = SubjectsVsBets::find()
            ->select('material_id')
            ->where(['subject_id' => $unique_subjects[$j]])
            ->andWhere(['built_environment_type_id' => $unique_bets[$i]])
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
                'text' => ''
        ],
        'chart' => [
            'type' => 'heatmap',
            'height' => 1500,
            'width' => 1000
        ],
        'xAxis' => [
            'categories' =>   $bet_array,
            'title' => 'Built Environment Types'
        ],
        'yAxis' => [
            'categories' =>  $subject_array,
            'title' => 'Subjects'
        ],
        'colorAxis' =>[
                'minColor' => '#FFFFFF',
                            'maxColor' => '#D10613'


        ],
        'series' => [
                [
                'name' => 'Subjects Vs. Built Environment Types',
                'borderWidth' => 1,
                'data' =>   $data_array,
                'dataLabels' => [
                    'enabled' => true,
                    'color' => '#000000',
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

echo Highcharts::widget($heatmap_options);



?>