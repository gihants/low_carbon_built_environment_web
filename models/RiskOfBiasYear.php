<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "risk_of_bias_year".
 *
 * @property string $year
 * @property string $risk_of_bias
 * @property integer $articles
 */
class RiskOfBiasYear extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'risk_of_bias_year';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['year', 'risk_of_bias'], 'required'],
            [['year'], 'safe'],
            [['articles'], 'integer'],
            [['risk_of_bias'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'year' => 'Year',
            'risk_of_bias' => 'Risk Of Bias',
            'articles' => 'Articles',
        ];
    }
}
