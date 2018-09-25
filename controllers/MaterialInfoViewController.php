<?php

namespace app\controllers;
use Yii;
use yii\data\ActiveDataProvider;
use app\models\MaterialInfoView;
use app\models\MaterialInfoViewSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\SearchSourcesPerMaterial;
use app\models\SubjectAreaBuiltEnvironmentScaleNames;
use app\models\SubjectAreaApplicationNames;
use app\models\ApplicationBuiltEnvironmentScaleNames;
use app\models\CountryCodesOfFirstAuthors;
use app\models\QualityAssesment;


/**
 * MaterialInfoViewController implements the CRUD actions for MaterialInfoView model.
 */
class MaterialInfoViewController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MaterialInfoView models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaterialInfoViewSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexYear($year)
    {
        $searchModel = new MaterialInfoViewSearch();
        $searchModel->year = $year;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);



        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionIndexOriginalSources($lower, $higher)
    {
        $higher = $higher - 1;
        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere(['between', 'number_of_original_sources', $lower, $higher]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexSearchSources($lower, $higher)
    {
        $higher = $higher - 1;
        $lower = $lower+1;
        $materials = SearchSourcesPerMaterial::find()->where('search_sources = '. $lower )->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['material_id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexSubjectAreaBuiltEnvironmentScale($subject_area, $built_environment_scale)
    {
        $materials = SubjectAreaBuiltEnvironmentScaleNames::find()->where('subject_area =\''. $subject_area. '\' AND built_environment_scale = \''. $built_environment_scale. '\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['material_id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexApplicationBuiltEnvironmentScale($application, $built_environment_scale)
    {
        $materials = ApplicationBuiltEnvironmentScaleNames::find()->where('application =\''. $application. '\' AND built_environment_scale = \''. $built_environment_scale. '\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['material_id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexSubjectAreaApplication($subject_area, $application)
    {
        $materials = SubjectAreaApplicationNames::find()->where('subject_area =\''. $subject_area. '\' AND application = \''. $application. '\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['material_id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexBuiltEnvironmentScale($built_environment_scale)
    {
        $materials = SubjectAreaBuiltEnvironmentScaleNames::find()->where('built_environment_scale = \''. $built_environment_scale. '\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['material_id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexSubjectArea($subject_area)
    {
        $materials = SubjectAreaBuiltEnvironmentScaleNames::find()->where('subject_area = \''. $subject_area. '\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['material_id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionIndexApplication($application)
    {
        $materials = SubjectAreaApplicationNames::find()->where('application = \''. $application. '\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['material_id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionIndexFirstAuthorCountry($country)
    {
        $materials = CountryCodesOfFirstAuthors::find()->where('country_code = \''. $country. '\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['material_id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionQualityIndex($quality_index)
    {
        $materials = MaterialInfoView::find()->where('quality_index = \''. $quality_index. '\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRiskOfBias($risk_level)
    {
        $materials = MaterialInfoView::find()->where('risk_level = \''. $risk_level. '\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionQualityAssessment($question, $score)
    {
        $materials = QualityAssesment::find()->where('qa_'. $question. ' = \''.$score.'\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['material_id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionQualityIndexYear($quality_index, $year)
    {
        $materials = MaterialInfoView::find()->where('quality_index = \''. $quality_index. '\' AND year = \''. $year. '\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionRiskLevelYear($risk_level, $year)
    {
        $materials = MaterialInfoView::find()->where('risk_level = \''. $risk_level. '\' AND year = \''. $year. '\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionReviewTypes($suggested, $claimed)
    {
        $materials = MaterialInfoView::find()->where('actual_review_type = \''. $suggested. '\' AND review_type = \''. $claimed. '\'')->all();
        $ids = [];
        foreach ($materials as $material) {
            array_push($ids, $material['id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', $ids]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionQualityIndexSubjectArea($subject_area, $quality_index)
    {
        $materials = SubjectAreaBuiltEnvironmentScaleNames::find()->where('subject_area =\''. $subject_area. '\'')->all();
        $ids_1 = [];
        foreach ($materials as $material) {
            array_push($ids_1, $material['material_id']);
        }

        $materials = MaterialInfoView::find()->where('quality_index =\''. $quality_index. '\'')->all();
        $ids_2 = [];
        foreach ($materials as $material) {
            array_push($ids_2, $material['id']);
        }

        $searchModel = new MaterialInfoViewSearch();


        $query = MaterialInfoView::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query->andFilterWhere(['in', 'id', array_intersect($ids_1, $ids_2)]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaterialInfoView model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MaterialInfoView model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaterialInfoView();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MaterialInfoView model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MaterialInfoView model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MaterialInfoView model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaterialInfoView the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaterialInfoView::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
