<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "risk_type".
 *
 * @property integer $id
 * @property string $risk_type
 *
 * @property Material[] $materials
 */
class RiskType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'risk_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['risk_type'], 'required'],
            [['risk_type'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'risk_type' => 'Risk Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['risk_type_id' => 'id']);
    }
}
