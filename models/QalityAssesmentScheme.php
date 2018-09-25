<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qality_assesment_scheme".
 *
 * @property string $qa_question_id
 * @property string $question
 * @property string $yes
 * @property string $no
 * @property string $cannot_answer
 */
class QalityAssesmentScheme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qality_assesment_scheme';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qa_question_id', 'question', 'yes', 'no', 'cannot_answer'], 'required'],
            [['qa_question_id'], 'string', 'max' => 11],
            [['question'], 'string', 'max' => 300],
            [['yes', 'no', 'cannot_answer'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'qa_question_id' => 'Question ID',
            'question' => 'Question',
            'yes' => 'Yes',
            'no' => 'No',
            'cannot_answer' => 'Cannot Answer',
        ];
    }
}
