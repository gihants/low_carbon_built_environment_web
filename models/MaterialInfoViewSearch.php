<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaterialInfoView;

/**
 * MaterialInfoViewSearch represents the model behind the search form about `app\models\MaterialInfoView`.
 */
class MaterialInfoViewSearch extends MaterialInfoView
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'georaphically_focussed', 'prisma_diagram_used', 'number_of_original_sources', 'quantitative_map_included', 'peer_reviewed'], 'integer'],
            [['material_key', 'Authors', 'quality_index', 'quality_index_comment', 'risk_level', 'risk_level_comment', 'actual_review_type', 'title', 'year', 'review_type', 'main_topic', 'study_focus_starts', 'study_focus_ends', 'screening_criteria', 'search_string', 'synthesis_method', 'comclusions', 'conflicts_of_interest', 'comments', 'scale', 'material_type', 'material_category', 'language', 'chapter_or_part', 'conference_date', 'conference_venue', 'published_date', 'edition', 'issue', 'journal', 'pagination', 'publication_place', 'publisher', 'school_department_or_centre', 'series_sort_no', 'series_title', 'series_volume_no', 'volume', 'website_owner'], 'safe'],
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
        $query = MaterialInfoView::find();

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
            'georaphically_focussed' => $this->georaphically_focussed,
            'prisma_diagram_used' => $this->prisma_diagram_used,
            'study_focus_starts' => $this->study_focus_starts,
            'study_focus_ends' => $this->study_focus_ends,
            'number_of_original_sources' => $this->number_of_original_sources,
            'quantitative_map_included' => $this->quantitative_map_included,
            'conference_date' => $this->conference_date,
            'published_date' => $this->published_date,
            'peer_reviewed' => $this->peer_reviewed,
        ]);

        $query->andFilterWhere(['like', 'material_key', $this->material_key])
            ->andFilterWhere(['like', 'Authors', $this->Authors])
            ->andFilterWhere(['like', 'quality_index', $this->quality_index])
            ->andFilterWhere(['like', 'quality_index_comment', $this->quality_index_comment])
            ->andFilterWhere(['like', 'risk_level', $this->risk_level])
            ->andFilterWhere(['like', 'risk_level_comment', $this->risk_level_comment])
            ->andFilterWhere(['like', 'actual_review_type', $this->actual_review_type])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'review_type', $this->review_type])
            ->andFilterWhere(['like', 'main_topic', $this->main_topic])
            ->andFilterWhere(['like', 'screening_criteria', $this->screening_criteria])
            ->andFilterWhere(['like', 'search_string', $this->search_string])
            ->andFilterWhere(['like', 'synthesis_method', $this->synthesis_method])
            ->andFilterWhere(['like', 'comclusions', $this->comclusions])
            ->andFilterWhere(['like', 'conflicts_of_interest', $this->conflicts_of_interest])
            ->andFilterWhere(['like', 'comments', $this->comments])
            ->andFilterWhere(['like', 'scale', $this->scale])
            ->andFilterWhere(['like', 'material_type', $this->material_type])
            ->andFilterWhere(['like', 'material_category', $this->material_category])
            ->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'chapter_or_part', $this->chapter_or_part])
            ->andFilterWhere(['like', 'conference_venue', $this->conference_venue])
            ->andFilterWhere(['like', 'edition', $this->edition])
            ->andFilterWhere(['like', 'issue', $this->issue])
            ->andFilterWhere(['like', 'journal', $this->journal])
            ->andFilterWhere(['like', 'pagination', $this->pagination])
            ->andFilterWhere(['like', 'publication_place', $this->publication_place])
            ->andFilterWhere(['like', 'publisher', $this->publisher])
            ->andFilterWhere(['like', 'school_department_or_centre', $this->school_department_or_centre])
            ->andFilterWhere(['like', 'series_sort_no', $this->series_sort_no])
            ->andFilterWhere(['like', 'series_title', $this->series_title])
            ->andFilterWhere(['like', 'series_volume_no', $this->series_volume_no])
            ->andFilterWhere(['like', 'volume', $this->volume])
            ->andFilterWhere(['like', 'website_owner', $this->website_owner]);

        return $dataProvider;
    }
}
