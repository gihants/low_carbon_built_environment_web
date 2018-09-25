<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "applications_vs_bets".
 *
 * @property integer $material_id
 * @property integer $application_id
 * @property integer $built_environment_type_id
 */
class ApplicationsVsBets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'applications_vs_bets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'application_id', 'built_environment_type_id'], 'required'],
            [['material_id', 'application_id', 'built_environment_type_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'application_id' => 'Application ID',
            'built_environment_type_id' => 'Built Environment Type ID',
        ];
    }
}
