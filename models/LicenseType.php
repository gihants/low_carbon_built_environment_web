<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "license_type".
 *
 * @property integer $id
 * @property string $description
 *
 * @property MaterialHasLicence[] $materialHasLicences
 * @property Material[] $materials
 */
class LicenseType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'license_type';
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
    public function getMaterialHasLicences()
    {
        return $this->hasMany(MaterialHasLicence::className(), ['licence_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['id' => 'material_id'])->viaTable('material_has_licence', ['licence_type_id' => 'id']);
    }
}
