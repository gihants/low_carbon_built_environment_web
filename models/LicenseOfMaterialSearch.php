<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LicenseOfMaterial;

/**
 * LicenseOfMaterialSearch represents the model behind the search form about `app\models\LicenseOfMaterial`.
 */
class LicenseOfMaterialSearch extends LicenseOfMaterial
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id'], 'integer'],
            [['license_type', 'license_no'], 'safe'],
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
        $query = LicenseOfMaterial::find();

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
            'material_id' => $this->material_id,
        ]);

        $query->andFilterWhere(['like', 'license_type', $this->license_type])
            ->andFilterWhere(['like', 'license_no', $this->license_no]);

        return $dataProvider;
    }
}
