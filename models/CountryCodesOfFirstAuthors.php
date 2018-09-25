<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country_codes_of_first_authors".
 *
 * @property integer $material_id
 * @property string $country
 * @property string $country_code
 */
class CountryCodesOfFirstAuthors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country_codes_of_first_authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'country', 'country_code'], 'required'],
            [['material_id'], 'integer'],
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
            'material_id' => 'Material ID',
            'country' => 'Country',
            'country_code' => 'Country Code',
        ];
    }
}
