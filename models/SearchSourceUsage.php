<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "search_source_usage".
 *
 * @property string $source_name
 * @property string $weblink
 * @property string $source_type
 * @property string $comments
 * @property string $percentage_usage
 */
class SearchSourceUsage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'search_source_usage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['source_name', 'source_type'], 'required'],
            [['source_type'], 'string'],
            [['percentage_usage'], 'number'],
            [['source_name'], 'string', 'max' => 200],
            [['weblink', 'comments'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'source_name' => 'Source Name',
            'weblink' => 'Weblink',
            'source_type' => 'Source Type',
            'comments' => 'Comments',
            'percentage_usage' => 'Percentage Usage',
        ];
    }
}
