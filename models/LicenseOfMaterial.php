<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "license_of_material".
 *
 * @property integer $material_id
 * @property string $license_type
 * @property string $license_no
 */
class LicenseOfMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'license_of_material';
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
            [['license_type', 'license_no'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'license_type' => 'License Type',
            'license_no' => 'License No',
        ];
    }
}
