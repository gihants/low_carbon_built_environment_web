<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "search_sources_per_paper".
 *
 * @property integer $id
 * @property integer $search_sources
 */
class SearchSourcesPerPaper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'search_sources_per_paper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'search_sources'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'search_sources' => 'Search Sources',
        ];
    }
}
