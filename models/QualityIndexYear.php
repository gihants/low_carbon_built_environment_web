<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quality_index_year".
 *
 * @property string $year
 * @property string $quality_index
 * @property integer $articles
 */
class QualityIndexYear extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quality_index_year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'quality_index'], 'required'],
            [['year'], 'safe'],
            [['articles'], 'integer'],
            [['quality_index'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'year' => 'Year',
            'quality_index' => 'Quality Index',
            'articles' => 'Articles',
        ];
    }
}
