<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "identifiers_of_material".
 *
 * @property integer $material_id
 * @property string $identifier_type
 * @property string $identification
 */
class IdentifiersOfMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'identifiers_of_material';
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
            [['identifier_type'], 'string', 'max' => 200],
            [['identification'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'identifier_type' => 'Identifier Type',
            'identification' => 'Identification',
        ];
    }
}
