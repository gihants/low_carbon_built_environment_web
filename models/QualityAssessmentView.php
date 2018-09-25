<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quality_assessment_view".
 *
 * @property integer $material_id
 * @property string $qa_1_question
 * @property string $qa_1_score
 * @property string $qa_1_details
 * @property string $qa_2_question
 * @property string $qa_2_score
 * @property string $qa_2_details
 * @property string $qa_3_question
 * @property string $qa_3_score
 * @property string $qa_3_details
 * @property string $qa_4_question
 * @property string $qa_4_score
 * @property string $qa_4_details
 * @property string $qa_5_question
 * @property string $qa_5_score
 * @property string $qa_5_details
 * @property string $qa_6_question
 * @property string $qa_6_score
 * @property string $qa_6_details
 * @property string $qa_7_question
 * @property string $qa_7_score
 * @property string $qa_7_details
 * @property string $qa_8_question
 * @property string $qa_8_score
 * @property string $qa_8_details
 * @property string $qa_9_question
 * @property string $qa_9_score
 * @property string $qa_9_details
 * @property string $qa_10_question
 * @property string $qa_10_score
 * @property string $qa_10_details
 * @property string $qa_11_question
 * @property string $qa_11_score
 * @property string $qa_11_details
 * @property string $qa_12_question
 * @property string $qa_12_score
 * @property string $qa_12_details
 * @property string $qa_13_question
 * @property string $qa_13_score
 * @property string $qa_13_details
 * @property string $qa_14_question
 * @property string $qa_14_score
 * @property string $qa_14_details
 * @property string $qa_15_question
 * @property string $qa_15_score
 * @property string $qa_15_details
 * @property string $qa_16_question
 * @property string $qa_16_score
 * @property string $qa_16_details
 */
class QualityAssessmentView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quality_assessment_view';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'qa_1_details', 'qa_2_details', 'qa_3_details', 'qa_4_details', 'qa_5_details', 'qa_6_details', 'qa_7_details', 'qa_8_details', 'qa_9_details', 'qa_10_details', 'qa_11_details', 'qa_12_details', 'qa_13_details', 'qa_14_details', 'qa_15_details', 'qa_16_details'], 'required'],
            [['material_id'], 'integer'],
            [['qa_1_details', 'qa_2_details', 'qa_3_details', 'qa_4_details', 'qa_5_details', 'qa_6_details', 'qa_7_details', 'qa_8_details', 'qa_9_details', 'qa_10_details', 'qa_11_details', 'qa_12_details', 'qa_13_details', 'qa_14_details', 'qa_15_details', 'qa_16_details'], 'string'],
            [['qa_1_question', 'qa_2_question', 'qa_3_question', 'qa_4_question', 'qa_5_question', 'qa_6_question', 'qa_7_question', 'qa_8_question', 'qa_9_question', 'qa_10_question', 'qa_11_question', 'qa_12_question', 'qa_13_question', 'qa_14_question', 'qa_15_question', 'qa_16_question'], 'string', 'max' => 300],
            [['qa_1_score', 'qa_2_score', 'qa_3_score', 'qa_4_score', 'qa_5_score', 'qa_6_score', 'qa_7_score', 'qa_8_score', 'qa_9_score', 'qa_10_score', 'qa_11_score', 'qa_12_score', 'qa_13_score', 'qa_14_score', 'qa_15_score', 'qa_16_score'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'qa_1_question' => 'Qa 1 Question',
            'qa_1_score' => 'Qa 1 Score',
            'qa_1_details' => 'Qa 1 Details',
            'qa_2_question' => 'Qa 2 Question',
            'qa_2_score' => 'Qa 2 Score',
            'qa_2_details' => 'Qa 2 Details',
            'qa_3_question' => 'Qa 3 Question',
            'qa_3_score' => 'Qa 3 Score',
            'qa_3_details' => 'Qa 3 Details',
            'qa_4_question' => 'Qa 4 Question',
            'qa_4_score' => 'Qa 4 Score',
            'qa_4_details' => 'Qa 4 Details',
            'qa_5_question' => 'Qa 5 Question',
            'qa_5_score' => 'Qa 5 Score',
            'qa_5_details' => 'Qa 5 Details',
            'qa_6_question' => 'Qa 6 Question',
            'qa_6_score' => 'Qa 6 Score',
            'qa_6_details' => 'Qa 6 Details',
            'qa_7_question' => 'Qa 7 Question',
            'qa_7_score' => 'Qa 7 Score',
            'qa_7_details' => 'Qa 7 Details',
            'qa_8_question' => 'Qa 8 Question',
            'qa_8_score' => 'Qa 8 Score',
            'qa_8_details' => 'Qa 8 Details',
            'qa_9_question' => 'Qa 9 Question',
            'qa_9_score' => 'Qa 9 Score',
            'qa_9_details' => 'Qa 9 Details',
            'qa_10_question' => 'Qa 10 Question',
            'qa_10_score' => 'Qa 10 Score',
            'qa_10_details' => 'Qa 10 Details',
            'qa_11_question' => 'Qa 11 Question',
            'qa_11_score' => 'Qa 11 Score',
            'qa_11_details' => 'Qa 11 Details',
            'qa_12_question' => 'Qa 12 Question',
            'qa_12_score' => 'Qa 12 Score',
            'qa_12_details' => 'Qa 12 Details',
            'qa_13_question' => 'Qa 13 Question',
            'qa_13_score' => 'Qa 13 Score',
            'qa_13_details' => 'Qa 13 Details',
            'qa_14_question' => 'Qa 14 Question',
            'qa_14_score' => 'Qa 14 Score',
            'qa_14_details' => 'Qa 14 Details',
            'qa_15_question' => 'Qa 15 Question',
            'qa_15_score' => 'Qa 15 Score',
            'qa_15_details' => 'Qa 15 Details',
            'qa_16_question' => 'Qa 16 Question',
            'qa_16_score' => 'Qa 16 Score',
            'qa_16_details' => 'Qa 16 Details',
        ];
    }
}
