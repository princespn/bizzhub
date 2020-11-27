<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * Account form
 */
class Buildings extends Model
{
    const STATUS_NOT_ACTIVE = 0;
    const STATUS_ACTIVE = 1;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $legal_name;
    public $building_nickname;
    public $perchwell_link;
    public $purchase_application;
    public $offering_plan;
    public $amendments;
    public $house_rules;
    public $sublet_policy;
    public $covid_19_policy;
    public $sublet_application;
    public $rental_application;
    public $bulk_rate_offering;
    public $renovations;
    public $by_laws;
    public $lease_agreement;
    public $move_in_out;
    public $regulatory_agreement;
    public $flip_tax_policy;
    public $pet_policy;
    public $terrace_policy;
    public $storage_policy;
    public $financials_2019;
    public $financials_2018;
    public $financials_2017;
    public $financials_2016;
    public $financials_2015;
    public $financials_2014;
    public $operating_budget;
    public $fitness_center_policy;
    public $credit_report_form;
    public $annual_meeting_notes;
    public $handbook;
    public $subscription_agreement;
    public $refinance_application;
    public $updated_at;
    public $created_at;



    public static function tableName()
    {
        return '{{buildings}}';
    }


    public static function statuses()
    {
        return [            
            self::STATUS_ACTIVE => Yii::t('common', 'Active'),
            self::STATUS_NOT_ACTIVE => Yii::t('common', 'Not Active')
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address','city','state','zip'], 'required'],
            [['purchase_application','offering_plan','amendments','house_rules','sublet_policy','covid_19_policy','sublet_application','rental_application','bulk_rate_offering','renovations','by_laws', 'lease_agreement','move_in_out','regulatory_agreement', 'flip_tax_policy','pet_policy','terrace_policy','storage_policy','financials_2019','financials_2018','financials_2017','financials_2016','financials_2015','financials_2014','operating_budget','fitness_center_policy','credit_report_form','annual_meeting_notes','handbook','subscription_agreement','refinance_application'], 'file'],
            [['address','legal_name','building_nickname','perchwell_link','updated_at','created_at'], "safe"]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'address' => Yii::t('backend', 'Address'),
            'city' => Yii::t('backend', 'City'),
            'state' => Yii::t('backend', 'State'),
            'zip' => Yii::t('backend', 'Zip'),
            'legal_name' => Yii::t('backend', 'Legal Name'),
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
        $model = new Buildings();            
        if ($this->validate()) { 
            $updateData['address']=$this->address;
            $updateData['city']=$this->city;
            $updateData['state']=$this->state;
            $updateData['zip']=$this->zip;
            $updateData['legal_name']=$this->legal_name;
            $updateData['building_nickname']=$this->building_nickname;
            $updateData['perchwell_link']=$this->perchwell_link;
            $updateData['purchase_application']=$this->purchase_application;
            $updateData['offering_plan']=$this->offering_plan;
            $updateData['amendments']=$this->amendments;
            $updateData['house_rules']=$this->house_rules;
            $updateData['sublet_policy']=$this->sublet_policy;
            $updateData['covid_19_policy']=$this->covid_19_policy;
            $updateData['sublet_application']=$this->sublet_application;
            $updateData['rental_application']=$this->rental_application;
            $updateData['bulk_rate_offering']=$this->bulk_rate_offering;
            $updateData['renovations']=$this->renovations;
            $updateData['by_laws']=$this->by_laws;
            $updateData['lease_agreement']=$this->lease_agreement;
            $updateData['move_in_out']=$this->move_in_out;
            $updateData['regulatory_agreement']=$this->regulatory_agreement;
            $updateData['flip_tax_policy']=$this->flip_tax_policy;
            $updateData['pet_policy']=$this->pet_policy;
            $updateData['terrace_policy']=$this->terrace_policy;
            $updateData['storage_policy']=$this->storage_policy;
            $updateData['financials_2019']=$this->financials_2019;
            $updateData['financials_2018']=$this->financials_2018;
            $updateData['financials_2017']=$this->financials_2017;
            $updateData['financials_2016']=$this->financials_2016;
            $updateData['financials_2015']=$this->financials_2015;
            $updateData['financials_2014']=$this->financials_2014;
            $updateData['operating_budget']=$this->operating_budget;
            $updateData['fitness_center_policy']=$this->fitness_center_policy;
            $updateData['credit_report_form']=$this->credit_report_form;
            $updateData['annual_meeting_notes']=$this->annual_meeting_notes;
            $updateData['handbook']=$this->handbook;
            $updateData['subscription_agreement']=$this->subscription_agreement;
            $updateData['refinance_application']=$this->refinance_application;
            $updateData['updated_at'] = time();
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
