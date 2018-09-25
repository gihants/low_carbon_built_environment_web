<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaterialEntry;

/**
 * MaterialEntrySearch represents the model behind the search form about `app\models\MaterialEntry`.
 */
class MaterialEntrySearch extends MaterialEntry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'review_type_id', 'risk_type_id', 'geographic_focus', 'prisma_diagram_used', 'no_of_original_sources', 'systhesis_method_id', 'quantitative_map', 'scale_id', 'material_type_id'], 'integer'],
            [['title', 'year', 'main_topic', 'timeframe_from', 'timeframe_to', 'search_string', 'screening_criteria', 'conclusions', 'conflict_of_interest', 'comments', 'qa_1', 'qa_2', 'qa_3', 'qa_4', 'qa_5', 'qa_6', 'qa_7', 'qa_8', 'qa_9', 'qa_10', 'qa_11', 'qa_12'], 'safe'],
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
        $query = MaterialEntry::find();

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
        $query->andFilterWhere([
            'id' => $this->id,
            'year' => $this->year,
            'review_type_id' => $this->review_type_id,
            'risk_type_id' => $this->risk_type_id,
            'geographic_focus' => $this->geographic_focus,
            'prisma_diagram_used' => $this->prisma_diagram_used,
            'timeframe_from' => $this->timeframe_from,
            'timeframe_to' => $this->timeframe_to,
            'no_of_original_sources' => $this->no_of_original_sources,
            'systhesis_method_id' => $this->systhesis_method_id,
            'quantitative_map' => $this->quantitative_map,
            'scale_id' => $this->scale_id,
            'material_type_id' => $this->material_type_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'main_topic', $this->main_topic])
            ->andFilterWhere(['like', 'search_string', $this->search_string])
            ->andFilterWhere(['like', 'screening_criteria', $this->screening_criteria])
            ->andFilterWhere(['like', 'conclusions', $this->conclusions])
            ->andFilterWhere(['like', 'conflict_of_interest', $this->conflict_of_interest])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'qa_1', $this->qa_1])
            ->andFilterWhere(['like', 'qa_2', $this->qa_2])
            ->andFilterWhere(['like', 'qa_3', $this->qa_3])
            ->andFilterWhere(['like', 'qa_4', $this->qa_4])
            ->andFilterWhere(['like', 'qa_5', $this->qa_5])
            ->andFilterWhere(['like', 'qa_6', $this->qa_6])
            ->andFilterWhere(['like', 'qa_7', $this->qa_7])
            ->andFilterWhere(['like', 'qa_8', $this->qa_8])
            ->andFilterWhere(['like', 'qa_9', $this->qa_9])
            ->andFilterWhere(['like', 'qa_10', $this->qa_10])
            ->andFilterWhere(['like', 'qa_11', $this->qa_11])
            ->andFilterWhere(['like', 'qa_12', $this->qa_12]);

        return $dataProvider;
    }
}
