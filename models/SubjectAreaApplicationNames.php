<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_area_application_names".
 *
 * @property integer $material_id
 * @property string $subject_area
 * @property string $application
 */
class SubjectAreaApplicationNames extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject_area_application_names';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'subject_area', 'application'], 'required'],
            [['material_id'], 'integer'],
            [['subject_area'], 'string', 'max' => 50],
            [['application'], 'string', 'max' => 500],
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
            'application' => 'Application',
        ];
    }
}
