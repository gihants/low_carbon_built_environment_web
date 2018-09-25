<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_has_licence".
 *
 * @property integer $material_id
 * @property integer $licence_type_id
 * @property string $licence_no
 *
 * @property Material $material
 * @property LicenseType $licenceType
 */
class MaterialHasLicence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_has_licence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'licence_type_id'], 'required'],
            [['material_id', 'licence_type_id'], 'integer'],
            [['licence_no'], 'string', 'max' => 200],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
            [['licence_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => LicenseType::className(), 'targetAttribute' => ['licence_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'licence_type_id' => 'Licence Type ID',
            'licence_no' => 'Licence No',
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
    public function getLicenceType()
    {
        return $this->hasOne(LicenseType::className(), ['id' => 'licence_type_id']);
    }
}
