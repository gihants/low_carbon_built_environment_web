<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funding_source".
 *
 * @property integer $id
 * @property string $funding_source_name
 * @property string $address
 * @property integer $country_id
 *
 * @property Country $country
 * @property MaterialHasFundingSource[] $materialHasFundingSources
 * @property Material[] $materials
 */
class FundingSource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'funding_source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['funding_source_name', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['funding_source_name'], 'string', 'max' => 200],
            [['address'], 'string', 'max' => 500],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'funding_source_name' => 'Funding Source Name',
            'address' => 'Address',
            'country_id' => 'Country ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasFundingSources()
    {
        return $this->hasMany(MaterialHasFundingSource::className(), ['funding_source_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['id' => 'material_id'])->viaTable('material_has_funding_source', ['funding_source_id' => 'id']);
    }
}
