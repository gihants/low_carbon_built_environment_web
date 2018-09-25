<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "built_environmet_types_of_material".
 *
 * @property integer $material_id
 * @property string $built_environmet_type
 */
class BuiltEnvironmetTypesOfMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'built_environmet_types_of_material';
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
            [['built_environmet_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'built_environmet_type' => 'Built Environmet Type',
        ];
    }
}
