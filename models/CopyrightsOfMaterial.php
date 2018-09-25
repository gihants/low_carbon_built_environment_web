<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "copyrights_of_material".
 *
 * @property integer $material_id
 * @property string $copyright
 */
class CopyrightsOfMaterial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'copyrights_of_material';
    }
    
    public static function primaryKey()
    {
        return ['material_id'];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id'], 'required'],
            [['material_id'], 'integer'],
            [['copyright'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'Material ID',
            'copyright' => 'Copyright',
        ];
    }
}
