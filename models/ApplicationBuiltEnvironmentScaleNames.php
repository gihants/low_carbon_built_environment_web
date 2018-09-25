<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application_built_environment_scale_names".
 *
 * @property integer $material_id
 * @property string $application
 * @property string $built_environment_scale
 */
class ApplicationBuiltEnvironmentScaleNames extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'application_built_environment_scale_names';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'application', 'built_environment_scale'], 'required'],
            [['material_id'], 'integer'],
            [['application'], 'string', 'max' => 500],
            [['built_environment_scale'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'application' => 'Application',
            'built_environment_scale' => 'Built Environment Scale',
        ];
    }
}
