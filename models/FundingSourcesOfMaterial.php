<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funding_sources_of_material".
 *
 * @property integer $materail_id
 * @property string $funding_source
 * @property string $address
 * @property string $country
 * @property string $funded_year
 * @property string $comments
 */
class FundingSourcesOfMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'funding_sources_of_material';
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
            [['materail_id'], 'required'],
            [['materail_id'], 'integer'],
            [['funded_year'], 'safe'],
            [['funding_source'], 'string', 'max' => 200],
            [['address'], 'string', 'max' => 500],
            [['country'], 'string', 'max' => 45],
            [['comments'], 'string', 'max' => 2000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'materail_id' => 'Materail ID',
            'funding_source' => 'Funding Source',
            'address' => 'Address',
            'country' => 'Country',
            'funded_year' => 'Funded Year',
            'comments' => 'Comments',
        ];
    }
}
