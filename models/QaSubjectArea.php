<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qa_subject_area".
 *
 * @property string $subject_area
 * @property string $quality_index
 * @property integer $studies
 */
class QaSubjectArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qa_subject_area';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject_area', 'quality_index'], 'required'],
            [['studies'], 'integer'],
            [['subject_area'], 'string', 'max' => 50],
            [['quality_index'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subject_area' => 'Subject Area',
            'quality_index' => 'Quality Index',
            'studies' => 'Studies',
        ];
    }
}
