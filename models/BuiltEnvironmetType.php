<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "built_environmet_type".
 *
 * @property integer $id
 * @property string $description
 *
 * @property MaterialHasBuiltEnvironmetType[] $materialHasBuiltEnvironmetTypes
 * @property Material[] $materials
 */
class BuiltEnvironmetType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'built_environmet_type';
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
    public function getMaterialHasBuiltEnvironmetTypes()
    {
        return $this->hasMany(MaterialHasBuiltEnvironmetType::className(), ['built_environment_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['id' => 'material_id'])->viaTable('material_has_built_environmet_type', ['built_environment_type_id' => 'id']);
    }
}
