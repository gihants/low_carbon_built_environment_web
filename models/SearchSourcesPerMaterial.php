<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "search_sources_per_material".
 *
 * @property integer $material_id
 * @property integer $search_sources
 */
class SearchSourcesPerMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'search_sources_per_material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id'], 'required'],
            [['material_id', 'search_sources'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'search_sources' => 'Search Sources',
        ];
    }
}
