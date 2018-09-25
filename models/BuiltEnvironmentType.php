<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "built_environment_type".
 *
 * @property integer $id
 * @property string $description
 *
 * @property MaterialHasBuiltEnvironmentType[] $materialHasBuiltEnvironmentTypes
 * @property Material[] $materials
 */
class BuiltEnvironmentType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'built_environment_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 100],
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
    public function getMaterialHasBuiltEnvironmentTypes()
    {
        return $this->hasMany(MaterialHasBuiltEnvironmentType::className(), ['built_environment_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['id' => 'material_id'])->viaTable('material_has_built_environment_type', ['built_environment_type_id' => 'id']);
    }
}
