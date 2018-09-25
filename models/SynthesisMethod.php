<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "synthesis_method".
 *
 * @property integer $id
 * @property string $description
 *
 * @property Material[] $materials
 */
class SynthesisMethod extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'synthesis_method';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 50],
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
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['systhesis_method_id' => 'id']);
    }
}
