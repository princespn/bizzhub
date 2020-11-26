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

    public function save($attributes)
    {
        if ($this->validate()) {
            $model = new buildings();
            $attributes['created_at'] = time();
            $table = self::tableName();
            Yii::$app->db->createCommand()
            ->insert($table,[$attributes])
            ->execute();
        }
        return null;
    }

    public function update($updateData)
    {
        $id = $_GET['id'];
        //print_r($updateData);die;
        $model = new DocumentCategory();
        $table = self::tableName();    
        if ($this->validate()) { 
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
