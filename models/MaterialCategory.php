<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_category".
 *
 * @property integer $id
 * @property string $description
 *
 * @property MaterialType[] $materialTypes
 */
class MaterialCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_category';
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
    public function getMaterialTypes()
    {
        return $this->hasMany(MaterialType::className(), ['material_category_id' => 'id']);
    }
}
