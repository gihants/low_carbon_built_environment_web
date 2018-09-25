<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_area_vs_built_environment_scale".
 *
 * @property integer $material_id
 * @property integer $subject_area_id
 * @property integer $built_environment_scale_id
 */
class SubjectAreaVsBuiltEnvironmentScale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject_area_vs_built_environment_scale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'subject_area_id', 'built_environment_scale_id'], 'required'],
            [['material_id', 'subject_area_id', 'built_environment_scale_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'subject_area_id' => 'Subject Area ID',
            'built_environment_scale_id' => 'Built Environment Scale ID',
        ];
    }
}
