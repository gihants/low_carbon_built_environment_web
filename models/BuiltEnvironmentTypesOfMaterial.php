<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "built_environment_types_of_material".
 *
 * @property integer $material_id
 * @property string $built_environment_type
 */
class BuiltEnvironmentTypesOfMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'built_environment_types_of_material';
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
            [['built_environment_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'built_environment_type' => 'Built Environment Type',
        ];
    }
}
