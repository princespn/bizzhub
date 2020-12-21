<?php

namespace frontend\controllers;

use cheatsheet\Time;
use common\sitemap\UrlsIterator;
use frontend\models\ContactForm;
use Sitemaped\Element\Urlset\Urlset;
use Sitemaped\Sitemap;
use Yii;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Contact;
use frontend\models\Home;


/**
 * Site controller
 */
class HomeController extends Controller
{
    /**
     * @return array
     */
    //public $layout = "home";
    /*public function behaviors()
    {
        return [
            [
                'class' => PageCache::class,
                'only' => ['sitemap'],
                'duration' => Time::SECONDS_IN_AN_HOUR,
            ]
        ];
    }*/

    public function behaviors()
    {
        return [            
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [                   
                    [                    
                        'actions' => ['index','ajax-add-contact','getxml-data','get-retsxml'],
                        'allow' => true,
                        'roles' => ['agent'],
                    ],                   

                ],
            ],

        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale' => [
                'class' => 'common\actions\SetLocaleAction',
                'locales' => array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $contact = new Contact();
        $home = new Home();
        $retsData = $home->getRetsData();
        //print_r( $retsData);die;
        //date_default_timezone_set('America/New_York');
        //$config = new \PHRETS\Configuration;+
        return $this->render('index',[
            'contact' => $contact,
            'retsData'=> $retsData
        ]);
    }


    public function actionAjaxAddContact()
    {
        $model = new Contact();
        $return = "fail";  
    $user_id = Yii::$app->user->getId();
    $role = Yii::$app->db
        ->createCommand("Select `item_name` from rbac_auth_assignment where user_id='2'")
        ->queryScalar();
    $contactAuthArr = Yii::$app->params['ContactAuthUserRole']; 
    $error = 'you have some error';     
    if (in_array($role, $contactAuthArr)){     
        if (Yii::$app->request->isAjax) {
                $data = Yii::$app->request->post(); 
                $rows = (new \yii\db\Query())
                        ->select(['id', 'email','agent_id'])
                        ->from('contact')
                        ->where(['email' => $data['Contact']['email']])
                        ->One();                                     
                if(!empty($rows)){
                    $agents = $user_id;
                    if($rows['agent_id'] != $agents){
                        $array1 = explode(',', $rows['agent_id']);
                        $array2 = explode(',', $agents);
                        $ag_id_arr = array_unique(array_merge($array1,$array2), SORT_REGULAR);
                        $ag_id = implode(',', $ag_id_arr);
                        //$agentids = $rows['agent_id'];
                        Yii::$app->db->createCommand()
                         ->update('contact', ['agent_id' => $ag_id], ['id' => $rows['id']])
                         ->execute();
                         $success = 'Contact saved successfull.';                      
                    }else{
                        $error = 'This email id is already use.';
                    }                    
                }else{ 
                    Yii::$app->db->createCommand()
                    ->insert('contact',
                        [
                            'first_name'=>$data['Contact']['first_name'],
                            'last_name'=>$data['Contact']['last_name'],
                            'email'=>$data['Contact']['email'],
                            'agent_id'=>$user_id,
                            'created_date'=>time()
                        ]
                    )
                    ->execute();    
                    $success = 'Contact saved successfull.';
                } 
            }else{
                $error = 'Form data is blank';
            }
        }else{
           $error = 'You are not authorize'; 
        }
        if(!empty($success)){
             $return = $success;
        }else{
            $return = $error;
       }
       return json_encode($return);        
    }

    public function actionGetRetsxml()
    {
        $rets_login_url = 'http://rets.perchwell.com:6103/login';
        $rets_username = 'bizzarro';
        $rets_password = 'y4w-u62-q3j-675';
        $rets_user_agent_password = '';

        date_default_timezone_set('America/New_York');

        //require_once("vendor/autoload.php");
        $config = new \PHRETS\Configuration;
        $config->setLoginUrl('http://rets.perchwell.com:6103/login')
                ->setUsername('bizzarro')
                ->setPassword('y4w-u62-q3j-675')
                ->setRetsVersion('1.7.2');

        $config->setUserAgent('PHRETS/2.0');
        $config->setHttpAuthenticationMethod('basic');
        $rets = new \PHRETS\Session($config);
        $connect = $rets->Login();

        $results = $rets->Search('Listing', 'Listing', "(BrokerageID=2528),(StatusCode=100),(SaleOrRental=S)", [
                'QueryType' => 'DMQL2',
                'Count' => 1,
                'Format' => 'COMPACT-DECODED',
                'Limit' => 99999,
                'StandardNames' => 1
            ]);
        $results->toArray();
        print_r($results);die;
        /*foreach ($results as $r) {
            var_dump($r);
        })*/
    }

    public function actionGetxmlData()
    {
        $path = Yii::$app->params['rets_xml_path'];
        $fullpath = $path.'rets_cache.xml';
        if (file_exists($fullpath)) {
            $xmlData = simplexml_load_file($fullpath);
            foreach($xmlData as $propertyData) {
                $saveData['address'] = !empty($propertyData->Address)?$propertyData->Address:'';
                $saveData['address_display'] = !empty($propertyData->AddressDisplay)?$propertyData->AddressDisplay:'';
                $saveData['address_with_unit'] = !empty($propertyData->AddressWithUnit)?$propertyData->AddressWithUnit:'';
                $saveData['agent1_id'] = !empty($propertyData->Agent1Id)?$propertyData->Agent1Id:'';
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
                $saveData['created_at'] = !empty($propertyData->CreatedAt)?strtotime($propertyData->CreatedAt):'';
                $rets_property_tbl = 'rets_property';
                $p = Yii::$app->db->createCommand()
                        ->insert($rets_property_tbl,$saveData)
                        ->execute(); 
            }        
            
        } else {
            exit('Failed to open test.xml.');
        }
    }
   
    

    /**
     * @param string $format
     * @param bool $gzip
     * @return string
     * @throws BadRequestHttpException
     */
    public function actionSitemap($format = Sitemap::FORMAT_XML, $gzip = false)
    {
        $links = new UrlsIterator();
        $sitemap = new Sitemap(new Urlset($links));

        Yii::$app->response->format = Response::FORMAT_RAW;

        if ($gzip === true) {
            Yii::$app->response->headers->add('Content-Encoding', 'gzip');
        }

        if ($format === Sitemap::FORMAT_XML) {
            Yii::$app->response->headers->add('Content-Type', 'application/xml');
            $content = $sitemap->toXmlString($gzip);
        } else if ($format === Sitemap::FORMAT_TXT) {
            Yii::$app->response->headers->add('Content-Type', 'text/plain');
            $content = $sitemap->toTxtString($gzip);
        } else {
            throw new BadRequestHttpException('Unknown format');
        }

        $linksCount = $sitemap->getCount();
        if ($linksCount > 50000) {
            Yii::warning(\sprintf('Sitemap links count is %d'), $linksCount);
        }

        return $content;
    }
}
