<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "countries_of_organisations".
 *
 * @property string $country
 * @property string $country_code
 * @property integer $number_of_organisations
 */
class CountriesOfOrganisations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries_of_organisations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country', 'country_code'], 'required'],
            [['number_of_organisations'], 'integer'],
            [['country'], 'string', 'max' => 45],
            [['country_code'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country' => 'Country',
            'country_code' => 'Country Code',
            'number_of_organisations' => 'Number Of Organisations',
        ];
    }
}
