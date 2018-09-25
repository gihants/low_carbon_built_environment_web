<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_has_funding_source".
 *
 * @property integer $material_id
 * @property integer $funding_source_id
 * @property string $funded_year
 * @property string $comments
 *
 * @property Material $material
 * @property FundingSource $fundingSource
 */
class MaterialHasFundingSource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_has_funding_source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'funding_source_id'], 'required'],
            [['material_id', 'funding_source_id'], 'integer'],
            [['funded_year'], 'safe'],
            [['comments'], 'string', 'max' => 2000],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
            [['funding_source_id'], 'exist', 'skipOnError' => true, 'targetClass' => FundingSource::className(), 'targetAttribute' => ['funding_source_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'funding_source_id' => 'Funding Source ID',
            'funded_year' => 'Funded Year',
            'comments' => 'Comments',
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
    public function getFundingSource()
    {
        return $this->hasOne(FundingSource::className(), ['id' => 'funding_source_id']);
    }
}
