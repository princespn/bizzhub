<?php

namespace backend\controllers;

use backend\models\Buildings;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use yii\web\UploadedFile;

/**
 * Application timeline controller
 */
class BuildingsController extends Controller
{
    public $layout = 'common';

    /**
     * Lists all TimelineEvent models.
     * @return mixed
     */

    public function actionAdd()
    {
        $model = new Buildings();
        //$model->scenario = "add";            
        if ($model->load(Yii::$app->request->post())) {
            $model->purchase_application = UploadedFile::getInstance($model,'purchase_application');
            if(!empty($model->purchase_application)){
                $file_name = 'purchase_application'.time().'.'. $model->purchase_application->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->purchase_application->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->purchase_application = $file_name;
            }
            $model->offering_plan = UploadedFile::getInstance($model,'offering_plan');
            if(!empty($model->offering_plan)){
                $file_name = 'offering_plan'.time().'.'. $model->offering_plan->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->offering_plan->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->offering_plan = $file_name;
            }
            $model->amendments = UploadedFile::getInstance($model,'amendments');
            if(!empty($model->amendments)){
                $file_name = 'amendments'.time().'.'. $model->amendments->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->amendments->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->amendments = $file_name;
            }
            $model->house_rules = UploadedFile::getInstance($model,'house_rules');
            if(!empty($model->house_rules)){
                $file_name = 'house_rules'.time().'.'. $model->house_rules->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->house_rules->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->house_rules = $file_name;
            }
            $model->sublet_policy = UploadedFile::getInstance($model,'sublet_policy');
            if(!empty($model->sublet_policy)){
                $file_name = 'sublet_policy'.time().'.'. $model->sublet_policy->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->sublet_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->sublet_policy = $file_name;
            }
            $model->covid_19_policy = UploadedFile::getInstance($model,'covid_19_policy');
            if(!empty($model->covid_19_policy)){
                $file_name = 'covid_19_policy'.time().'.'. $model->covid_19_policy->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->covid_19_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->covid_19_policy = $file_name;
            }
            $model->sublet_application = UploadedFile::getInstance($model,'sublet_application');
            if(!empty($model->sublet_application)){
                $file_name = 'sublet_application'.time().'.'. $model->sublet_application->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->sublet_application->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->sublet_application = $file_name;
            }
            $model->rental_application = UploadedFile::getInstance($model,'rental_application');
            if(!empty($model->rental_application)){
                $file_name = 'rental_application'.time().'.'. $model->rental_application->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->rental_application->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->rental_application = $file_name;
            }
            $model->bulk_rate_offering = UploadedFile::getInstance($model,'bulk_rate_offering');
            if(!empty($model->bulk_rate_offering)){
                $file_name = 'bulk_rate_offering'.time().'.'. $model->bulk_rate_offering->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->bulk_rate_offering->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->bulk_rate_offering = $file_name;
            }
            $model->renovations = UploadedFile::getInstance($model,'renovations');
            if(!empty($model->renovations)){
                $file_name = 'renovations'.time().'.'. $model->renovations->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->renovations->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->renovations = $file_name;
            }
            $model->by_laws = UploadedFile::getInstance($model,'by_laws');
            if(!empty($model->by_laws)){
                $file_name = 'by_laws'.time().'.'. $model->by_laws->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->by_laws->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->by_laws = $file_name;
            }
            $model->lease_agreement = UploadedFile::getInstance($model,'lease_agreement');
            if(!empty($model->lease_agreement)){
                $file_name = 'lease_agreement'.time().'.'. $model->lease_agreement->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->lease_agreement->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->lease_agreement = $file_name;
            }
            $model->move_in_out = UploadedFile::getInstance($model,'move_in_out');
            if(!empty($model->move_in_out)){
                $file_name = 'move_in_out'.time().'.'. $model->move_in_out->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->move_in_out->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->move_in_out = $file_name;
            }
            $model->regulatory_agreement = UploadedFile::getInstance($model,'regulatory_agreement');
            if(!empty($model->regulatory_agreement)){
                $file_name = 'regulatory_agreement'.time().'.'. $model->regulatory_agreement->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->regulatory_agreement->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->regulatory_agreement = $file_name;
            }
            $model->flip_tax_policy = UploadedFile::getInstance($model,'flip_tax_policy');
            if(!empty($model->flip_tax_policy)){
                $file_name = 'flip_tax_policy'.time().'.'. $model->flip_tax_policy->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->flip_tax_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->flip_tax_policy = $file_name;
            }
            $model->pet_policy = UploadedFile::getInstance($model,'pet_policy');
            if(!empty($model->pet_policy)){
                $file_name = 'pet_policy'.time().'.'. $model->pet_policy->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->pet_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->pet_policy = $file_name;
            }
            $model->terrace_policy = UploadedFile::getInstance($model,'terrace_policy');
            if(!empty($model->terrace_policy)){
                $file_name = 'terrace_policy'.time().'.'. $model->terrace_policy->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->terrace_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->terrace_policy = $file_name;
            }
            $model->storage_policy = UploadedFile::getInstance($model,'storage_policy');
            if(!empty($model->storage_policy)){
                $file_name = 'storage_policy'.time().'.'. $model->storage_policy->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->storage_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->storage_policy = $file_name;
            }
            $model->financials_2019 = UploadedFile::getInstance($model,'financials_2019');
            if(!empty($model->financials_2019)){
                $file_name = 'financials_2019'.time().'.'. $model->financials_2019->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->financials_2019->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->financials_2019 = $file_name;
            }
            $model->financials_2018 = UploadedFile::getInstance($model,'financials_2018');
            if(!empty($model->financials_2018)){
                $file_name = 'financials_2018'.time().'.'. $model->financials_2018->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->financials_2018->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->financials_2018 = $file_name;
            }
            $model->financials_2017 = UploadedFile::getInstance($model,'financials_2017');
            if(!empty($model->financials_2017)){
                $file_name = 'financials_2017'.time().'.'. $model->financials_2017->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->financials_2017->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->financials_2017 = $file_name;
            }
            $model->financials_2016 = UploadedFile::getInstance($model,'financials_2016');
            if(!empty($model->financials_2016)){
                $file_name = 'financials_2016'.time().'.'. $model->financials_2016->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->financials_2016->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->financials_2016 = $file_name;
            }
            $model->financials_2015 = UploadedFile::getInstance($model,'financials_2015');
            if(!empty($model->financials_2015)){
                $file_name = 'financials_2015'.time().'.'. $model->financials_2015->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->financials_2015->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->financials_2015 = $file_name;
            }
            $model->financials_2014 = UploadedFile::getInstance($model,'financials_2014');
            if(!empty($model->financials_2014)){
                $file_name = 'financials_2014'.time().'.'. $model->financials_2014->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->financials_2014->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->financials_2014 = $file_name;
            }
            $model->operating_budget = UploadedFile::getInstance($model,'operating_budget');
            if(!empty($model->operating_budget)){
                $file_name = 'operating_budget'.time().'.'. $model->operating_budget->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->operating_budget->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->operating_budget = $file_name;
            }
            $model->fitness_center_policy = UploadedFile::getInstance($model,'fitness_center_policy');
            if(!empty($model->fitness_center_policy)){
                $file_name = 'fitness_center_policy'.time().'.'. $model->fitness_center_policy->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->fitness_center_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->fitness_center_policy = $file_name;
            }
            $model->credit_report_form = UploadedFile::getInstance($model,'credit_report_form');
            if(!empty($model->credit_report_form)){
                $file_name = 'credit_report_form'.time().'.'. $model->credit_report_form->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->credit_report_form->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->credit_report_form = $file_name;
            }
            $model->annual_meeting_notes = UploadedFile::getInstance($model,'annual_meeting_notes');
            if(!empty($model->annual_meeting_notes)){
                $file_name = 'annual_meeting_notes'.time().'.'. $model->annual_meeting_notes->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->annual_meeting_notes->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->annual_meeting_notes = $file_name;
            }
            $model->handbook = UploadedFile::getInstance($model,'handbook');
            if(!empty($model->handbook)){
                $file_name = 'handbook'.time().'.'. $model->handbook->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->handbook->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->handbook = $file_name;
            }
            $model->subscription_agreement = UploadedFile::getInstance($model,'subscription_agreement');
            if(!empty($model->subscription_agreement)){
                $file_name = 'subscription_agreement'.time().'.'. $model->subscription_agreement->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->subscription_agreement->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->subscription_agreement = $file_name;
            }
            $model->refinance_application = UploadedFile::getInstance($model,'refinance_application');
            if(!empty($model->refinance_application)){
                $file_name = 'refinance_application'.time().'.'. $model->refinance_application->extension;
                if(!is_dir(Yii::$app->params['building_file_path'])) {
                    mkdir(Yii::$app->params['building_file_path'], 0777, true);
                }
                $model->refinance_application->saveAs(Yii::$app->params['building_file_path'].$file_name);
                $model->refinance_application = $file_name;
            } 
            $model->save();
            return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', "Document saved successfull.");
        }           
        return $this->render('add', [
            'model'=>$model,
            'id'=>0
        ]);
    }


