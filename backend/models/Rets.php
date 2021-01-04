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
class Rets extends Model
{
    const STATUS_NOT_ACTIVE = 0;
    const STATUS_ACTIVE = 1;
    public $address;
    public $address_display;
    public $address_with_unit;
    public $city;
    public $state;
    public $zip;
    public $agent1_id;
    public $approval_status;
    public $brokerage_id;
    public $brokerage_name;
    public $brokerage_url;
    public $brokerage_website;
    public $building_bike_storage;
    public $building_class;
    public $building_doorman;
    public $building_elevator;
    public $rental_application;
    public $building_garage;
    public $building_gym;
    public $building_id;
    public $building_laundry;
    public $building_name;
    public $building_pets;
    public $building_pool;
    public $building_prewar;
    public $buildingr_rooftop;
    public $building_storage;
    public $coexclusive;
    public $commission_amount;
    public $courtyard;
    public $expiration_date;
    public $flip_fax_description;
    public $floor_number;
    public $garden;
    public $has_fireplace;
    public $has_outdoor_space;
    public $hoa_fee;
    public $home_offices;
    public $id_x_display;
    public $latitude;
    public $list_date;
    public $listing_price;
    public $listing_price_per_sqft;
    public $listing_url;
    public $live_in_super;
    public $longitude;
    public $marketing_description;
    public $marketing_description_truncated;
    public $maximum_financing_percent;
    public $neighborhood;
    public $new_development;
    public $num_baths;
    public $num_bedrooms;
    public $num_half_baths;
    public $num_rooms;
    public $num_building_units;
    public $num_building_stories;
    public $original_price;
    public $property_type;
    public $property_type_code;
    public $real_estate_tax;
    public $sale_or_rental;
    public $sponsored;
    public $status_code;
    public $status_last_changed;
    public $unit_balcony;
    public $unit_garden;
    public $unit_laundry;
    public $unit_number;
    public $updated_at;
    public $virtual_tour_url;
    public $vow_address_display;
    public $vow_automated_valuation_display;
    public $vow_consumer_comment;
    public $vow_entire_listing_display;
    public $year_built;
    public $dishwasher;
    public $den;
    public $foyer;
    public $rebny_id;
    public $published;
    public $place_name;
    public $vacant;
    public $rets_keys;
    public $assessment_no;
    public $video_url;
    public $external_link1;
    public $external_link2;
    public $description;
    public $created_at;



    public static function tableName()
    {
        return '{{rets_property}}';
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
            [['address','address_display','address_with_unit','agent1_id','approval_status','brokerage_id','brokerage_name','brokerage_url','brokerage_website','building_bike_storage','building_class','building_doorman','building_elevator','building_garage','building_gym','building_id','building_laundry','building_name','building_pets','building_pool','building_prewar','buildingr_rooftop','building_storage','city','coexclusive','commission_amount','courtyard','expiration_date','flip_fax_description','floor_number','garden','has_fireplace','has_outdoor_space','hoa_fee','home_offices','id_x_display','latitude','list_date','listing_price','listing_price_per_sqft','listing_url','live_in_super','longitude','marketing_description','marketing_description_truncated','maximum_financing_percent','neighborhood','new_development','num_baths','num_bedrooms','num_half_baths','num_rooms','num_building_units','num_building_stories','original_price','property_type','property_type_code','real_estate_tax','sale_or_rental','sponsored','state','status_code','status_last_changed','unit_balcony','unit_garden','unit_laundry','unit_number ','updated_at','virtual_tour_url','vow_address_display','vow_automated_valuation_display','vow_consumer_comment','vow_entire_listing_display','year_built','zip','dishwasher','den','foyer','rebny_id','published','place_name','created_at','vacant','rets_keys','assessment_no','video_url','external_link1','external_link2','description'], "safe"],
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
            'rets_keys' => Yii::t('backend', 'Keys'),
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
