<?php

namespace common\models;


use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RbacAuthItem;
use app\webmodels\CommonModel;

/**
 * AuthItemSearch represents the model behind the search form about `app\models\AuthItem`.
 */
class UsergroupsSearch extends RbacAuthItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['id'], 'integer'],
            [['name', 'description'], 'safe'],
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
        $userDetails = yii::$app->user->identity;//->getContact();
		
         $query = RbacAuthItem::find()->where(['LIKE', 'name',''])
            ->andWhere(['type' => 1])
            ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['name' => SORT_DESC]],
            'pagination' => ['pageSize' => 10],
        ]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);


        return $dataProvider;
    }
}
