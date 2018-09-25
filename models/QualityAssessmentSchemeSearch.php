<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QualityAssessmentScheme;

/**
 * QualityAssessmentSchemeSearch represents the model behind the search form about `app\models\QualityAssessmentScheme`.
 */
class QualityAssessmentSchemeSearch extends QualityAssessmentScheme
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qa_question_id', 'question', 'yes', 'no', 'cannot_answer'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = QualityAssessmentScheme::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'qa_question_id', $this->qa_question_id])
            ->andFilterWhere(['like', 'question', $this->question])
            ->andFilterWhere(['like', 'yes', $this->yes])
            ->andFilterWhere(['like', 'no', $this->no])
            ->andFilterWhere(['like', 'cannot_answer', $this->cannot_answer]);

        return $dataProvider;
    }
}
