<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_area_built_environment_scale_names".
 *
 * @property integer $material_id
 * @property string $subject_area
 * @property string $built_environment_scale
 */
class SubjectAreaBuiltEnvironmentScaleNames extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject_area_built_environment_scale_names';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'subject_area', 'built_environment_scale'], 'required'],
            [['material_id'], 'integer'],
            [['subject_area', 'built_environment_scale'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'subject_area' => 'Subject Area',
            'built_environment_scale' => 'Built Environment Scale',
        ];
    }
}
