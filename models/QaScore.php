<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "qa_score".
 *
 * @property string $qa_score
 * @property string $description
 * @property string $colour_code
 *
 * @property Material[] $materials
 * @property Material[] $materials0
 * @property Material[] $materials1
 * @property Material[] $materials2
 * @property Material[] $materials3
 * @property Material[] $materials4
 * @property Material[] $materials5
 * @property Material[] $materials6
 * @property Material[] $materials7
 * @property Material[] $materials8
 * @property Material[] $materials9
 * @property Material[] $materials10
 */
class QaScore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'qa_score';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qa_score'], 'required'],
            [['qa_score'], 'string', 'max' => 5],
            [['description'], 'string', 'max' => 200],
            [['colour_code'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'qa_score' => 'Qa Score',
            'description' => 'Description',
            'colour_code' => 'Colour Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['qa_9' => 'qa_score']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials0()
    {
        return $this->hasMany(Material::className(), ['qa_10' => 'qa_score']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials1()
    {
        return $this->hasMany(Material::className(), ['qa_11' => 'qa_score']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials2()
    {
        return $this->hasMany(Material::className(), ['qa_12' => 'qa_score']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials3()
    {
        return $this->hasMany(Material::className(), ['qa_1' => 'qa_score']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials4()
    {
        return $this->hasMany(Material::className(), ['qa_2' => 'qa_score']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials5()
    {
        return $this->hasMany(Material::className(), ['qa_3' => 'qa_score']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials6()
    {
        return $this->hasMany(Material::className(), ['qa_4' => 'qa_score']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials7()
    {
        return $this->hasMany(Material::className(), ['qa_5' => 'qa_score']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials8()
    {
        return $this->hasMany(Material::className(), ['qa_6' => 'qa_score']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials9()
    {
        return $this->hasMany(Material::className(), ['qa_7' => 'qa_score']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials10()
    {
        return $this->hasMany(Material::className(), ['qa_8' => 'qa_score']);
    }
}
