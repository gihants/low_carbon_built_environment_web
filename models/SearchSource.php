<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "search_source".
 *
 * @property integer $id
 * @property string $source_name
 * @property string $weblink
 * @property string $source_type
 * @property string $comments
 *
 * @property MaterialHasSearchSource[] $materialHasSearchSources
 * @property Material[] $materials
 */
class SearchSource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'search_source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source_name', 'source_type'], 'required'],
            [['source_type'], 'string'],
            [['source_name', 'weblink'], 'string', 'max' => 200],
            [['comments'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'source_name' => 'Source Name',
            'weblink' => 'Weblink',
            'source_type' => 'Source Type',
            'comments' => 'Comments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialHasSearchSources()
    {
        return $this->hasMany(MaterialHasSearchSource::className(), ['search_source_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['id' => 'material_id'])->viaTable('material_has_search_source', ['search_source_id' => 'id']);
    }
}
