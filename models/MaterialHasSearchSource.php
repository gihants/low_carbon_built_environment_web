<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_has_search_source".
 *
 * @property integer $material_id
 * @property integer $search_source_id
 *
 * @property Material $material
 * @property SearchSource $searchSource
 */
class MaterialHasSearchSource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_has_search_source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'search_source_id'], 'required'],
            [['material_id', 'search_source_id'], 'integer'],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
            [['search_source_id'], 'exist', 'skipOnError' => true, 'targetClass' => SearchSource::className(), 'targetAttribute' => ['search_source_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'search_source_id' => 'Search Source ID',
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
    public function getSearchSource()
    {
        return $this->hasOne(SearchSource::className(), ['id' => 'search_source_id']);
    }
}
