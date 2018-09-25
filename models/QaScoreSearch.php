<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QaScore;

/**
 * QaScoreSearch represents the model behind the search form about `app\models\QaScore`.
 */
class QaScoreSearch extends QaScore
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['qa_score', 'description', 'colour_code'], 'safe'],
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
        $query = QaScore::find();

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
        $query->andFilterWhere(['like', 'qa_score', $this->qa_score])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'colour_code', $this->colour_code]);

        return $dataProvider;
    }
}
