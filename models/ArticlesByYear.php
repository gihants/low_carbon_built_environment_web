<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles_by_year".
 *
 * @property string $year
 * @property integer $articles
 */
class ArticlesByYear extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_by_year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year'], 'required'],
            [['year'], 'safe'],
            [['articles'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'year' => 'Year',
            'articles' => 'Articles',
        ];
    }
}