    public function actionAjaxFileUpload()
    {
        $model = new Buildings();   
        //print_r($_POST['Buildings']);die('dddd');     
        if(!empty(Yii::$app->request->post())){ 
            $paName = $_FILES['Buildings']['name']['purchase_application'];           
            $opName = $_FILES['Buildings']['name']['offering_plan'];           
            $aName = $_FILES['Buildings']['name']['amendments'];           
            $hrName = $_FILES['Buildings']['name']['house_rules'];           
            $spName = $_FILES['Buildings']['name']['sublet_policy'];           
            $c19pName = $_FILES['Buildings']['name']['covid_19_policy'];           
            $saName = $_FILES['Buildings']['name']['sublet_application'];           
            $raName = $_FILES['Buildings']['name']['rental_application'];           
            $broName = $_FILES['Buildings']['name']['bulk_rate_offering'];           
            $rName = $_FILES['Buildings']['name']['renovations'];
            $blName = $_FILES['Buildings']['name']['by_laws'];
            $laName = $_FILES['Buildings']['name']['lease_agreement'];           
            $mioName = $_FILES['Buildings']['name']['move_in_out'];           
            $regaName = $_FILES['Buildings']['name']['regulatory_agreement'];           
            $ftpName = $_FILES['Buildings']['name']['flip_tax_policy'];           
            $ppName = $_FILES['Buildings']['name']['pet_policy'];
            $tpName = $_FILES['Buildings']['name']['terrace_policy'];           
            $stpName = $_FILES['Buildings']['name']['storage_policy'];           
            $f19Name = $_FILES['Buildings']['name']['financials_2019'];           
            $f18Name = $_FILES['Buildings']['name']['financials_2018'];           
            $f17Name = $_FILES['Buildings']['name']['financials_2017'];           
            $f16Name = $_FILES['Buildings']['name']['financials_2016'];           
            $f15Name = $_FILES['Buildings']['name']['financials_2015'];           
            $f14Name = $_FILES['Buildings']['name']['financials_2014'];           
            $obName = $_FILES['Buildings']['name']['operating_budget'];           
            $fcpName = $_FILES['Buildings']['name']['fitness_center_policy'];           
            $crfName = $_FILES['Buildings']['name']['credit_report_form'];           
            $amnName = $_FILES['Buildings']['name']['annual_meeting_notes'];           
            $hName = $_FILES['Buildings']['name']['handbook'];
            $subaName = $_FILES['Buildings']['name']['subscription_agreement'];           
            $refaName = $_FILES['Buildings']['name']['refinance_application'];           
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {                
                if(!is_dir(Yii::$app->params['building_file_path_temp'])) {
                        mkdir(Yii::$app->params['building_file_path_temp'], 0777, true);
                    }               
                if(!empty($paName) && empty($_POST['Buildings']['hidden_purchase_application'])){
                     $model->purchase_application = UploadedFile::getInstance($model,'purchase_application');
                    $file_name = 'purchase_application'.time().'.'. $model->purchase_application->extension;     
                    $model->purchase_application->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'purchase_application';
                }                
                if(!empty($opName) && empty($_POST['Buildings']['hidden_offering_plan'])){
                    $model->offering_plan = UploadedFile::getInstance($model,'offering_plan');
                    $file_name = 'offering_plan'.time().'.'. $model->offering_plan->extension;     
                    $model->offering_plan->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'offering_plan';
                }                
                if(!empty($aName) && empty($_POST['Buildings']['hidden_amendments'])){
                    $model->amendments = UploadedFile::getInstance($model,'amendments');
                    $file_name = 'amendments'.time().'.'. $model->amendments->extension;     
                    $model->amendments->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'amendments';
                }                
                if(!empty($hrName) && empty($_POST['Buildings']['hidden_house_rules'])){
                    $model->house_rules = UploadedFile::getInstance($model,'house_rules');
                    $file_name = 'house_rules'.time().'.'. $model->house_rules->extension;     
                    $model->house_rules->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'house_rules';
                }                
                if(!empty($spName) && empty($_POST['Buildings']['hidden_sublet_policy'])){
                    $model->sublet_policy = UploadedFile::getInstance($model,'sublet_policy');
                    $file_name = 'sublet_policy'.time().'.'. $model->sublet_policy->extension;     
                    $model->sublet_policy->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'sublet_policy';
                }                 
                if(!empty($c19pName) && empty($_POST['Buildings']['hidden_covid_19_policy'])){
                    $model->covid_19_policy = UploadedFile::getInstance($model,'covid_19_policy');
                    $file_name = 'covid_19_policy'.time().'.'. $model->covid_19_policy->extension;     
                    $model->covid_19_policy->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'covid_19_policy';
                }                
                if(!empty($saName) && empty($_POST['Buildings']['hidden_sublet_application'])){
                    $model->sublet_application = UploadedFile::getInstance($model,'sublet_application');
                    $file_name = 'sublet_application'.time().'.'. $model->sublet_application->extension;     
                    $model->sublet_application->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'sublet_application';
                }                
                if(!empty($raName) && empty($_POST['Buildings']['hidden_rental_application'])){
                    $model->rental_application = UploadedFile::getInstance($model,'rental_application');
                    $file_name = 'rental_application'.time().'.'. $model->rental_application->extension;     
                    $model->rental_application->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'rental_application';
                }                
                if(!empty($broName) && empty($_POST['Buildings']['hidden_bulk_rate_offering'])){
                    $model->bulk_rate_offering = UploadedFile::getInstance($model,'bulk_rate_offering');
                    $file_name = 'bulk_rate_offering'.time().'.'. $model->bulk_rate_offering->extension;     
                    $model->bulk_rate_offering->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'bulk_rate_offering';
                }                
                if(!empty($rName) && empty($_POST['Buildings']['hidden_renovations'])){
                    $model->renovations = UploadedFile::getInstance($model,'renovations');
                    $file_name = 'renovations'.time().'.'. $model->renovations->extension;     
                    $model->renovations->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'renovations';
                }                
                if(!empty($blName) && empty($_POST['Buildings']['hidden_by_laws'])){
                    $model->by_laws = UploadedFile::getInstance($model,'by_laws');
                    $file_name = 'by_laws'.time().'.'. $model->by_laws->extension;     
                    $model->by_laws->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'by_laws';
                }                
                if(!empty($laName) && empty($_POST['Buildings']['hidden_lease_agreement'])){
                    $model->lease_agreement = UploadedFile::getInstance($model,'lease_agreement');
                    $file_name = 'lease_agreement'.time().'.'. $model->lease_agreement->extension;     
                    $model->lease_agreement->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'lease_agreement';
                }                
                if(!empty($mioName) && empty($_POST['Buildings']['hidden_move_in_out'])){
                    $model->move_in_out = UploadedFile::getInstance($model,'move_in_out');
                    $file_name = 'move_in_out'.time().'.'. $model->move_in_out->extension;     
                    $model->move_in_out->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'move_in_out';
                }                
                if(!empty($regaName) && empty($_POST['Buildings']['hidden_regulatory_agreement'])){
                    $model->regulatory_agreement = UploadedFile::getInstance($model,'regulatory_agreement');
                    $file_name = 'regulatory_agreement'.time().'.'. $model->regulatory_agreement->extension;     
                    $model->regulatory_agreement->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'regulatory_agreement';
                }                
                if(!empty($ftpName) && empty($_POST['Buildings']['hidden_flip_tax_policy'])){
                    $model->flip_tax_policy = UploadedFile::getInstance($model,'flip_tax_policy');
                    $file_name = 'flip_tax_policy'.time().'.'. $model->flip_tax_policy->extension;     
                    $model->flip_tax_policy->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'flip_tax_policy';
                }                
                if(!empty($ppName) && empty($_POST['Buildings']['hidden_pet_policy'])){
                    $model->pet_policy = UploadedFile::getInstance($model,'pet_policy');
                    $file_name = 'pet_policy'.time().'.'. $model->pet_policy->extension;     
                    $model->pet_policy->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'pet_policy';
                }                
                if(!empty($tpName) && empty($_POST['Buildings']['hidden_terrace_policy'])){
                    $model->terrace_policy = UploadedFile::getInstance($model,'terrace_policy');
                    $file_name = 'terrace_policy'.time().'.'. $model->terrace_policy->extension;     
                    $model->terrace_policy->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'terrace_policy';
                }                
                if(!empty($stpName) && empty($_POST['Buildings']['hidden_storage_policy'])){
                    $model->storage_policy = UploadedFile::getInstance($model,'storage_policy');
                    $file_name = 'storage_policy'.time().'.'. $model->storage_policy->extension;     
                    $model->storage_policy->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'storage_policy';
                }                
                if(!empty($f19Name) && empty($_POST['Buildings']['hidden_financials_2019'])){
                    $model->financials_2019 = UploadedFile::getInstance($model,'financials_2019');
                    $file_name = 'financials_2019'.time().'.'. $model->financials_2019->extension;     
                    $model->financials_2019->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'financials_2019';
                }                
                if(!empty($f18Name) && empty($_POST['Buildings']['hidden_financials_2018'])){
                    $model->financials_2018 = UploadedFile::getInstance($model,'financials_2018');
                    $file_name = 'financials_2018'.time().'.'. $model->financials_2018->extension;     
                    $model->financials_2018->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'financials_2018';
                }                
                if(!empty($f17Name) && empty($_POST['Buildings']['hidden_financials_2017'])){
                    $model->financials_2017 = UploadedFile::getInstance($model,'financials_2017');
                    $file_name = 'financials_2017'.time().'.'. $model->financials_2017->extension;     
                    $model->financials_2017->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'financials_2017';
                }                
                if(!empty($f16Name) && empty($_POST['Buildings']['hidden_financials_2016'])){
                    $model->financials_2016 = UploadedFile::getInstance($model,'financials_2016');
                    $file_name = 'financials_2016'.time().'.'. $model->financials_2016->extension;     
                    $model->financials_2016->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'financials_2016';
                }                
                if(!empty($f15Name) && empty($_POST['Buildings']['hidden_financials_2015'])){
                    $model->financials_2015 = UploadedFile::getInstance($model,'financials_2015');
                    $file_name = 'financials_2015'.time().'.'. $model->financials_2015->extension;     
                    $model->financials_2015->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'financials_2015';
                }                
                if(!empty($f14Name) && empty($_POST['Buildings']['hidden_financials_2014'])){
                    $model->financials_2014 = UploadedFile::getInstance($model,'financials_2014');
                    $file_name = 'financials_2014'.time().'.'. $model->financials_2014->extension;     
                    $model->financials_2014->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'financials_2014';
                }                
                if(!empty($obName) && empty($_POST['Buildings']['hidden_operating_budget'])){
                    $model->operating_budget = UploadedFile::getInstance($model,'operating_budget');
                    $file_name = 'operating_budget'.time().'.'. $model->operating_budget->extension;     
                    $model->operating_budget->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'operating_budget';
                }                
                if(!empty($fcpName) && empty($_POST['Buildings']['hidden_fitness_center_policy'])){
                    $model->fitness_center_policy = UploadedFile::getInstance($model,'fitness_center_policy');
                    $file_name = 'fitness_center_policy'.time().'.'. $model->fitness_center_policy->extension;     
                    $model->fitness_center_policy->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'fitness_center_policy';
                }                
                if(!empty($crfName) && empty($_POST['Buildings']['hidden_credit_report_form'])){
                    $model->credit_report_form = UploadedFile::getInstance($model,'credit_report_form');
                    $file_name = 'credit_report_form'.time().'.'. $model->credit_report_form->extension;     
                    $model->credit_report_form->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'credit_report_form';
                }                
                if(!empty($amnName) && empty($_POST['Buildings']['hidden_annual_meeting_notes'])){
                    $model->annual_meeting_notes = UploadedFile::getInstance($model,'annual_meeting_notes');
                    $file_name = 'annual_meeting_notes'.time().'.'. $model->annual_meeting_notes->extension;     
                    $model->annual_meeting_notes->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'annual_meeting_notes';
                }                
                if(!empty($hName) && empty($_POST['Buildings']['hidden_handbook'])){
                    $model->handbook = UploadedFile::getInstance($model,'handbook');
                    $file_name = 'handbook'.time().'.'. $model->handbook->extension;     
                    $model->handbook->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'handbook';
                }                
                if(!empty($subaName) && empty($_POST['Buildings']['hidden_subscription_agreement'])){
                    $model->subscription_agreement = UploadedFile::getInstance($model,'subscription_agreement');
                    $file_name = 'subscription_agreement'.time().'.'. $model->subscription_agreement->extension;     
                    $model->subscription_agreement->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'subscription_agreement';
                }                
                if(!empty($refaName) && empty($_POST['Buildings']['hidden_refinance_application'])){
                    $model->refinance_application = UploadedFile::getInstance($model,'refinance_application');
                    $file_name = 'refinance_application'.time().'.'. $model->refinance_application->extension;     
                    $model->refinance_application->saveAs(Yii::$app->params['building_file_path_temp'].$file_name);
                    $field_name = 'refinance_application';
                }
                $return_array = ['field_name'=>$field_name,'file_name'=>$file_name];  
            }
        }        
        return json_encode($return_array);
    }


