<?php

namespace app\controllers;

class MaterialDataEntryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSubjectsEntry()
    {
        return $this->render('subjects-entry');
    }

}
