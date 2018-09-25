<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subjects_vs_bets".
 *
 * @property integer $material_id
 * @property integer $subject_id
 * @property integer $built_environment_type_id
 */
class SubjectsVsBets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subjects_vs_bets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'subject_id', 'built_environment_type_id'], 'required'],
            [['material_id', 'subject_id', 'built_environment_type_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'subject_id' => 'Subject ID',
            'built_environment_type_id' => 'Built Environment Type ID',
        ];
    }
}
