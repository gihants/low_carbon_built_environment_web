<?php
/**
 * Created by PhpStorm.
 * User:    GihanS
 * Date: 19-01-2018
 */

namespace backend\models;

use yii\base\Model;

class EvidenceEntry extends Model
{
    public $appName;
    public $appBackendTheme;
    public $appFrontendTheme;
    public $cacheClass;
    public $appTour;

    public function rules()
    {
        return [
            // Application Name
            ['appName', 'required'],
            ['appName', 'string', 'max' => 150],

            // Application Backend Theme
            ['appBackendTheme', 'required'],

            // Application Frontend Theme
            ['appFrontendTheme', 'required'],

            // Cache Class
            ['cacheClass', 'required'],
            ['cacheClass', 'string', 'max' => 128],

            // Application Tour
            ['appTour', 'boolean']
        ];
    }

    public function attributeLabels()
    {
        return [
            'appName'          => 'Application Name',
            'appFrontendTheme' => 'Frontend Theme',
            'appBackendTheme'  => 'Backend Theme',
            'cacheClass' => 'Cache Class',
            'appTour'    => 'Show introduction tour for new users'
        ];
    }
}