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
use app\models\Subject;
use app\models\MaterialHasSubject;
use app\models\BuiltEnvironmentType;
use app\models\ApplicationsVsSubjects;


use miloschuman\highcharts\Highcharts;






/* @var $this yii\web\View */
/* @var $model app\models\MaterialInfoView */

$this->title = "Applications Vs. Subjects";
$this->params['breadcrumbs'][] = ['label' => 'Material Info', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div>

    <h3><?= Html::encode($this->title) ?></h3>





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
#print_r($subject_array);

$data_array = [];

for ($i=0; $i < count($unique_applications); $i++) {
    for ($j=0; $j < count($unique_subjects); $j++) {
        $materials = ApplicationsVsSubjects::find()
            ->select('material_id')
            ->where(['application_id' => $unique_applications[$i]])
            ->andWhere(['subject_id' => $unique_subjects[$j]])
            ->all();
        array_push($data_array, [$i, $j, count($materials)]);
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
            'width' => 600
        ],
        'xAxis' => [
            'categories' =>$application_array,
            'title' => 'Built Environment Type'
        ],
        'yAxis' => [
            'categories' => $subject_array,
            'title' => 'Built Environment Type'
        ],
        'colorAxis' =>[

            'minColor' => '#FFFFFF',
            'maxColor' => '#1E8312'
        ],
        'series' => [
                [
                'name' => 'Applications Vs. Subjects',
                'borderWidth' => 1,
                'data' =>   $data_array,
                'dataLabels' => [
                    'enabled' => true,
                    'color' => '#000023',
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