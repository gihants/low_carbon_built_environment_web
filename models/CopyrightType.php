<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "copyright_type".
 *
 * @property integer $id
 * @property string $description
 *
 * @property MaterialHasCopyright[] $materialHasCopyrights
 * @property Material[] $materials
 */
class CopyrightType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'copyright_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 500],
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
    public function getMaterialHasCopyrights()
    {
        return $this->hasMany(MaterialHasCopyright::className(), ['copyright_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['id' => 'material_id'])->viaTable('material_has_copyright', ['copyright_id' => 'id']);
    }
}
