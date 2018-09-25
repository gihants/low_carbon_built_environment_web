<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "top_systems".
 *
 * @property string $systems
 * @property integer $articles
 */
class TopSystems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'top_systems';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['articles'], 'integer'],
            [['systems'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'systems' => 'Systems',
            'articles' => 'Articles',
        ];
    }
}
