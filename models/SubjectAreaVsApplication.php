<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_area_vs_application".
 *
 * @property integer $material_id
 * @property integer $subject_area_id
 * @property integer $application_id
 */
class SubjectAreaVsApplication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject_area_vs_application';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'subject_area_id', 'application_id'], 'required'],
            [['material_id', 'subject_area_id', 'application_id'], 'integer'],
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
            'application_id' => 'Application ID',
        ];
    }
}
