<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bet_scale_vs_application".
 *
 * @property integer $material_id
 * @property integer $built_environment_scale_id
 * @property integer $application_id
 */
class BetScaleVsApplication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bet_scale_vs_application';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'built_environment_scale_id', 'application_id'], 'required'],
            [['material_id', 'built_environment_scale_id', 'application_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'built_environment_scale_id' => 'Built Environment Scale ID',
            'application_id' => 'Application ID',
        ];
    }
}
