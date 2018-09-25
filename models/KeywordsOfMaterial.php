<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "keywords_of_material".
 *
 * @property integer $material_id
 * @property string $keyword
 */
class KeywordsOfMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keywords_of_material';
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
            [['material_id'], 'integer'],
            [['keyword'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'keyword' => 'Keyword',
        ];
    }
}
