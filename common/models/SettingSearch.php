<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Settings;

/**
 * ContactsSearch represents the model behind the search form about `common\models\Contacts`.
 */
class SettingSearch extends Settings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['input_type', 'input_key', 'display_name','value'], 'safe'],
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
        $query = Settings::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            //'status' => $this->status,
            //'updated_date' => $this->updated_date,
            //'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'input_key', $this->first_name])
            ->andFilterWhere(['like', 'display_name', $this->last_name])
            ->andFilterWhere(['like', 'input_type', $this->email])
            ->andFilterWhere(['like', 'value', $this->phone]);

        return $dataProvider;
    }
}
