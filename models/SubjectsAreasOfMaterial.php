<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subjects_areas_of_material".
 *
 * @property integer $material_id
 * @property string $subject_area
 */
class SubjectsAreasOfMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subjects_areas_of_material';
    }

    public static function primaryKey()
    {
        return ['material_id'];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id'], 'required'],
            [['material_id'], 'integer'],
            [['subject_area'], 'string', 'max' => 50],
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
        ];
    }
}
