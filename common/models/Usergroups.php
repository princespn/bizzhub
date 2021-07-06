<?php

namespace common\models;

use Yii;


class Usergroups extends \yii\db\ActiveRecord
{
    public $name;
    public $usertype;

    public	$user,$user_all,$contact, $contact_all,$contactlist,$contactlist_all,$template,$template_all,$category,$category_all,$form,$form_all,$clientdata,$clientdata_all,$buildings,$buildings_all,$supports,$supports_all,$training,$training_all,$document,$document_all,$timelineevent,$timelineevent_list,$rets,$rets_all,$leaderboard,$leaderboard_all,$staticpage,$staticpage_all,$article,$article_all,$category1,$category1_all;
    

    public function rules()
    {
        return [
            //[['name'], 'required'],
            [['usertype'], 'string'],
            [['name'], 'string', 'max' => 200]
        ];
    }


    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'usertype' => 'User Access Type',
        ];
    }
}
