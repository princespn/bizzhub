<?php

namespace frontend\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;
use yii\db\ActiveQuery;
use app\components\Defaults;
use yii\db\Query;
use yii\base\Exception;
use yii\helpers\Url;


/**
 * ArticleSearch represents the model behind the search form about `common\models\Article`.
 */
class Document extends Model
{
    public $id;
    public $file_path;
    public $doc_name;




    public static function tableName()
    {
        return '{{%document}}';
    }

   


    public function getuserByRole($role)
    {

        $agent = [];
        $agent = (new \yii\db\Query())
            ->select(['id', 'username'])
            ->from('user a')
            ->leftJoin('rbac_auth_assignment b', 'a.id = b.user_id')
            ->where(['b.item_name' => $role])
            ->All();
        return $agent;
    }

    public function getCategory()
    {
        $category = [];
        $category = (new \yii\db\Query())
                    ->select(['id', 'title'])
                    ->from('document_category')
                    ->where(['status' => 1])
                    ->All();
        return $category;
    }

    public function getDocument()
    {
        $document = [];
        $document = (new \yii\db\Query())
                    ->select('*')
                    ->from('document')
                    ->where(['status' => 1])
                    ->All();
        return $document;
    }

    public function getDocumentData(){
        $data = [];
        $query = new Query;
        $query  ->select([
                'document.*','document_category.*']
                )  
                ->from('document')
                ->join('LEFT JOIN', 'document_category',
                    'document_category.id =document.category'); 
                
        $command = $query->createCommand();
        $data = $command->queryAll();
        return $data;
    }
}