    public function actionUpdate($id)
    {
        $model = new Buildings();
        $model->attributes = $model->getDataById($id); 
        //print_r($model->attributes);die;
        $purchase_application = $model->attributes['purchase_application'];   
        $offering_plan = $model->attributes['offering_plan'];   
        $amendments = $model->attributes['amendments'];   
        $house_rules = $model->attributes['house_rules'];   
        $sublet_policy = $model->attributes['sublet_policy'];   
        $covid_19_policy = $model->attributes['covid_19_policy'];   
        $sublet_application = $model->attributes['sublet_application'];   
        $rental_application = $model->attributes['rental_application'];   
        $bulk_rate_offering = $model->attributes['bulk_rate_offering'];   
        $renovations = $model->attributes['renovations'];   
        $by_laws = $model->attributes['by_laws'];   
        $lease_agreement = $model->attributes['lease_agreement'];   
        $move_in_out = $model->attributes['move_in_out'];   
        $regulatory_agreement = $model->attributes['regulatory_agreement'];
        $flip_tax_policy = $model->attributes['flip_tax_policy'];
        $pet_policy = $model->attributes['pet_policy'];   
        $terrace_policy = $model->attributes['terrace_policy'];   
        $storage_policy = $model->attributes['storage_policy'];   
        $financials_2019 = $model->attributes['financials_2019'];   
        $financials_2018 = $model->attributes['financials_2018'];   
        $financials_2017 = $model->attributes['financials_2017'];   
        $financials_2016 = $model->attributes['financials_2016'];   
        $financials_2015 = $model->attributes['financials_2015'];   
        $financials_2014 = $model->attributes['financials_2014'];   
        $operating_budget = $model->attributes['operating_budget'];   
        $fitness_center_policy = $model->attributes['fitness_center_policy']; 
        $credit_report_form = $model->attributes['credit_report_form']; 
        $annual_meeting_notes = $model->attributes['annual_meeting_notes']; 
        $handbook = $model->attributes['handbook']; 
        $subscription_agreement = $model->attributes['subscription_agreement'];
        $refinance_application = $model->attributes['refinance_application']; 
        //print_r(Yii::$app->request->post());die; 
        if ($model->load(Yii::$app->request->post())) {
            $bPath = Yii::$app->params['building_file_path'];
            $bTempPath = Yii::$app->params['building_file_path_temp'];
            if(!is_dir($bPath)) {
                    mkdir($bPath, 0777, true);
                }
            $model->purchase_application = UploadedFile::getInstance($model,'purchase_application');
            if(!empty($model->purchase_application)){
                if(!empty($_POST['Buildings']['hidden_purchase_application'])){
                    $file_name = $_POST['Buildings']['hidden_purchase_application'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->purchase_application = $file_name;
                    if(!empty($purchase_application) && file_exists($bPath.$purchase_application)) {
                        unlink($bPath.$purchase_application);
                    }
                }else{
                    $file_name = 'purchase_application'.time().'.'. $model->purchase_application->extension;         
                    $model->purchase_application->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->purchase_application = $file_name;
                    if(!empty($purchase_application) && file_exists(Yii::$app->params['building_file_path'].$purchase_application)) {
                        unlink(Yii::$app->params['building_file_path'].$purchase_application);
                    }
                }
            }
            $model->offering_plan = UploadedFile::getInstance($model,'offering_plan');
            if(!empty($model->offering_plan)){
                if(!empty($_POST['Buildings']['hidden_offering_plan'])){
                    $file_name = $_POST['Buildings']['hidden_offering_plan'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->offering_plan = $file_name;
                    if(!empty($offering_plan) && file_exists($bPath.$offering_plan)) {
                        unlink($bPath.$offering_plan);
                    }
                }else{
                    $file_name = 'offering_plan'.time().'.'. $model->offering_plan->extension;                
                    $model->offering_plan->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->offering_plan = $file_name;
                    if(!empty($offering_plan) && file_exists(Yii::$app->params['building_file_path'].$offering_plan)) {
                        unlink(Yii::$app->params['building_file_path'].$offering_plan);
                    }
                }
            }
            $model->amendments = UploadedFile::getInstance($model,'amendments');
            if(!empty($model->amendments)){
                if(!empty($_POST['Buildings']['hidden_amendments'])){
                    $file_name = $_POST['Buildings']['hidden_amendments'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->amendments = $file_name;
                    if(!empty($amendments) && file_exists($bPath.$amendments)) {
                        unlink($bPath.$amendments);
                    }
                }else{
                    $file_name = 'amendments'.time().'.'. $model->amendments->extension;
                    $model->amendments->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->amendments = $file_name;
                    if(!empty($amendments) && file_exists(Yii::$app->params['building_file_path'].$amendments)) {
                        unlink(Yii::$app->params['building_file_path'].$amendments);
                    }
                }
            }
            $model->house_rules = UploadedFile::getInstance($model,'house_rules');
            if(!empty($model->house_rules)){
                if(!empty($_POST['Buildings']['hidden_house_rules'])){
                    $file_name = $_POST['Buildings']['hidden_house_rules'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->house_rules = $file_name;
                    if(!empty($house_rules) && file_exists($bPath.$house_rules)) {
                        unlink($bPath.$house_rules);
                    }
                }else{
                    $file_name = 'house_rules'.time().'.'. $model->house_rules->extension;
                    $model->house_rules->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->house_rules = $file_name;
                    if(!empty($house_rules) && file_exists(Yii::$app->params['building_file_path'].$house_rules)) {
                        unlink(Yii::$app->params['building_file_path'].$house_rules);
                    }
                }
            }
            $model->sublet_policy = UploadedFile::getInstance($model,'sublet_policy');
            if(!empty($model->sublet_policy)){
                if(!empty($_POST['Buildings']['hidden_sublet_policy'])){
                    $file_name = $_POST['Buildings']['hidden_sublet_policy'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->sublet_policy = $file_name;
                    if(!empty($sublet_policy) && file_exists($bPath.$sublet_policy)) {
                        unlink($bPath.$sublet_policy);
                    }
                }else{
                    $file_name = 'sublet_policy'.time().'.'. $model->sublet_policy->extension;
                    $model->sublet_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->sublet_policy = $file_name;
                    if(!empty($sublet_policy) && file_exists(Yii::$app->params['building_file_path'].$sublet_policy)) {
                        unlink(Yii::$app->params['building_file_path'].$sublet_policy);
                    }
                }
            }
            $model->covid_19_policy = UploadedFile::getInstance($model,'covid_19_policy');
            if(!empty($model->covid_19_policy)){
                if(!empty($_POST['Buildings']['hidden_covid_19_policy'])){
                    $file_name = $_POST['Buildings']['hidden_covid_19_policy'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->covid_19_policy = $file_name;
                    if(!empty($covid_19_policy) && file_exists($bPath.$covid_19_policy)) {
                        unlink($bPath.$covid_19_policy);
                    }
                }else{
                    $file_name = 'covid_19_policy'.time().'.'. $model->covid_19_policy->extension;
                    $model->covid_19_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->covid_19_policy = $file_name;
                    if(!empty($covid_19_policy) && file_exists(Yii::$app->params['building_file_path'].$covid_19_policy)) {
                        unlink(Yii::$app->params['building_file_path'].$covid_19_policy);
                    }
                }
            }
            $model->sublet_application = UploadedFile::getInstance($model,'sublet_application');
            if(!empty($model->sublet_application)){
                if(!empty($_POST['Buildings']['hidden_sublet_application'])){
                    $file_name = $_POST['Buildings']['hidden_sublet_application'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->sublet_application = $file_name;
                    if(!empty($sublet_application) && file_exists($bPath.$sublet_application)) {
                        unlink($bPath.$sublet_application);
                    }
                }else{
                    $file_name = 'sublet_application'.time().'.'. $model->sublet_application->extension;
                    $model->sublet_application->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->sublet_application = $file_name;
                    if(!empty($sublet_application) && file_exists(Yii::$app->params['building_file_path'].$sublet_application)) {
                        unlink(Yii::$app->params['building_file_path'].$sublet_application);
                    }
                }
            }
            $model->rental_application = UploadedFile::getInstance($model,'rental_application');
            if(!empty($model->rental_application)){
                if(!empty($_POST['Buildings']['hidden_rental_application'])){
                    $file_name = $_POST['Buildings']['hidden_rental_application'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->rental_application = $file_name;
                    if(!empty($rental_application) && file_exists($bPath.$rental_application)) {
                        unlink($bPath.$rental_application);
                    }
                }else{
                    $file_name = 'rental_application'.time().'.'. $model->rental_application->extension;
                    $model->rental_application->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->rental_application = $file_name;
                    if(!empty($rental_application) && file_exists(Yii::$app->params['building_file_path'].$rental_application)) {
                        unlink(Yii::$app->params['building_file_path'].$rental_application);
                    }
                }
            }
            $model->bulk_rate_offering = UploadedFile::getInstance($model,'bulk_rate_offering');
            if(!empty($model->bulk_rate_offering)){
                if(!empty($_POST['Buildings']['hidden_bulk_rate_offering'])){
                    $file_name = $_POST['Buildings']['hidden_bulk_rate_offering'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->bulk_rate_offering = $file_name;
                    if(!empty($bulk_rate_offering) && file_exists($bPath.$bulk_rate_offering)) {
                        unlink($bPath.$bulk_rate_offering);
                    }
                }else{
                    $file_name = 'bulk_rate_offering'.time().'.'. $model->bulk_rate_offering->extension;
                    $model->bulk_rate_offering->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->bulk_rate_offering = $file_name;
                    if(!empty($bulk_rate_offering) && file_exists(Yii::$app->params['building_file_path'].$bulk_rate_offering)) {
                        unlink(Yii::$app->params['building_file_path'].$bulk_rate_offering);
                    }
                }
            }
            $model->renovations = UploadedFile::getInstance($model,'renovations');
            if(!empty($model->renovations)){
                if(!empty($_POST['Buildings']['hidden_renovations'])){
                    $file_name = $_POST['Buildings']['hidden_renovations'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->renovations = $file_name;
                    if(!empty($renovations) && file_exists($bPath.$renovations)) {
                        unlink($bPath.$renovations);
                    }
                }else{
                    $file_name = 'renovations'.time().'.'. $model->renovations->extension;
                    $model->renovations->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->renovations = $file_name;
                    if(!empty($renovations) && file_exists(Yii::$app->params['building_file_path'].$renovations)) {
                        unlink(Yii::$app->params['building_file_path'].$renovations);
                    }
                }
            }
            $model->by_laws = UploadedFile::getInstance($model,'by_laws');
            if(!empty($model->by_laws)){
                if(!empty($_POST['Buildings']['hidden_by_laws'])){
                    $file_name = $_POST['Buildings']['hidden_by_laws'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->by_laws = $file_name;
                    if(!empty($by_laws) && file_exists($bPath.$by_laws)) {
                        unlink($bPath.$by_laws);
                    }
                }else{
                    $file_name = 'by_laws'.time().'.'. $model->by_laws->extension;
                    $model->by_laws->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->by_laws = $file_name;
                    if(!empty($by_laws) && file_exists(Yii::$app->params['building_file_path'].$by_laws)) {
                        unlink(Yii::$app->params['building_file_path'].$by_laws);
                    }
                }
            }
            $model->lease_agreement = UploadedFile::getInstance($model,'lease_agreement');
            if(!empty($model->lease_agreement)){
                if(!empty($_POST['Buildings']['hidden_lease_agreement'])){
                    $file_name = $_POST['Buildings']['hidden_lease_agreement'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->lease_agreement = $file_name;
                    if(!empty($lease_agreement) && file_exists($bPath.$lease_agreement)) {
                        unlink($bPath.$lease_agreement);
                    }
                }else{
                    $file_name = 'lease_agreement'.time().'.'. $model->lease_agreement->extension;
                    $model->lease_agreement->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->lease_agreement = $file_name;
                    if(!empty($lease_agreement) && file_exists(Yii::$app->params['building_file_path'].$lease_agreement)) {
                        unlink(Yii::$app->params['building_file_path'].$lease_agreement);
                    }
                }
            }
            $model->move_in_out = UploadedFile::getInstance($model,'move_in_out');
            if(!empty($model->move_in_out)){
                if(!empty($_POST['Buildings']['hidden_move_in_out'])){
                    $file_name = $_POST['Buildings']['hidden_move_in_out'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->move_in_out = $file_name;
                    if(!empty($move_in_out) && file_exists($bPath.$move_in_out)) {
                        unlink($bPath.$move_in_out);
                    }
                }else{
                    $file_name = 'move_in_out'.time().'.'. $model->move_in_out->extension;
                    $model->move_in_out->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->move_in_out = $file_name;
                    if(!empty($move_in_out) && file_exists(Yii::$app->params['building_file_path'].$move_in_out)) {
                        unlink(Yii::$app->params['building_file_path'].$move_in_out);
                    }
                }
            }
            $model->regulatory_agreement = UploadedFile::getInstance($model,'regulatory_agreement');
            if(!empty($model->regulatory_agreement)){
                if(!empty($_POST['Buildings']['hidden_regulatory_agreement'])){
                    $file_name = $_POST['Buildings']['hidden_regulatory_agreement'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->regulatory_agreement = $file_name;
                    if(!empty($regulatory_agreement) && file_exists($bPath.$regulatory_agreement)) {
                        unlink($bPath.$regulatory_agreement);
                    }
                }else{
                    $file_name = 'regulatory_agreement'.time().'.'. $model->regulatory_agreement->extension;
                    $model->regulatory_agreement->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->regulatory_agreement = $file_name;
                    if(!empty($regulatory_agreement) && file_exists(Yii::$app->params['building_file_path'].$regulatory_agreement)) {
                        unlink(Yii::$app->params['building_file_path'].$regulatory_agreement);
                    }
                }
            }
            $model->flip_tax_policy = UploadedFile::getInstance($model,'flip_tax_policy');
            if(!empty($model->flip_tax_policy)){
                if(!empty($_POST['Buildings']['hidden_flip_tax_policy'])){
                    $file_name = $_POST['Buildings']['hidden_flip_tax_policy'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->flip_tax_policy = $file_name;
                    if(!empty($flip_tax_policy) && file_exists($bPath.$flip_tax_policy)) {
                        unlink($bPath.$flip_tax_policy);
                    }
                }else{
                    $file_name = 'flip_tax_policy'.time().'.'. $model->flip_tax_policy->extension;
                    $model->flip_tax_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->flip_tax_policy = $file_name;
                    if(!empty($flip_tax_policy) && file_exists(Yii::$app->params['building_file_path'].$flip_tax_policy)) {
                        unlink(Yii::$app->params['building_file_path'].$flip_tax_policy);
                    }
                }
            }
            $model->pet_policy = UploadedFile::getInstance($model,'pet_policy');
            if(!empty($model->pet_policy)){
                if(!empty($_POST['Buildings']['hidden_pet_policy'])){
                    $file_name = $_POST['Buildings']['hidden_pet_policy'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->pet_policy = $file_name;
                    if(!empty($pet_policy) && file_exists($bPath.$pet_policy)) {
                        unlink($bPath.$pet_policy);
                    }
                }else{
                    $file_name = 'pet_policy'.time().'.'. $model->pet_policy->extension;
                    $model->pet_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->pet_policy = $file_name;
                    if(!empty($pet_policy) && file_exists(Yii::$app->params['building_file_path'].$pet_policy)) {
                        unlink(Yii::$app->params['building_file_path'].$pet_policy);
                    }
                }
            }
            $model->terrace_policy = UploadedFile::getInstance($model,'terrace_policy');
            if(!empty($model->terrace_policy)){
                if(!empty($_POST['Buildings']['hidden_terrace_policy'])){
                    $file_name = $_POST['Buildings']['hidden_terrace_policy'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->terrace_policy = $file_name;
                    if(!empty($terrace_policy) && file_exists($bPath.$terrace_policy)) {
                        unlink($bPath.$terrace_policy);
                    }
                }else{
                    $file_name = 'terrace_policy'.time().'.'. $model->terrace_policy->extension;
                    $model->terrace_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->terrace_policy = $file_name;
                    if(!empty($terrace_policy) && file_exists(Yii::$app->params['building_file_path'].$terrace_policy)) {
                        unlink(Yii::$app->params['building_file_path'].$terrace_policy);
                    }
                }
            }
            $model->storage_policy = UploadedFile::getInstance($model,'storage_policy');
            if(!empty($model->storage_policy)){
                if(!empty($_POST['Buildings']['hidden_storage_policy'])){
                    $file_name = $_POST['Buildings']['hidden_storage_policy'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->storage_policy = $file_name;
                    if(!empty($storage_policy) && file_exists($bPath.$storage_policy)) {
                        unlink($bPath.$storage_policy);
                    }
                }else{
                    $file_name = 'storage_policy'.time().'.'. $model->storage_policy->extension;
                    $model->storage_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->storage_policy = $file_name;
                    if(!empty($storage_policy) && file_exists(Yii::$app->params['building_file_path'].$storage_policy)) {
                        unlink(Yii::$app->params['building_file_path'].$storage_policy);
                    }
                }
            }
            $model->financials_2019 = UploadedFile::getInstance($model,'financials_2019');
            if(!empty($model->financials_2019)){
                if(!empty($_POST['Buildings']['hidden_financials_2019'])){
                    $file_name = $_POST['Buildings']['hidden_financials_2019'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->financials_2019 = $file_name;
                    if(!empty($financials_2019) && file_exists($bPath.$financials_2019)) {
                        unlink($bPath.$financials_2019);
                    }
                }else{
                    $file_name = 'financials_2019'.time().'.'. $model->financials_2019->extension;
                    $model->financials_2019->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->financials_2019 = $file_name;
                    if(!empty($financials_2019) && file_exists(Yii::$app->params['building_file_path'].$financials_2019)) {
                        unlink(Yii::$app->params['building_file_path'].$financials_2019);
                    }
                }
            }
            $model->financials_2018 = UploadedFile::getInstance($model,'financials_2018');
            if(!empty($model->financials_2018)){
                if(!empty($_POST['Buildings']['hidden_financials_2018'])){
                    $file_name = $_POST['Buildings']['hidden_financials_2018'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->financials_2018 = $file_name;
                    if(!empty($financials_2018) && file_exists($bPath.$financials_2018)) {
                        unlink($bPath.$financials_2018);
                    }
                }else{
                    $file_name = 'financials_2018'.time().'.'. $model->financials_2018->extension;
                    $model->financials_2018->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->financials_2018 = $file_name;
                    if(!empty($financials_2018) && file_exists(Yii::$app->params['building_file_path'].$financials_2018)) {
                        unlink(Yii::$app->params['building_file_path'].$financials_2018);
                    }
                }
            }
            $model->financials_2017 = UploadedFile::getInstance($model,'financials_2017');
            if(!empty($model->financials_2017)){
                if(!empty($_POST['Buildings']['hidden_financials_2017'])){
                    $file_name = $_POST['Buildings']['hidden_financials_2017'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->financials_2017 = $file_name;
                    if(!empty($financials_2017) && file_exists($bPath.$financials_2017)) {
                        unlink($bPath.$financials_2017);
                    }
                }else{
                    $file_name = 'financials_2017'.time().'.'. $model->financials_2017->extension;
                    $model->financials_2017->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->financials_2017 = $file_name;
                    if(!empty($financials_2017) && file_exists(Yii::$app->params['building_file_path'].$financials_2017)) {
                        unlink(Yii::$app->params['building_file_path'].$financials_2017);
                    }
                }
            }
            $model->financials_2016 = UploadedFile::getInstance($model,'financials_2016');
            if(!empty($model->financials_2016)){
                if(!empty($_POST['Buildings']['hidden_financials_2016'])){
                    $file_name = $_POST['Buildings']['hidden_financials_2016'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->financials_2016 = $file_name;
                    if(!empty($financials_2016) && file_exists($bPath.$financials_2016)) {
                        unlink($bPath.$financials_2016);
                    }
                }else{
                    $file_name = 'financials_2016'.time().'.'. $model->financials_2016->extension;
                    $model->financials_2016->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->financials_2016 = $file_name;
                    if(!empty($financials_2016) && file_exists(Yii::$app->params['building_file_path'].$financials_2016)) {
                        unlink(Yii::$app->params['building_file_path'].$financials_2016);
                    }
                }
            }
            $model->financials_2015 = UploadedFile::getInstance($model,'financials_2015');
            if(!empty($model->financials_2015)){
                if(!empty($_POST['Buildings']['hidden_financials_2015'])){
                    $file_name = $_POST['Buildings']['hidden_financials_2015'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->financials_2015 = $file_name;
                    if(!empty($financials_2015) && file_exists($bPath.$financials_2015)) {
                        unlink($bPath.$financials_2015);
                    }
                }else{
                    $file_name = 'financials_2015'.time().'.'. $model->financials_2015->extension;
                    $model->financials_2015->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->financials_2015 = $file_name;
                    if(!empty($financials_2015) && file_exists(Yii::$app->params['building_file_path'].$financials_2015)) {
                        unlink(Yii::$app->params['building_file_path'].$financials_2015);
                    }
                }
            }
            $model->financials_2014 = UploadedFile::getInstance($model,'financials_2014');
            if(!empty($model->financials_2014)){
                if(!empty($_POST['Buildings']['hidden_financials_2014'])){
                    $file_name = $_POST['Buildings']['hidden_financials_2014'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->financials_2014 = $file_name;
                    if(!empty($financials_2014) && file_exists($bPath.$financials_2014)) {
                        unlink($bPath.$financials_2014);
                    }
                }else{
                    $file_name = 'financials_2014'.time().'.'. $model->financials_2014->extension;
                    $model->financials_2014->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->financials_2014 = $file_name;
                    if(!empty($financials_2014) && file_exists(Yii::$app->params['building_file_path'].$financials_2014)) {
                        unlink(Yii::$app->params['building_file_path'].$financials_2014);
                    }
                }
            }
            $model->operating_budget = UploadedFile::getInstance($model,'operating_budget');
            if(!empty($model->operating_budget)){
                if(!empty($_POST['Buildings']['hidden_operating_budget'])){
                    $file_name = $_POST['Buildings']['hidden_operating_budget'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->operating_budget = $file_name;
                    if(!empty($operating_budget) && file_exists($bPath.$operating_budget)) {
                        unlink($bPath.$operating_budget);
                    }
                }else{
                    $file_name = 'operating_budget'.time().'.'. $model->operating_budget->extension;
                    $model->operating_budget->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->operating_budget = $file_name;
                    if(!empty($operating_budget) && file_exists(Yii::$app->params['building_file_path'].$operating_budget)) {
                        unlink(Yii::$app->params['building_file_path'].$operating_budget);
                    }
                }
            }
            $model->fitness_center_policy = UploadedFile::getInstance($model,'fitness_center_policy');
            if(!empty($model->fitness_center_policy)){
                if(!empty($_POST['Buildings']['hidden_fitness_center_policy'])){
                    $file_name = $_POST['Buildings']['hidden_fitness_center_policy'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->fitness_center_policy = $file_name;
                    if(!empty($fitness_center_policy) && file_exists($bPath.$fitness_center_policy)) {
                        unlink($bPath.$fitness_center_policy);
                    }
                }else{
                    $file_name = 'fitness_center_policy'.time().'.'. $model->fitness_center_policy->extension;
                    $model->fitness_center_policy->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->fitness_center_policy = $file_name;
                    if(!empty($fitness_center_policy) && file_exists(Yii::$app->params['building_file_path'].$fitness_center_policy)) {
                        unlink(Yii::$app->params['building_file_path'].$fitness_center_policy);
                    }
                }
            }
            $model->credit_report_form = UploadedFile::getInstance($model,'credit_report_form');
            if(!empty($model->credit_report_form)){
                if(!empty($_POST['Buildings']['hidden_credit_report_form'])){
                    $file_name = $_POST['Buildings']['hidden_credit_report_form'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->credit_report_form = $file_name;
                    if(!empty($credit_report_form) && file_exists($bPath.$credit_report_form)) {
                        unlink($bPath.$credit_report_form);
                    }
                }else{
                    $file_name = 'credit_report_form'.time().'.'. $model->credit_report_form->extension;
                    $model->credit_report_form->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->credit_report_form = $file_name;
                    if(!empty($credit_report_form) && file_exists(Yii::$app->params['building_file_path'].$credit_report_form)) {
                        unlink(Yii::$app->params['building_file_path'].$credit_report_form);
                    }
                }
            }
            $model->annual_meeting_notes = UploadedFile::getInstance($model,'annual_meeting_notes');
            if(!empty($model->annual_meeting_notes)){
                if(!empty($_POST['Buildings']['hidden_annual_meeting_notes'])){
                    $file_name = $_POST['Buildings']['hidden_annual_meeting_notes'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->annual_meeting_notes = $file_name;
                    if(!empty($annual_meeting_notes) && file_exists($bPath.$annual_meeting_notes)) {
                        unlink($bPath.$annual_meeting_notes);
                    }
                }else{
                    $file_name = 'annual_meeting_notes'.time().'.'. $model->annual_meeting_notes->extension;
                    $model->annual_meeting_notes->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->annual_meeting_notes = $file_name;
                    if(!empty($annual_meeting_notes) && file_exists(Yii::$app->params['building_file_path'].$annual_meeting_notes)) {
                        unlink(Yii::$app->params['building_file_path'].$annual_meeting_notes);
                    }
                }
            }
            $model->handbook = UploadedFile::getInstance($model,'handbook');
            if(!empty($model->handbook)){
                if(!empty($_POST['Buildings']['hidden_handbook'])){
                    $file_name = $_POST['Buildings']['hidden_handbook'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->handbook = $file_name;
                    if(!empty($handbook) && file_exists($bPath.$handbook)) {
                        unlink($bPath.$handbook);
                    }
                }else{
                    $file_name = 'handbook'.time().'.'. $model->handbook->extension;
                    $model->handbook->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->handbook = $file_name;
                    if(!empty($handbook) && file_exists(Yii::$app->params['building_file_path'].$handbook)) {
                        unlink(Yii::$app->params['building_file_path'].$handbook);
                    }
                }
            }
            $model->subscription_agreement = UploadedFile::getInstance($model,'subscription_agreement');
            if(!empty($model->subscription_agreement)){
                if(!empty($_POST['Buildings']['hidden_subscription_agreement'])){
                    $file_name = $_POST['Buildings']['hidden_subscription_agreement'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->subscription_agreement = $file_name;
                    if(!empty($subscription_agreement) && file_exists($bPath.$subscription_agreement)) {
                        unlink($bPath.$subscription_agreement);
                    }
                }else{
                    $file_name = 'subscription_agreement'.time().'.'. $model->subscription_agreement->extension;
                    $model->subscription_agreement->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->subscription_agreement = $file_name;
                    if(!empty($subscription_agreement) && file_exists(Yii::$app->params['building_file_path'].$subscription_agreement)) {
                        unlink(Yii::$app->params['building_file_path'].$subscription_agreement);
                    }
                }
            }
            $model->refinance_application = UploadedFile::getInstance($model,'refinance_application');

            if(!empty($model->refinance_application)){
                if(!empty($_POST['Buildings']['hidden_refinance_application'])){
                    $file_name = $_POST['Buildings']['hidden_refinance_application'];
                    $temp_path = $bTempPath.$file_name;
                    $path = $bPath.$file_name;
                    copy($temp_path, $path);
                    $model->refinance_application = $file_name;
                    if(!empty($refinance_application) && file_exists($bPath.$refinance_application)) {
                        unlink($bPath.$refinance_application);
                    }
                }else{
                    $file_name = 'refinance_application'.time().'.'. $model->refinance_application->extension;
                    $model->refinance_application->saveAs(Yii::$app->params['building_file_path'].$file_name);
                    $model->refinance_application = $file_name;
                    if(!empty($refinance_application) && file_exists(Yii::$app->params['building_file_path'].$refinance_application)) {
                        unlink(Yii::$app->params['building_file_path'].$refinance_application);
                    }
                }
            }
            //print_r($model->attributes);die;
            //print_r($model);die; 
            $model->update();
            return $this->redirect(['index']);
            Yii::$app->session->setFlash('success', "Document saved successfull.");
        }           
        return $this->render('add', [
            'model'=>$model,
            'id'=>$id
        ]);
    }

    public function actionDelete($id)
    {
        $model = new buildings();        
        if(!empty($id)){
            $buildingData = $model->getDataById($id);
            //print_r($buildingData);die;
            if(!empty($buildingData['purchase_application']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['purchase_application'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['purchase_application']);
            }
            if(!empty($buildingData['offering_plan']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['offering_plan'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['offering_plan']);
            }
            if(!empty($buildingData['amendments']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['amendments'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['amendments']);
            }
            if(!empty($buildingData['house_rules']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['house_rules'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['house_rules']);
            }
            if(!empty($buildingData['sublet_policy']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['sublet_policy'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['sublet_policy']);
            }
            if(!empty($buildingData['covid_19_policy']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['covid_19_policy'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['covid_19_policy']);
            }
            if(!empty($buildingData['sublet_application']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['sublet_application'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['sublet_application']);
            }
            if(!empty($buildingData['rental_application']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['rental_application'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['rental_application']);
            }
            if(!empty($buildingData['bulk_rate_offering']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['bulk_rate_offering'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['bulk_rate_offering']);
            }
            if(!empty($buildingData['renovations']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['renovations'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['renovations']);
            }
            if(!empty($buildingData['by_laws']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['by_laws'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['by_laws']);
            }
            if(!empty($buildingData['lease_agreement']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['lease_agreement'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['lease_agreement']);
            }
            if(!empty($buildingData['move_in_out']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['move_in_out'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['move_in_out']);
            }
            if(!empty($buildingData['regulatory_agreement']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['regulatory_agreement'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['regulatory_agreement']);
            }
            if(!empty($buildingData['flip_tax_policy']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['flip_tax_policy'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['flip_tax_policy']);
            }
            if(!empty($buildingData['pet_policy']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['pet_policy'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['pet_policy']);
            }
            if(!empty($buildingData['terrace_policy']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['terrace_policy'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['terrace_policy']);
            }
            if(!empty($buildingData['storage_policy']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['storage_policy'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['storage_policy']);
            }
            if(!empty($buildingData['financials_2019']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['financials_2019'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['financials_2019']);
            }
            if(!empty($buildingData['financials_2018']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['financials_2018'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['financials_2018']);
            }
            if(!empty($buildingData['financials_2017']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['financials_2017'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['financials_2017']);
            }
            if(!empty($buildingData['financials_2016']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['financials_2016'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['financials_2016']);
            }
            if(!empty($buildingData['financials_2015']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['financials_2015'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['financials_2015']);
            }
            if(!empty($buildingData['financials_2014']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['financials_2014'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['financials_2014']);
            }
            if(!empty($buildingData['operating_budget']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['operating_budget'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['operating_budget']);
            }
            if(!empty($buildingData['fitness_center_policy']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['fitness_center_policy'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['fitness_center_policy']);
            }
            if(!empty($buildingData['credit_report_form']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['credit_report_form'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['credit_report_form']);
            }
            if(!empty($buildingData['annual_meeting_notes']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['annual_meeting_notes'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['annual_meeting_notes']);
            }
            if(!empty($buildingData['handbook']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['handbook'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['handbook']);
            }
            if(!empty($buildingData['subscription_agreement']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['subscription_agreement'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['subscription_agreement']);
            }
            if(!empty($buildingData['refinance_application']) && file_exists(Yii::$app->params['building_file_path'].$buildingData['refinance_application'])) {
                    unlink(Yii::$app->params['building_file_path'].$buildingData['refinance_application']);
            }
            $model->deleteById($id);           
            return $this->redirect(['index']);            
        }
    }

    public function actionIndex()
    {
        $model = new Buildings();
        $query = new Query();        
        $rows = $query->select("*")
        ->from('buildings')
        //->where(['status' => 1])
        ->all();
        //print_r($rows);die;
        $provider = new ArrayDataProvider([
            'allModels' => $rows,
            'sort' => [
                'attributes' => ['address','city','state','zip','legal_name','building_nickname','status'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $models = $provider->getModels();

        return $this->render('index',[
                'dataProvider' => $provider,
                'model' => $models,
            ]);
    }


    public function actionAddCategory()
    {
        $model = new DocumentCategory();
        if ($model->load(Yii::$app->request->post())) {
            $model->attributes = Yii::$app->request->post();
            $rows = (new \yii\db\Query())
                    ->select(['id', 'title'])
                    ->from('document_category')
                    ->where(['title' => $model->attributes['title']])
                    ->One();
            if(!empty($rows)){
                Yii::$app->session->setFlash('error', "This category is already use.");
            }else{    
                $model->save();
                return $this->redirect(['category']);
                Yii::$app->session->setFlash('success', "Category saved successfull.");
            }
        }
        return $this->render('add_category', [
            'model'=>$model,
        ]);
    }

    public function actionCatUpdate($id)
    {
        $model = new DocumentCategory();
        $model->attributes = $model->getDataById($id);
        
        if(!empty(Yii::$app->request->post())){            
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                $model->attributes= Yii::$app->request->post();
                //print_r($model);die;
                $model->update();
                return $this->redirect(['category']);
            }
        }
        
        return $this->render('cat_update', [
            'model' => $model,
        ]);
    }

    public function actionCategory()
    {
        $model = new DocumentCategory();
        $query = new Query();        
        $rows = $query->select("*")
        ->from('document_category')
        //->where(['status' => 1])
        ->all();
            
        $provider = new ArrayDataProvider([
            'allModels' => $rows,
            'sort' => [
                'attributes' => ['title'],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $models = $provider->getModels();

        return $this->render('category_list',[
                'dataProvider' => $provider,
                'model' => $models,
            ]);
    }

    public function actionCatDelete($id)
    {
        $model = new DocumentCategory();        
        if(!empty($id)){
            $model->deleteById($id);           
            return $this->redirect(['category']);            
        }
    }
}
