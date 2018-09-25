<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_has_subject_area".
 *
 * @property integer $material_id
 * @property integer $subject_area_id
 *
 * @property SubjectArea $subjectArea
 * @property Material $material
 */
class MaterialHasSubjectArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_has_subject_area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'subject_area_id'], 'required'],
            [['material_id', 'subject_area_id'], 'integer'],
            [['subject_area_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubjectArea::className(), 'targetAttribute' => ['subject_area_id' => 'id']],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjectArea()
    {
        return $this->hasOne(SubjectArea::className(), ['id' => 'subject_area_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_id']);
    }
}
