<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_type".
 *
 * @property integer $id
 * @property string $description
 * @property integer $material_category_id
 *
 * @property Material[] $materials
 * @property MaterialCategory $materialCategory
 */
class MaterialType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['material_category_id'], 'integer'],
            [['description'], 'string', 'max' => 200],
            [['material_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => MaterialCategory::className(), 'targetAttribute' => ['material_category_id' => 'id']],
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
            'material_category_id' => 'Material Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['material_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialCategory()
    {
        return $this->hasOne(MaterialCategory::className(), ['id' => 'material_category_id']);
    }
}
