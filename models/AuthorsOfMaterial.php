<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "authors_of_material".
 *
 * @property integer $material_id
 * @property integer $first_author
 * @property string $name
 * @property string $email
 * @property string $organisation
 * @property string $address
 * @property string $country
 */
class AuthorsOfMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors_of_material';
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
            [['material_id'], 'required'],
            [['material_id', 'first_author'], 'integer'],
            [['name', 'email', 'organisation'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 500],
            [['country'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'first_author' => 'First Author',
            'name' => 'Name',
            'email' => 'Email',
            'organisation' => 'Organisation',
            'address' => 'Address',
            'country' => 'Country',
        ];
    }
}
