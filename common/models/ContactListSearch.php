<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ContactList;

/**
 * ContactListSearch represents the model behind the search form of `app\models\ContactList`.
 */
class ContactListSearch extends ContactList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status'], 'integer'],
            [['list_name', 'list_key', 'createddate', 'updateddate'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ContactList::find();

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
            'status' => $this->status,
            'createddate' => $this->createddate,
            'updateddate' => $this->updateddate,
        ]);

        $query->andFilterWhere(['like', 'list_name', $this->list_name])
            ->andFilterWhere(['like', 'list_key', $this->list_key]);
        if(!empty($this->user_id)){
            $query->andWhere(new \yii\db\Expression('FIND_IN_SET(:user_id,user_id)'))
            ->addParams([':user_id' => $this->user_id]);
        }

        return $dataProvider;
    }
}
