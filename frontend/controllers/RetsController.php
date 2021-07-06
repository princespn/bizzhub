<?php
/**
 * Created by WDP.
 * User: Dharmraj
 * Date: 29/12/20
 * Time: 10:01 AM
 */

namespace frontend\controllers;

use frontend\models\UserForm;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Url;
use common\models\Settings;
use yii\helpers\BaseFileHelper;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class RetsController extends Controller
{
   
    public function actionGetRetsdata()
    {   
        
        $settingmodel = new Settings();
        $settings = $settingmodel->getsetting();
        //print_r($settings);die;
        $rets_login_url = $settings['rets_login_url']['value'];
        $rets_username = $settings['rets_username']['value'];
        $rets_password = $settings['rets_password']['value'];
        $rets_user_agent_password = '';

        date_default_timezone_set('America/New_York');
        $config = new \PHRETS\Configuration;
        $config->setLoginUrl($rets_login_url)
                ->setUsername($rets_username)
                ->setPassword($rets_password)
                ->setRetsVersion('1.7.2');

        $config->setUserAgent('PHRETS/2.0');
        $config->setHttpAuthenticationMethod('basic');
        $rets = new \PHRETS\Session($config);
        $connect = $rets->Login();

        //$results = $rets->Search('Listing', 'Listing', "(BrokerageID=2528),(StatusCode=100),(SaleOrRental=S)", [
        $results = $rets->Search('Listing', 'Listing', "(BrokerageID=2528),(StatusCode=100)", [
                'QueryType' => 'DMQL2',
                'Count' => 1,
                'Format' => 'COMPACT-DECODED',
                'Limit' => 99999,
                'StandardNames' => 1
            ]);
        /*$dataArray = $results->toArray();
        foreach($dataArray as $key => $v_array){
            $agent = $rets->Search('Agent', 'Agent', "(Id=".$v_array['Agent1Id'].")", [
                'QueryType' => 'DMQL2',
                'Count' => 1,
                'Format' => 'COMPACT-DECODED',
                'Limit' => 99999,
                'StandardNames' => 1
            ]);
            $agentData= $agent->toArray();
            $agentDataArray['email']= $agentData[0]['Email'];                      
        }*/
        // print_r($agentData);die;
        // $agentdata = $agent->toJSON();
        // $path = Yii::$app->params['rets_path'];
        // $agentfullpath = $path.'rets_agent.json';
        // $afp = fopen($agentfullpath, 'w+');
        // fwrite($afp, $agentdata);
        // fclose($afp);
        $data = $results->toJSON();
        $path = Yii::$app->params['rets_path'];
        $fullpath = $path.'rets.json';
        $fp = fopen($fullpath, 'w+');
        fwrite($fp, $data);
        fclose($fp);


    }




    public function actionGetRetsfiledata()
    {
        $http = Yii::$app->params['http'];
        $base_url = Url::base($http);
        $path = Yii::$app->params['rets_path'];
        $fullpath = $path.'rets.json';
        if (file_exists($fullpath)) {
            $jsonData = file_get_contents($fullpath);
            $dataArr = json_decode($jsonData);
            //print_r($dataArr);die('sfffff');
            foreach($dataArr as $propertyData) {
                if(!empty($propertyData->ImageListOriginal)){
                    $originalImaageArr = explode(',', $propertyData->ImageListOriginal);
                    $pathOriginal = $path.'/propery_image/original/';
                    $pathLarge = $path.'/propery_image/large/';
                    $image_base_url = $base_url.'/storage/web/rets/propery_image/';
                    if (!is_dir($pathOriginal)) {
                        BaseFileHelper::createDirectory($pathOriginal,0777,true);
                    }
                    if(!empty($propertyData->ImageListLarge)){
                        if (!is_dir($pathLarge)) {
                            BaseFileHelper::createDirectory($pathLarge,0777,true);
                        }
                        $largeImaageArr=explode(',', $propertyData->ImageListLarge);
                        foreach($largeImaageArr as $lkey => $l_i_image){
                            $li_path_info = pathinfo($l_i_image);
                            $liextension = strtok($li_path_info['extension'], '?');
                            $l_i_full_path = $pathLarge.$li_path_info['filename'].'.'.$liextension;
                            if(!file_exists($l_i_full_path)){                      
                                copy($l_i_image,$l_i_full_path);
                            }
                        }
                    }                    
                    foreach($originalImaageArr as $okey => $o_i_image){
                        $path_info = pathinfo($o_i_image);
                        $extension = strtok($path_info['extension'], '?');
                        $o_i_full_path = $pathOriginal.$path_info['filename'].'.'.$extension;                        
                        $o_i_path = $path_info['filename'].'.'.$extension;
                        if(!file_exists($o_i_full_path)){         
                            copy($o_i_image,$o_i_full_path);
                        }
                        $img_pathArr[$okey]=['base_url'=>$pathOriginal,'path'=>$o_i_path];
                    }
                }
                $saveData['address'] = !empty($propertyData->Address)?$propertyData->Address:'';
                $saveData['address_display'] = !empty($propertyData->AddressDisplay)?$propertyData->AddressDisplay:'';
                $saveData['address_with_unit'] = !empty($propertyData->AddressWithUnit)?$propertyData->AddressWithUnit:'';
                $saveData['agent1_id'] = !empty($propertyData->Agent1Id)?$propertyData->Agent1Id:'';
                $saveData['agent1_image'] = !empty($propertyData->Agent1Image)?$propertyData->Agent1Image:'';
                $saveData['approval_status'] = !empty($propertyData->ApprovalStatus)?$propertyData->ApprovalStatus:'';
                $saveData['brokerage_id'] = !empty($propertyData->BrokerageID)?$propertyData->BrokerageID:'';
                $saveData['brokerage_name'] = !empty($propertyData->BrokerageName)?$propertyData->BrokerageName:'';
                $saveData['brokerage_url'] = !empty($propertyData->BrokerageUrl)?$propertyData->BrokerageUrl:'';
                $saveData['brokerage_website'] = !empty($propertyData->BrokerageWebsite)?$propertyData->BrokerageWebsite:'';
                $saveData['building_bike_storage'] = !empty($propertyData->BuildingBikeStorage)?$propertyData->BuildingBikeStorage:'';
                $saveData['building_class'] = !empty($propertyData->BuildingClass)?$propertyData->BuildingClass:'';
                $saveData['building_doorman'] = !empty($propertyData->BuildingDoorman)?$propertyData->BuildingDoorman:'';
                $saveData['building_elevator'] = !empty($propertyData->BuildingElevator)?$propertyData->BuildingElevator:'';
                $saveData['building_garage'] = !empty($propertyData->BuildingGarage)?$propertyData->BuildingGarage:'';
                $saveData['building_gym'] = !empty($propertyData->BuildingGym)?$propertyData->BuildingGym:'';
                $saveData['building_id'] = !empty($propertyData->BuildingId)?$propertyData->BuildingId:'';
                $saveData['building_laundry'] = !empty($propertyData->BuildingLaundry)?$propertyData->BuildingLaundry:'';
                $saveData['building_name'] = !empty($propertyData->BuildingName)?$propertyData->BuildingName:'';
                $saveData['building_pets'] = !empty($propertyData->BuildingPets)?$propertyData->BuildingPets:'';
                $saveData['building_pool'] = !empty($propertyData->BuildingPool)?$propertyData->BuildingPool:'';
                $saveData['building_prewar'] = !empty($propertyData->BuildingPrewar)?$propertyData->BuildingPrewar:'';
                $saveData['buildingr_rooftop'] = !empty($propertyData->BuildingRooftop)?$propertyData->BuildingRooftop:'';
                $saveData['building_storage'] = !empty($propertyData->BuildingStorage)?$propertyData->BuildingStorage:'';
                $saveData['city'] = !empty($propertyData->City)?$propertyData->City:'';
                $saveData['coexclusive'] = !empty($propertyData->Coexclusive)?$propertyData->Coexclusive:'';
                $saveData['commission_amount'] = !empty($propertyData->CommissionAmount)?$propertyData->CommissionAmount:'';
                $saveData['courtyard'] = !empty($propertyData->Courtyard)?$propertyData->Courtyard:'';
                $saveData['expiration_date'] = !empty($propertyData->ExpirationDate)?strtotime($propertyData->ExpirationDate):'';
                $saveData['flip_fax_description'] = !empty($propertyData->FlipTaxDescription)?$propertyData->FlipTaxDescription:'';
                $saveData['floor_number'] = !empty($propertyData->FloorNumber)?$propertyData->FloorNumber:'';
                $saveData['garden'] = !empty($propertyData->Garden)?$propertyData->Garden:'';
                $saveData['has_fireplace'] = !empty($propertyData->HasFireplace)?$propertyData->HasFireplace:'';
                $saveData['has_outdoor_space'] = !empty($propertyData->HasOutdoorSpace)?$propertyData->HasOutdoorSpace:'';
                $saveData['hoa_fee'] = !empty($propertyData->HoaFee)?$propertyData->HoaFee:'';
                $saveData['home_offices'] = !empty($propertyData->HomeOffices)?$propertyData->HomeOffices:'';
                $saveData['id_x_display'] = !empty($propertyData->IDXDisplay)?$propertyData->IDXDisplay:'';
                $saveData['latitude'] = !empty($propertyData->Latitude)?$propertyData->Latitude:'';
                $saveData['list_date'] = !empty($propertyData->ListDate)?strtotime($propertyData->ListDate):'';
                $saveData['listing_price'] = !empty($propertyData->ListingPrice)?$propertyData->ListingPrice:'';
                $saveData['listing_price_per_sqft'] = !empty($propertyData->ListingPricePerSqft)?$propertyData->ListingPricePerSqft:'';
                $saveData['listing_url'] = !empty($propertyData->ListingUrl)?$propertyData->ListingUrl:'';
                $saveData['live_in_super'] = !empty($propertyData->LiveInSuper)?$propertyData->LiveInSuper:'';
                $saveData['longitude'] = !empty($propertyData->Longitude)?$propertyData->Longitude:'';
                $saveData['marketing_description'] = !empty($propertyData->MarketingDescription)?$propertyData->MarketingDescription:'';
                $saveData['marketing_description_truncated'] = !empty($propertyData->BrokerageUrl)?$propertyData->BrokerageUrl:'';
                $saveData['maximum_financing_percent'] = !empty($propertyData->MarketingDescriptionTruncated)?$propertyData->MarketingDescriptionTruncated:'';
                $saveData['maximum_financing_percent'] = !empty($propertyData->MaximumFinancingPercent)?$propertyData->MaximumFinancingPercent:'';
                $saveData['neighborhood'] = !empty($propertyData->Neighborhood)?$propertyData->Neighborhood:'';
                $saveData['new_development'] = !empty($propertyData->NewDevelopment)?$propertyData->NewDevelopment:'';
                $saveData['num_baths'] = !empty($propertyData->NumBaths)?$propertyData->NumBaths:'';
                $saveData['num_bedrooms'] = !empty($propertyData->NumBedrooms)?$propertyData->NumBedrooms:'';
                $saveData['num_half_baths'] = !empty($propertyData->NumHalfBaths)?$propertyData->NumHalfBaths:'';
                $saveData['num_rooms'] = !empty($propertyData->NumRooms)?$propertyData->NumRooms:'';
                $saveData['num_building_units'] = !empty($propertyData->NumBuildingUnits)?$propertyData->NumBuildingUnits:'';
                $saveData['num_building_stories'] = !empty($propertyData->NumBuildingStories)?$propertyData->NumBuildingStories:'';
                $saveData['original_price'] = !empty($propertyData->OriginalPrice)?$propertyData->OriginalPrice:'';
                $saveData['property_type'] = !empty($propertyData->PropertyType)?$propertyData->PropertyType:'';
                $saveData['property_type_code'] = !empty($propertyData->PropertyTypeCode)?$propertyData->PropertyTypeCode:'';
                $saveData['real_estate_tax'] = !empty($propertyData->RealEstateTax)?$propertyData->RealEstateTax:'';
                $saveData['sale_or_rental'] = !empty($propertyData->SaleOrRental)?$propertyData->SaleOrRental:'';
                $saveData['sponsored'] = !empty($propertyData->Sponsored)?$propertyData->Sponsored:'';
                $saveData['state'] = !empty($propertyData->State)?$propertyData->State:'';
                $saveData['status_code'] = !empty($propertyData->StatusCode)?$propertyData->StatusCode:'';
                $saveData['status_last_changed'] = !empty($propertyData->StatusLastChanged)?strtotime($propertyData->StatusLastChanged):'';
                $saveData['unit_balcony'] = !empty($propertyData->UnitBalcony)?$propertyData->UnitBalcony:'';
                $saveData['unit_garden'] = !empty($propertyData->UnitGarden)?$propertyData->UnitGarden:'';
                $saveData['unit_laundry'] = !empty($propertyData->UnitLaundry)?$propertyData->UnitLaundry:'';
                $saveData['unit_number'] = !empty($propertyData->UnitNumber)?$propertyData->UnitNumber:'';
                $saveData['updated_at'] = !empty($propertyData->UpdatedAt)?strtotime($propertyData->UpdatedAt):'';
                $saveData['virtual_tour_url'] = !empty($propertyData->VirtualTourURL)?$propertyData->VirtualTourURL:'';
                $saveData['vow_address_display'] = !empty($propertyData->VOWAddressDisplay)?$propertyData->VOWAddressDisplay:'';
                $saveData['vow_automated_valuation_display'] = !empty($propertyData->VOWAutomatedValuationDisplay)?$propertyData->VOWAutomatedValuationDisplay:'';
                $saveData['vow_consumer_comment'] = !empty($propertyData->VOWConsumerComment)?$propertyData->VOWConsumerComment:'';
                $saveData['vow_entire_listing_display'] = !empty($propertyData->VOWEntireListingDisplay)?$propertyData->VOWEntireListingDisplay:'';
                $saveData['year_built'] = !empty($propertyData->YearBuilt)?$propertyData->YearBuilt:'';
                $saveData['zip'] = !empty($propertyData->Zip)?$propertyData->Zip:'';
                $saveData['dishwasher'] = !empty($propertyData->Dishwasher)?$propertyData->Dishwasher:'';
                $saveData['den'] = !empty($propertyData->Den)?$propertyData->Den:'';
                $saveData['foyer'] = !empty($propertyData->Foyer)?$propertyData->Foyer:'';
                $saveData['rebny_id'] = !empty($propertyData->RebnyID)?$propertyData->RebnyID:'';
                $saveData['published'] = !empty($propertyData->Published)?$propertyData->Published:'';
                $saveData['place_name'] = !empty($propertyData->PlaceName)?$propertyData->PlaceName:'';
                $saveData['video_url'] = !empty($propertyData->VideoURL)?$propertyData->VideoURL:'';
                $saveData['created_at'] = !empty($propertyData->CreatedAt)?strtotime($propertyData->CreatedAt):'';
                $rets_property_tbl = 'rets_property';
                $existdata_id = (new \yii\db\Query())
                        ->select(['id'])
                        ->from($rets_property_tbl)
                        ->where(['address_with_unit' => $saveData['address_with_unit']])
                        ->Scalar();
                //print_r($existdata_id);die;  
                //echo $existdata_id.'<br>';     
                if(!empty($existdata_id)){
                    Yii::$app->db->createCommand()
                     ->update($rets_property_tbl, $saveData,['id' => $existdata_id])
                     ->execute();
                    if(!empty($img_pathArr)){
                        foreach($img_pathArr as $imgArr){
                            $exist_img_id = (new \yii\db\Query())
                                ->select(['id'])
                                ->from('rets_property_image')
                                ->where(['property_id' => $existdata_id,'path'=>$imgArr['path']])
                                ->Scalar();
                            if(empty($exist_img_id)){
                                $imgArr['property_id'] = $existdata_id;
                                Yii::$app->db->createCommand()
                                    ->insert('rets_property_image',$imgArr)
                                    ->execute();
                            }    

                        }
                    }   
                }else{
                    Yii::$app->db->createCommand()
                        ->insert($rets_property_tbl,$saveData)
                        ->execute();
                    $property_id = (new \yii\db\Query())
                        ->select(['id'])
                        ->from($rets_property_tbl)
                        ->where(['address_with_unit' => $saveData['address_with_unit']])
                        ->Scalar();    
                    if(!empty($img_pathArr)){
                        foreach($img_pathArr as $imgArr){
                            $exist_img_id = (new \yii\db\Query())
                                ->select(['id'])
                                ->from('rets_property_image')
                                ->where(['property_id' => $property_id,'path'=>$imgArr['path']])
                                ->Scalar();
                            if(empty($exist_img_id)){
                                $imgArr['property_id'] = $property_id;
                                Yii::$app->db->createCommand()
                                    ->insert('rets_property_image',$imgArr)
                                    ->execute();
                            }    

                        }
                    }     
                }
            }        
            
        } else {
            exit('Failed to open rets.json.');
        }
    }


    function sluggify($url)
    {
        # Prep string with some basic normalization
        $url = strtolower($url);
        $url = strip_tags($url);
        $url = stripslashes($url);
        $url = html_entity_decode($url);

        # Remove quotes (can't, etc.)
        $url = str_replace('\'', '', $url);

        # Replace non-alpha numeric with hyphens
        $match = '/[^a-z0-9]+/';
        $replace = '-';
        $url = preg_replace($match, $replace, $url);

        $url = trim($url, '-');
        $existslug_id = (new \yii\db\Query())
        ->select(['id'])
        ->from('property')
        ->where(['slug' => $url])
        ->all();
        if(!empty($existslug_id)){
            $url = $url.'-'.count($existslug_id);
        }

        return $url;
    } 


    public function actionGetRetsAgent()
    {
        $settingmodel = new Settings();
        $settings = $settingmodel->getsetting();
        //print_r($settings);die;
        $rets_login_url = $settings['rets_login_url']['value'];
        $rets_username = $settings['rets_username']['value'];
        $rets_password = $settings['rets_password']['value'];
        $rets_user_agent_password = '';

        date_default_timezone_set('America/New_York');
        $config = new \PHRETS\Configuration;
        $config->setLoginUrl($rets_login_url)
                ->setUsername($rets_username)
                ->setPassword($rets_password)
                ->setRetsVersion('1.7.2');

        $config->setUserAgent('PHRETS/2.0');
        $config->setHttpAuthenticationMethod('basic');
        $rets = new \PHRETS\Session($config);
        $connect = $rets->Login();

        //$results = $rets->Search('Listing', 'Listing', "(BrokerageID=2528),(StatusCode=100),(SaleOrRental=S)", [
        $results = $rets->Search('Agent', 'Agent', "(BrokerageID=2528)", [
                'QueryType' => 'DMQL2',
                'Count' => 1,
                'Format' => 'COMPACT-DECODED',
                'Limit' => 99999,
                'StandardNames' => 1
            ]);
        $data = $results->toJSON();
        $path = Yii::$app->params['rets_path'];
        if(!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $fullpath = $path.'rets_agent.json';
        $fp = fopen($fullpath, 'w+');
        fwrite($fp, $data);
        fclose($fp);

    }

    public function actionImportAgentData()
    {
        $path = Yii::$app->params['rets_path'];
        $fullpath = $path.'rets_agent.json';
        if (file_exists($fullpath)) {
            $jsonData = file_get_contents($fullpath);
            $dataArr = json_decode($jsonData);
            //print_r($dataArr);die;
            foreach($dataArr as $agentData) {
                $imageArr = [];
                $agent['status'] = !empty($agentData->Active)?$agentData->Active:0; 
                $agent['full_bio'] = !empty($agentData->Bio)?$agentData->Bio:''; 
                $agent['brokerage_id'] = !empty($agentData->BrokerageID)?$agentData->BrokerageID:0;
                $agent['brokerage_roles'] = !empty($agentData->BrokerageRoles)?$agentData->BrokerageRoles:''; 
                $agent['brokeragerole'] = !empty($agentData->BrokerageRole)?$agentData->BrokerageRole:''; 
                $agent['cell_phone'] = !empty($agentData->CellPhone)?$agentData->CellPhone:''; 
                $agent['company'] = !empty($agentData->Company)?$agentData->Company:''; 
                $agent['email'] = !empty($agentData->Email)?$agentData->Email:''; 
                $agent['first_name'] = !empty($agentData->FirstName)?$agentData->FirstName:''; 
                $agent['agent_id'] = !empty($agentData->Id)?$agentData->Id:''; 
                $agent['initials'] = !empty($agentData->Initials)?$agentData->Initials:''; 
                $agent['last_name'] = !empty($agentData->LastName)?$agentData->LastName:''; 
                $agent['licensed_as'] = !empty($agentData->LicensedAs)?$agentData->LicensedAs:''; 
                $agent['license_number'] = !empty($agentData->LicenseNumber)?$agentData->LicenseNumber:''; 
                $agent['license_state'] = !empty($agentData->LicenseState)?$agentData->LicenseState:''; 
                $agent['live'] = !empty($agentData->Live)?$agentData->Live:''; 
                $agent['office_id'] = !empty($agentData->OfficeID)?$agentData->OfficeID:''; 
                $agent['office_phone'] = !empty($agentData->OfficePhone)?$agentData->OfficePhone:''; 
                $agent['cell_phone'] = !empty($agentData->Phone)?$agentData->Phone:''; 
                $agent['position'] = !empty($agentData->Position)?$agentData->Position:''; 
                $agent['position_title'] = !empty($agentData->PositionTitle)?$agentData->PositionTitle:''; 
                $agent['rebny_id'] = !empty($agentData->RebnyID)?$agentData->RebnyID:''; 
                $agent['title'] = !empty($agentData->Title)?$agentData->Title:'';                  
                $agent['updated_at'] = !empty($agentData->UpdatedAt)?strtotime($agentData->UpdatedAt):''; 
                $agent['url'] = !empty($agentData->URL)?strtotime($agentData->URL):''; 
                $agent['twitter'] = !empty($agentData->Twitter)?strtotime($agentData->Twitter):''; 
                $agent['youtube'] = !empty($agentData->Youtube)?strtotime($agentData->Youtube):''; 
                $agent['linkedin'] = !empty($agentData->Linkedin)?strtotime($agentData->Linkedin):''; 
                $agent['facebook'] = !empty($agentData->Facebook)?strtotime($agentData->Facebook):''; 
                $agent['instagram'] = !empty($agentData->Instagram)?strtotime($agentData->Instagram):''; 
                $agent['display_name'] = $agent['first_name'].' '.$agent['last_name'];
                $agent['user_login'] = $agent['first_name'];                
                $http = Yii::$app->params['http'];
                $baseurl = Url::base($http);
                $count = 1;
                $storage = \Yii::getAlias('@storage');
                $f_path = '/web/rets/agent_image/';
                $agent_image_base_url = $baseurl.'/storage/web/rets/agent_image/';
                $full_path = $storage.$f_path;
                if(!is_dir($full_path)) {
                    mkdir($full_path, 0777, true);
                }
                if(!empty($agentData->AgentImage)){                  
                    $aimage_arr = explode('/', $agentData->AgentImage);
                    $img_srt = end($aimage_arr);
                    $img_name_arr = explode('?', $img_srt);
                    $img_name = $img_name_arr[0];
                    $image_path = $full_path.$img_name;
                    $imageArr['full_path'] = $full_path.$img_name;
                    $imageArr['agent_image'] = $img_name;
                    $imageArr['agent_image_base_url'] = $agent_image_base_url;
                    $imageArr['copy_url'] = $agentData->AgentImage;
                }             
                $agent_tbl = 'rets_agent';
                $exist_agent = (new \yii\db\Query())
                    ->select(['id','agent_image','agent_image_base_url','updated_at'])
                    ->from($agent_tbl)
                    ->where(['agent_id' =>  $agent['agent_id']])
                    ->one();
                //echo $exist_agent['updated_at'].' '. $agent['updated_at'];die;    
                if(!empty($exist_agent) && $exist_agent['updated_at'] != $agent['updated_at']){
                    $agent['agent_image'] = $agent['agent_image_base_url'] ='';
                    if(!file_exists($imageArr['full_path'])){
                            copy($imageArr['copy_url'],$imageArr['full_path']);
                            $agent['agent_image'] = $imageArr['agent_image'];
                            $agent['agent_image_base_url'] = $imageArr['agent_image_base_url'];
                        }
                    Yii::$app->db->createCommand()
                     ->update($agent_tbl, $agent,['id' => $exist_agent['id']])
                     ->execute(); 
                }else if(empty($exist_agent)){
                    $agent['agent_image'] = $agent['agent_image_base_url'] ='';
                    if(!empty($imageArr)){
                        copy($imageArr['copy_url'],$imageArr['full_path']);
                        $agent['agent_image'] = $imageArr['agent_image'];
                        $agent['agent_image_base_url'] = $imageArr['agent_image_base_url'];
                    }
                    $agent['created_at'] = time();
                    Yii::$app->db->createCommand()
                    ->insert($agent_tbl,$agent)
                    ->execute();
                }else{
                    continue;
                }
            }
        } else {
            exit('Failed to open rets.json.');
        }
    } 

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }  

}
