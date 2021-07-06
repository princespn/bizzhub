<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:31 PM
 */

namespace common\models\query;

use common\models\ClientDataForm;
//use common\models\ArticleCategory;
use yii\db\ActiveQuery;

class ClientDataFormQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function Active()
    {
        $this->andWhere(['{{%client_data_form}}.[[status]]' => ClientDataForm::STATUS_ACTIVE]);
        return $this;
    }

    public function getAll()
    {
        $this->select([
            'YEAR(FROM_UNIXTIME({{%client_data_form}}.[[created_at]])) AS [[year]]',
            'MONTH(FROM_UNIXTIME({{%client_data_form}}.[[created_at]])) AS [[month]]',
            'COUNT(*) AS [[count]]'
        ]);
        $this->Active();
        $this->groupBy('[[year]], [[month]]');
        $this->orderBy('[[year]] DESC, [[month]] DESC');
        return $this;
    }
}
