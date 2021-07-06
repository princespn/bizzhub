<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:31 PM
 */

namespace common\models\query;

use common\models\ClientTemplate;
//use common\models\ArticleCategory;
use yii\db\ActiveQuery;

class ClientTemplateQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function Active()
    {
        $this->andWhere(['{{%client_template}}.[[status]]' => ClientTemplate::STATUS_ACTIVE]);
        return $this;
    }

    public function getAll()
    {
        $this->select([
            'YEAR(FROM_UNIXTIME({{%client_template}}.[[created_at]])) AS [[year]]',
            'MONTH(FROM_UNIXTIME({{%client_template}}.[[created_at]])) AS [[month]]',
            'COUNT(*) AS [[count]]'
        ]);
        $this->Active();
        $this->groupBy('[[year]], [[month]]');
        $this->orderBy('[[year]] DESC, [[month]] DESC');
        return $this;
    }
}
