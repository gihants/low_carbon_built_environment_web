<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_has_copyright".
 *
 * @property integer $material_id
 * @property integer $copyright_id
 *
 * @property Material $material
 * @property CopyrightType $copyright
 */
class MaterialHasCopyright extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_has_copyright';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'copyright_id'], 'required'],
            [['material_id', 'copyright_id'], 'integer'],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
            [['copyright_id'], 'exist', 'skipOnError' => true, 'targetClass' => CopyrightType::className(), 'targetAttribute' => ['copyright_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'copyright_id' => 'Copyright ID',
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
    public function getCopyright()
    {
        return $this->hasOne(CopyrightType::className(), ['id' => 'copyright_id']);
    }
}
