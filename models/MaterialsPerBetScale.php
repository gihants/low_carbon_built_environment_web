<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materials_per_bet_scale".
 *
 * @property string $built_environment_scale
 * @property integer $materials
 */
class MaterialsPerBetScale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materials_per_bet_scale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['built_environment_scale'], 'required'],
            [['materials'], 'integer'],
            [['built_environment_scale'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'built_environment_scale' => 'Built Environment Scale',
            'materials' => 'Materials',
        ];
    }
}
