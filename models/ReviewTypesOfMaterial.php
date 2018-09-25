<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review_types_of_material".
 *
 * @property integer $material_id
 * @property string $claimed_review_type
 * @property string $actual_review_type
 */
class ReviewTypesOfMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review_types_of_material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id'], 'integer'],
            [['claimed_review_type', 'actual_review_type'], 'required'],
            [['claimed_review_type', 'actual_review_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'claimed_review_type' => 'Claimed Review Type',
            'actual_review_type' => 'Actual Review Type',
        ];
    }
}
