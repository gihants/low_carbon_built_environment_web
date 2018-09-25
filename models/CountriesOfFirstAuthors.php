<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "countries_of_first_authors".
 *
 * @property string $country
 * @property string $country_code
 * @property integer $number_of_articles
 */
class CountriesOfFirstAuthors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries_of_first_authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country', 'country_code'], 'required'],
            [['number_of_articles'], 'integer'],
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
            'number_of_articles' => 'Number Of Articles',
        ];
    }
}
