<?php

namespace backend\modules\client\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ClientData;

/**
 * ClientDataSearch represents the model behind the search form of `app\models\ClientData`.
 */
class ClientDataSearch extends ClientData
{
    /**
     * {@inheritdoc}
     */
    public $fromdate;
    public $todate;
    public function rules()
    {
        return [
            [['id', 'field_id', 'form_id', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['value'], 'safe'],
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
        $query = ClientData::find()->groupBy(['form_id']);

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
           // 'field_id' => $this->field_id,
           // 'form_id' => $this->form_id,
            //'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'value', $this->value]);

        if(isset($_REQUEST['ClientDataSearch']['user_id'])){
           $query->andFilterWhere(['like', 'client_data.user_id', $_REQUEST['ClientDataSearch']['user_id']]); 
            }

         if(isset($_REQUEST['ClientDataSearch']['form_id'])){
           $query->andFilterWhere(['like', 'client_data.form_id', $_REQUEST['ClientDataSearch']['form_id']]); 
            }

         if(isset($_REQUEST['ClientDataSearch']['field_id'])){
           $query->andFilterWhere(['like', 'client_data.field_id', $_REQUEST['ClientDataSearch']['field_id']]); 
            }

        return $dataProvider;
    }
}
