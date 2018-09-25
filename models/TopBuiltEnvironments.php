<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "top_built_environments".
 *
 * @property string $built_environment_type
 * @property integer $articles
 */
class TopBuiltEnvironments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'top_built_environments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['articles'], 'integer'],
            [['built_environment_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'built_environment_type' => 'Built Environment Type',
            'articles' => 'Articles',
        ];
    }
}
