<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organisation".
 *
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property integer $country_id
 *
 * @property Country $country
 * @property OrganisationHasAuthor[] $organisationHasAuthors
 * @property Author[] $authors
 */
class Organisation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organisation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'name' => 'Name',
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
    public function getOrganisationHasAuthors()
    {
        return $this->hasMany(OrganisationHasAuthor::className(), ['organisation_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['id' => 'author_id'])->viaTable('organisation_has_author', ['organisation_id' => 'id']);
    }
}
