<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Rets form
 */
class Contacts extends Model
{
    const STATUS_NOT_ACTIVE = 0;
    const STATUS_ACTIVE = 1;
    //public $address;
    //public $address_display;
    //public $address_with_unit;



    public static function tableName()
    {
        return '{{contats}}';
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
            //[['address','city','state','zip'], 'required'],            ,
            [['followupboss_id','first_name','last_name','email','phone','status','created_date','updated_date'], "safe"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'first_name' => Yii::t('backend', 'First Name'),
            'last_name' => Yii::t('backend', 'Last Name'),
            'email' => Yii::t('backend', 'Email'),
            'phone' => Yii::t('backend', 'Phome'),
            'status' => Yii::t('backend', 'Status'),
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
            if(!empty($this->address)){
                $updateData['address']=$this->address;
            }
            if(!empty($this->city)){
                $updateData['city']=$this->city;
            }
            if(!empty($this->state)){
                $updateData['state']=$this->state;
            }
            if(!empty($this->zip)){
                $updateData['zip']=$this->zip;
            }
            if(!empty($this->address_with_unit)){
                $updateData['address_with_unit']=$this->address_with_unit;
            }
            if(!empty($this->approval_status)){
                $updateData['approval_status']=$this->approval_status;
            }
            if(!empty($this->brokerage_id)){
                $updateData['brokerage_id']=$this->brokerage_id;
            }
            if(!empty($this->brokerage_name)){
                $updateData['brokerage_name']=$this->brokerage_name;
            }
            if(!empty($this->brokerage_url)){
                $updateData['brokerage_url']=$this->brokerage_url;
            }
            if(!empty($this->brokerage_website)){
                $updateData['brokerage_website']=$this->brokerage_website;
            }
            if(!empty($this->building_id)){
                $updateData['building_id']=$this->building_id;
            }
            if(!empty($this->listing_price)){
                $updateData['listing_price']=$this->listing_price;
            }
            if(!empty($this->hoa_fee)){
                $updateData['hoa_fee']=$this->hoa_fee;
            }
            if(!empty($this->num_bedrooms)){
                $updateData['num_bedrooms']=$this->num_bedrooms;
            }
            if(!empty($this->property_type)){
                $updateData['property_type']=$this->property_type;
            }
            if(!empty($this->vacant)){
                $updateData['vacant']=$this->vacant;
            }
            if(!empty($this->rets_keys)){
                $updateData['rets_keys']=$this->rets_keys;
            }
            if(!empty($this->assessment_no)){
                $updateData['assessment_no']=$this->assessment_no;
            }
            if(!empty($this->building_pets)){
                $updateData['building_pets']=$this->building_pets;
            }
            if(!empty($this->maximum_financing_percent)){
                $updateData['maximum_financing_percent']=$this->maximum_financing_percent;
            }
            if(!empty($this->agent1_id)){
                $updateData['agent1_id']=$this->agent1_id;
            }
            if(!empty($this->video_url)){
                $updateData['video_url']=$this->video_url;
            }
            if(!empty($this->external_link1)){
                $updateData['external_link1']=$this->external_link1;
            }
            if(!empty($this->external_link2)){
                $updateData['external_link2']=$this->external_link2;
            }
            if(!empty($this->description)){
                $updateData['description']=$this->description;
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
