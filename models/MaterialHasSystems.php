<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_has_systems".
 *
 * @property integer $material_id
 * @property integer $systems_id
 *
 * @property Material $material
 * @property Systems $systems
 */
class MaterialHasSystems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_has_systems';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'systems_id'], 'required'],
            [['material_id', 'systems_id'], 'integer'],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
            [['systems_id'], 'exist', 'skipOnError' => true, 'targetClass' => Systems::className(), 'targetAttribute' => ['systems_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'systems_id' => 'Systems ID',
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
    public function getSystems()
    {
        return $this->hasOne(Systems::className(), ['id' => 'systems_id']);
    }
}
