<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materials_per_application".
 *
 * @property string $application
 * @property integer $materials
 */
class MaterialsPerApplication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materials_per_application';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['application'], 'required'],
            [['materials'], 'integer'],
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
            'materials' => 'Materials',
        ];
    }
}
