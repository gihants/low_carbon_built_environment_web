<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "top_subjects".
 *
 * @property string $subject
 * @property integer $articles
 */
class TopSubjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'top_subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['articles'], 'integer'],
            [['subject'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subject' => 'Subject',
            'articles' => 'Articles',
        ];
    }
}
