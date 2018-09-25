<?php

namespace app\controllers;

class HeatMapsController extends \yii\web\Controller
{
    public function actionSubjectsBets()
    {
        return $this->render('subjects-bets');
    }
    public function actionApplicationsBets()
    {
        return $this->render('applications-bets');
    }
    public function actionApplicationsSubjects()
    {
        return $this->render('applications-subjects');
    }
    public function actionFirstAuthorCountries()
    {
        return $this->render('first-author-countries');
    }
    public function actionNoOriginalSources()
    {
        return $this->render('no-original-sources');
    }
    public function actionOrganisationDistribution()
    {
        return $this->render('organisation-distribution');
    }
    public function actionArticlesByYear()
    {
        return $this->render('articles-by-year');
    }
    public function actionSearchSourceUsage()
    {
        return $this->render('search-source-usage');
    }
    public function actionSearchSourcesPerPaper()
    {
        return $this->render('search-sources-per-paper');
    }
    public function actionTopTens()
    {
        return $this->render('top-tens');
    }
    public function actionSearchTermCloud()
    {
        return $this->render('search-term-cloud');
    }
    public function actionJournalCloud()
    {
        return $this->render('journal-cloud');
    }
    public function actionSubjectAreaBetScale()
    {
        return $this->render('subject-area-bet-scale');
    }
    public function actionQualityAssessmentQuestionsSummary()
    {
        return $this->render('quality-assessment-questions-summary');
    }
    public function actionQualityIndex()
    {
        return $this->render('quality-index');
    }
    public function actionRiskOfBias()
    {
        return $this->render('risk-of-bias');
    }
    public function actionSubjectAreaApplication()
    {
        return $this->render('subject-area-application');
    }
    public function actionApplicationBetScale()
    {
        return $this->render('application-bet-scale');
    }
    public function actionQualityAssessmentSubjectArea()
    {
        return $this->render('quality-assessment-subject-area');
    }
    public function actionReviewTypesComparison()
    {
        return $this->render('review-types-comparison');
    }
    public function actionQualityIndexYear()
    {
        return $this->render('quality-index-year');
    }
    public function actionRiskOfBiasYear()
    {
        return $this->render('risk-of-bias-year');
    }






}
