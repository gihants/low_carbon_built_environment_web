<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject_area".
 *
 * @property integer $id
 * @property string $description
 *
 * @property MaterialHasSubjectArea[] $materialHasSubjectAreas
 * @property Material[] $materials
 */
class SubjectArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject_area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasSubjectAreas()
    {
        return $this->hasMany(MaterialHasSubjectArea::className(), ['subject_area_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['id' => 'material_id'])->viaTable('material_has_subject_area', ['subject_area_id' => 'id']);
    }
}
