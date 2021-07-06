<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * Rets form
 */
class Leaderboard extends Model
{
    public $csv_file;
    public $rank;
    public $agent_name;
    public $commitment;
    public $in_contract;
    public $contract_volume;
    public $closed_deals;
    public $closed_volume;
    public $c_set_score;
    public $zillow_reviews;
    public $created_at;



    public static function tableName()
    {
        return '{{leaderboard}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agent_name'], 'required'],
            [['rank','agent_name','commitment','in_contract','contract_volume','closed_deals','closed_volume','c_set_score','zillow_reviews','created_at'], "safe"]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'rank' => Yii::t('backend', 'Rank'),
            'agent_name' => Yii::t('backend', 'Agent Name'),
            'commitment' => Yii::t('backend', 'Commitment'),
            'in_contract' => Yii::t('backend', 'In Contract'),
            'contract_volume' => Yii::t('backend', 'Contract Volume'),
            'closed_deals' => Yii::t('backend', 'Closed Deals'),
            'c_set_score' => Yii::t('backend', 'C SET Score'),
            'zillow_reviews' => Yii::t('backend', 'Zillow Reviews'),
        ];
    }

    public function save()
    {
        //print_r($this);die;
        $model = new buildings();
        if ($this->validate()) {            
            $insertData['address']=$this->address;
            $insertData['city']=$this->city;
            $insertData['state']=$this->state;
            $insertData['zip']=$this->zip;
            $insertData['legal_name']=$this->legal_name;
            $insertData['building_nickname']=$this->building_nickname;
            $insertData['perchwell_link']=$this->perchwell_link;
            $insertData['purchase_application']=$this->purchase_application;
            $insertData['offering_plan']=$this->offering_plan;
            $insertData['amendments']=$this->amendments;
            $insertData['house_rules']=$this->house_rules;
            $insertData['sublet_policy']=$this->sublet_policy;
            $insertData['covid_19_policy']=$this->covid_19_policy;
            $insertData['sublet_application']=$this->sublet_application;
            $insertData['rental_application']=$this->rental_application;
            $insertData['bulk_rate_offering']=$this->bulk_rate_offering;
            $insertData['renovations']=$this->renovations;
            $insertData['by_laws']=$this->by_laws;
            $insertData['lease_agreement']=$this->lease_agreement;
            $insertData['move_in_out']=$this->move_in_out;
            $insertData['regulatory_agreement']=$this->regulatory_agreement;
            $insertData['flip_tax_policy']=$this->flip_tax_policy;
            $insertData['pet_policy']=$this->pet_policy;
            $insertData['terrace_policy']=$this->terrace_policy;
            $insertData['storage_policy']=$this->storage_policy;
            $insertData['financials_2019']=$this->financials_2019;
            $insertData['financials_2018']=$this->financials_2018;
            $insertData['financials_2017']=$this->financials_2017;
            $insertData['financials_2016']=$this->financials_2016;
            $insertData['financials_2015']=$this->financials_2015;
            $insertData['financials_2014']=$this->financials_2014;
            $insertData['operating_budget']=$this->operating_budget;
            $insertData['fitness_center_policy']=$this->fitness_center_policy;
            $insertData['credit_report_form']=$this->credit_report_form;
            $insertData['annual_meeting_notes']=$this->annual_meeting_notes;
            $insertData['handbook']=$this->handbook;
            $insertData['subscription_agreement']=$this->subscription_agreement;
            $insertData['refinance_application']=$this->refinance_application;
            $insertData['created_at'] = time();
            //print_r($insertData);die;
            $table = self::tableName();
            Yii::$app->db->createCommand()
            ->insert($table,$insertData)
            ->execute();
        }
        return null;
    }

    public function update()
    {
        $id = $_GET['id'];
        $model = new self();            
        if ($this->validate()) { 
            if(!empty($this->rank)){
                $updateData['rank']=$this->rank;
            }
            if(!empty($this->agent_name)){
                $updateData['agent_name']=$this->agent_name;
            }
            if(!empty($this->commitment)){
                $updateData['commitment']=$this->commitment;
            }
            if(!empty($this->in_contract)){
                $updateData['in_contract']=$this->in_contract;
            }
            if(!empty($this->contract_volume)){
                $updateData['contract_volume']=$this->contract_volume;
            }
            if(!empty($this->closed_deals)){
                $updateData['closed_deals']=$this->closed_deals;
            }
            if(!empty($this->closed_volume)){
                $updateData['closed_volume']=$this->closed_volume;
            }
            if(!empty($this->c_set_score)){
                $updateData['c_set_score']=$this->c_set_score;
            }
            if(!empty($this->zillow_reviews)){
                $updateData['zillow_reviews']=$this->zillow_reviews;
            }            
            //print_r($updateData);die;
            //$updateData['updated_at'] = time();
            $table = self::tableName();
            Yii::$app->db->createCommand()
             ->update($table, $updateData,['id' => $id])
             ->execute();   
            return !$model->hasErrors();
        }
        return null;
    }


    public function getDataById($id)
    {
        //die('dddd');
        $data = [];
        $table = $this->tableName();
        $data = (new \yii\db\Query())
            ->select(['*'])
            ->from($table)
            ->where(['id' => $id])
            ->one();
        return $data;
    }

    public function deleteById($id)
    {
        $table = $this->tableName();
        Yii::$app->db->createCommand()
            ->delete($table, ['id' => $id])
            ->execute();

        return ;
    }
}
