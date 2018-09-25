<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "applications_vs_subjects".
 *
 * @property integer $material_id
 * @property integer $application_id
 * @property integer $subject_id
 */
class ApplicationsVsSubjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'applications_vs_subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'application_id', 'subject_id'], 'required'],
            [['material_id', 'application_id', 'subject_id'], 'integer'],
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
            'subject_id' => 'Subject ID',
        ];
    }
}
