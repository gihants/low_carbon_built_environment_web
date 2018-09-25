<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "search_sources_of_material".
 *
 * @property integer $material_id
 * @property string $sarch_source_name
 * @property string $weblink
 * @property string $source_type
 * @property string $comments
 */
class SearchSourcesOfMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'search_sources_of_material';
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
            [['comments'], 'string'],
            [['sarch_source_name', 'weblink'], 'string', 'max' => 200],
            [['source_type'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'sarch_source_name' => 'Sarch Source Name',
            'weblink' => 'Weblink',
            'source_type' => 'Source Type',
            'comments' => 'Comments',
        ];
    }
}
