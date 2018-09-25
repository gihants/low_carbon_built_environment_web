<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_has_keyword".
 *
 * @property integer $material_id
 * @property integer $key_word_id
 *
 * @property Material $material
 * @property Keyword $keyWord
 */
class MaterialHasKeyword extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_has_keyword';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'key_word_id'], 'required'],
            [['material_id', 'key_word_id'], 'integer'],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
            [['key_word_id'], 'exist', 'skipOnError' => true, 'targetClass' => Keyword::className(), 'targetAttribute' => ['key_word_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'key_word_id' => 'Key Word ID',
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
    public function getKeyWord()
    {
        return $this->hasOne(Keyword::className(), ['id' => 'key_word_id']);
    }
}
