<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "identifier_type".
 *
 * @property integer $id
 * @property string $description
 *
 * @property MaterialHasIdentifier[] $materialHasIdentifiers
 * @property Material[] $materials
 */
class IdentifierType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'identifier_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 200],
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
    public function getMaterialHasIdentifiers()
    {
        return $this->hasMany(MaterialHasIdentifier::className(), ['identifier_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['id' => 'material_id'])->viaTable('material_has_identifier', ['identifier_type_id' => 'id']);
    }
}
