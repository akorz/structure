<?php

namespace backend\models\search;

use common\models\Taxonomy;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Term;

/**
 * TermSearch represents the model behind the search form of `backend\models\Term`.
 */
class TermSearch extends Term
{
    public $taxonomy_name;
    public $parent_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order', 'deleted'], 'integer'],
            [['name', 'taxonomy_name', 'parent_name'], 'safe'],
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
        $query = Term::find();

        $query->joinWith(['taxonomy', 'parent p']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'defaultOrder' => ['id' => SORT_DESC],
                    'taxonomy_name' => [
                        'asc' => ['taxonomy.name' => SORT_ASC],
                        'desc' => ['taxonomy.name' => SORT_DESC],
                    ],
                    'parent_name' => [
                        'asc' => ['p.name' => SORT_ASC],
                        'desc' => ['p.name' => SORT_DESC],
                    ],
                    'name' => [
                        'asc' => ['name' => SORT_ASC],
                        'desc' => ['name' => SORT_DESC],
                    ],
                    'order' => [
                        'asc' => ['order' => SORT_ASC],
                        'desc' => ['order' => SORT_DESC],
                    ],
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            Term::tableName() . '.id' => $this->id,
            Term::tableName() . '.order' => $this->order,
            Term::tableName() . '.deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', Term::tableName() . '.name', $this->name]);
        $query->andFilterWhere(['like', 'taxonomy.name', $this->taxonomy_name]);
        $query->andFilterWhere(['like', 'p.name', $this->parent_name]);

        return $dataProvider;
    }
}
