<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_has_built_environment_scale".
 *
 * @property integer $material_id
 * @property integer $built_environment_scale_id
 *
 * @property Material $material
 * @property BuiltEnvironmentScale $builtEnvironmentScale
 */
class MaterialHasBuiltEnvironmentScale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_has_built_environment_scale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'built_environment_scale_id'], 'required'],
            [['material_id', 'built_environment_scale_id'], 'integer'],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
            [['built_environment_scale_id'], 'exist', 'skipOnError' => true, 'targetClass' => BuiltEnvironmentScale::className(), 'targetAttribute' => ['built_environment_scale_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'built_environment_scale_id' => 'Built Environment Scale ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuiltEnvironmentScale()
    {
        return $this->hasOne(BuiltEnvironmentScale::className(), ['id' => 'built_environment_scale_id']);
    }
}
