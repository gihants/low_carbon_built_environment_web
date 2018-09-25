<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quality_assesment".
 *
 * @property integer $material_id
 * @property string $qa_1
 * @property string $qa_1_details
 * @property string $qa_2
 * @property string $qa_2_details
 * @property string $qa_3
 * @property string $qa_3_details
 * @property string $qa_4
 * @property string $qa_4_details
 * @property string $qa_5
 * @property string $qa_5_details
 * @property string $qa_6
 * @property string $qa_6_details
 * @property string $qa_7
 * @property string $qa_7_details
 * @property string $qa_8
 * @property string $qa_8_details
 * @property string $qa_9
 * @property string $qa_9_details
 * @property string $qa_10
 * @property string $qa_10_details
 * @property string $qa_11
 * @property string $qa_11_details
 * @property string $qa_12
 * @property string $qa_12_details
 * @property string $qa_13
 * @property string $qa_13_details
 * @property string $qa_14
 * @property string $qa_14_details
 * @property string $qa_15
 * @property string $qa_15_details
 * @property string $qa_16
 * @property string $qa_16_details
 * @property string $quality_index
 * @property string $quality_index_comment
 * @property string $actual_review_type
 * @property string $risk_level
 * @property string $risk_level_comment
 *
 * @property Material $material
 */
class QualityAssesment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quality_assesment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'qa_1', 'qa_1_details', 'qa_2', 'qa_2_details', 'qa_3', 'qa_3_details', 'qa_4', 'qa_4_details', 'qa_5', 'qa_5_details', 'qa_6', 'qa_6_details', 'qa_7', 'qa_7_details', 'qa_8', 'qa_8_details', 'qa_9', 'qa_9_details', 'qa_10', 'qa_10_details', 'qa_11', 'qa_11_details', 'qa_12', 'qa_12_details', 'qa_13', 'qa_13_details', 'qa_14', 'qa_14_details', 'qa_15', 'qa_15_details', 'qa_16', 'qa_16_details', 'quality_index', 'quality_index_comment', 'actual_review_type', 'risk_level', 'risk_level_comment'], 'required'],
            [['material_id'], 'integer'],
            [['qa_1_details', 'qa_2_details', 'qa_3_details', 'qa_4_details', 'qa_5_details', 'qa_6_details', 'qa_7_details', 'qa_8_details', 'qa_9_details', 'qa_10_details', 'qa_11_details', 'qa_12_details', 'qa_13_details', 'qa_14_details', 'qa_15_details', 'qa_16_details', 'quality_index_comment', 'risk_level_comment'], 'string'],
            [['qa_1', 'qa_2', 'qa_3', 'qa_4', 'qa_5', 'qa_6', 'qa_7', 'qa_8', 'qa_9', 'qa_10', 'qa_11', 'qa_12', 'qa_13', 'qa_14', 'qa_15', 'qa_16'], 'string', 'max' => 3],
            [['quality_index'], 'string', 'max' => 1],
            [['actual_review_type'], 'string', 'max' => 100],
            [['risk_level'], 'string', 'max' => 10],
            [['material_id'], 'unique'],
            [['material_id'], 'exist', 'skipOnError' => true, 'targetClass' => Material::className(), 'targetAttribute' => ['material_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'qa_1' => 'Qa 1',
            'qa_1_details' => 'Qa 1 Details',
            'qa_2' => 'Qa 2',
            'qa_2_details' => 'Qa 2 Details',
            'qa_3' => 'Qa 3',
            'qa_3_details' => 'Qa 3 Details',
            'qa_4' => 'Qa 4',
            'qa_4_details' => 'Qa 4 Details',
            'qa_5' => 'Qa 5',
            'qa_5_details' => 'Qa 5 Details',
            'qa_6' => 'Qa 6',
            'qa_6_details' => 'Qa 6 Details',
            'qa_7' => 'Qa 7',
            'qa_7_details' => 'Qa 7 Details',
            'qa_8' => 'Qa 8',
            'qa_8_details' => 'Qa 8 Details',
            'qa_9' => 'Qa 9',
            'qa_9_details' => 'Qa 9 Details',
            'qa_10' => 'Qa 10',
            'qa_10_details' => 'Qa 10 Details',
            'qa_11' => 'Qa 11',
            'qa_11_details' => 'Qa 11 Details',
            'qa_12' => 'Qa 12',
            'qa_12_details' => 'Qa 12 Details',
            'qa_13' => 'Qa 13',
            'qa_13_details' => 'Qa 13 Details',
            'qa_14' => 'Qa 14',
            'qa_14_details' => 'Qa 14 Details',
            'qa_15' => 'Qa 15',
            'qa_15_details' => 'Qa 15 Details',
            'qa_16' => 'Qa 16',
            'qa_16_details' => 'Qa 16 Details',
            'quality_index' => 'Quality Index',
            'quality_index_comment' => 'Quality Index Comment',
            'actual_review_type' => 'Actual Review Type',
            'risk_level' => 'Risk Level',
            'risk_level_comment' => 'Risk Level Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterial()
    {
        return $this->hasOne(Material::className(), ['id' => 'material_id']);
    }
}
