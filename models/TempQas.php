<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_qas".
 *
 * @property string $score
 * @property integer $qa_1
 * @property integer $qa_2
 * @property integer $qa_3
 * @property integer $qa_4
 * @property integer $qa_5
 * @property integer $qa_6
 * @property integer $qa_7
 * @property integer $qa_8
 * @property integer $qa_9
 * @property integer $qa_10
 * @property integer $qa_11
 * @property integer $qa_12
 * @property integer $qa_13
 * @property integer $qa_14
 * @property integer $qa_15
 * @property integer $qa_16
 */
class TempQas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_qas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qa_1', 'qa_2', 'qa_3', 'qa_4', 'qa_5', 'qa_6', 'qa_7', 'qa_8', 'qa_9', 'qa_10', 'qa_11', 'qa_12', 'qa_13', 'qa_14', 'qa_15', 'qa_16'], 'integer'],
            [['score'], 'string', 'max' => 13],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'score' => 'Score',
            'qa_1' => 'Qa 1',
            'qa_2' => 'Qa 2',
            'qa_3' => 'Qa 3',
            'qa_4' => 'Qa 4',
            'qa_5' => 'Qa 5',
            'qa_6' => 'Qa 6',
            'qa_7' => 'Qa 7',
            'qa_8' => 'Qa 8',
            'qa_9' => 'Qa 9',
            'qa_10' => 'Qa 10',
            'qa_11' => 'Qa 11',
            'qa_12' => 'Qa 12',
            'qa_13' => 'Qa 13',
            'qa_14' => 'Qa 14',
            'qa_15' => 'Qa 15',
            'qa_16' => 'Qa 16',
        ];
    }
}
