<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_has_built_environmet_type".
 *
 * @property integer $material_id
 * @property integer $built_environment_type_id
 *
 * @property BuiltEnvironmetType $builtEnvironmentType
 * @property Material $material
 */
class MaterialHasBuiltEnvironmetType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_has_built_environmet_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'built_environment_type_id'], 'required'],
            [['material_id', 'built_environment_type_id'], 'integer'],
            [['built_environment_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BuiltEnvironmetType::className(), 'targetAttribute' => ['built_environment_type_id' => 'id']],
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
            'built_environment_type_id' => 'Built Environment Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuiltEnvironmentType()
    {
        return $this->hasOne(BuiltEnvironmetType::className(), ['id' => 'built_environment_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_id']);
    }
}
