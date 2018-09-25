<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "built_environment_scale".
 *
 * @property integer $id
 * @property string $description
 *
 * @property MaterialHasBuiltEnvironmentScale[] $materialHasBuiltEnvironmentScales
 * @property Material[] $materials
 */
class BuiltEnvironmentScale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'built_environment_scale';
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
    public function getMaterialHasBuiltEnvironmentScales()
    {
        return $this->hasMany(MaterialHasBuiltEnvironmentScale::className(), ['built_environment_scale_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['id' => 'material_id'])->viaTable('material_has_built_environment_scale', ['built_environment_scale_id' => 'id']);
    }
}
