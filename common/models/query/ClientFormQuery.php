<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:31 PM
 */

namespace common\models\query;

use common\models\ClientForm;
//use common\models\ArticleCategory;
use yii\db\ActiveQuery;

class ClientFormQuery extends ActiveQuery
{
    /**
     * @return $this
     */
    public function Active()
    {
        $this->andWhere(['{{%client_form_fields}}.[[status]]' => ClientForm::STATUS_ACTIVE]);
        return $this;
    }

    public function getAll()
    {
        $this->select([
            'YEAR(FROM_UNIXTIME({{%client_form_fields}}.[[created_at]])) AS [[year]]',
            'MONTH(FROM_UNIXTIME({{%client_form_fields}}.[[created_at]])) AS [[month]]',
            'COUNT(*) AS [[count]]'
        ]);
        $this->Active();
        $this->groupBy('[[year]], [[month]]');
        $this->orderBy('[[year]] DESC, [[month]] DESC');
        return $this;
    }
}
