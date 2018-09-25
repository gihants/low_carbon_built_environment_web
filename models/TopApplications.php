<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "top_applications".
 *
 * @property string $application
 * @property integer $articles
 */
class TopApplications extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'top_applications';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['articles'], 'integer'],
            [['application'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'application' => 'Application',
            'articles' => 'Articles',
        ];
    }
}
