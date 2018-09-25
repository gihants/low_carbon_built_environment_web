<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materials_per_subject_area".
 *
 * @property string $subject_area
 * @property integer $materials
 */
class MaterialsPerSubjectArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materials_per_subject_area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_area'], 'required'],
            [['materials'], 'integer'],
            [['subject_area'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subject_area' => 'Subject Area',
            'materials' => 'Materials',
        ];
    }
}
