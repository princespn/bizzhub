<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:31 PM
 */

namespace common\models\query;

use common\models\ClientDataCategory;
//use common\models\ArticleCategory;
use yii\db\ActiveQuery;

class ClientDataCategoryQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function Active()
    {
        $this->andWhere(['{{%client_data_category}}.[[status]]' => ClientDataCategory::STATUS_ACTIVE]);
        return $this;
    }

    public function getAll()
    {
        $this->select([
            'YEAR(FROM_UNIXTIME({{%client_data_category}}.[[created_at]])) AS [[year]]',
            'MONTH(FROM_UNIXTIME({{%client_data_category}}.[[created_at]])) AS [[month]]',
            'COUNT(*) AS [[count]]'
        ]);
        $this->Active();
        $this->groupBy('[[year]], [[month]]');
        $this->orderBy('[[year]] DESC, [[month]] DESC');
        return $this;
    }
}
