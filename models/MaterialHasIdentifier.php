<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_has_identifier".
 *
 * @property integer $material_id
 * @property integer $identifier_type_id
 * @property string $identification
 *
 * @property Material $material
 * @property IdentifierType $identifierType
 */
class MaterialHasIdentifier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_has_identifier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'identifier_type_id'], 'required'],
            [['material_id', 'identifier_type_id'], 'integer'],
            [['identification'], 'string', 'max' => 500],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
            [['identifier_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => IdentifierType::className(), 'targetAttribute' => ['identifier_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'identifier_type_id' => 'Identifier Type ID',
            'identification' => 'Identification',
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
    public function getIdentifierType()
    {
        return $this->hasOne(IdentifierType::className(), ['id' => 'identifier_type_id']);
    }
}
