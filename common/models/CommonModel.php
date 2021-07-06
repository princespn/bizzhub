<?php

namespace common\models;

class CommonModel
{

    public static function getContactSettings()
    {
        $ContactsSettingsModel = ContactsSettingsModel::find()->where(['contactid' => \Yii::$app->user->identity->getContact()->contactid])->one();
        if ($ContactsSettingsModel) {
            return $ContactsSettingsModel;
        }
        return null;
    }

    public static function getMonthList()
    {
        return [
            "1" => "January",
            "2" => "February",
            "3" => "March",
            "4" => "April",
            "5" => "May",
            "6" => "June",
            "7" => "July",
            "8" => "August",
            "9" => "September",
            "10" => "October",
            "11" => "November",
            "12" => "December",
        ];
    }

    public static function getWeekdayList()
    {
        return [
            "1" => "January",
            "2" => "February",
            "3" => "March",
            "4" => "April",
            "5" => "May",
            "6" => "June",
            "7" => "July",
            "8" => "August",
            "9" => "September",
            "10" => "October",
            "11" => "November",
            "12" => "December",
        ];
    }

    public static function getCountries()
    {
        return [
            "Afghanistan" => "Afghanistan",
            "Albania" => "Albania",
            "Algeria" => "Algeria",
            "American Samoa" => "American Samoa",
            "Andorra" => "Andorra",
            "Angola" => "Angola",
            "Anguilla" => "Anguilla",
            "Antarctica" => "Antarctica",
            "Antigua and Barbuda" => "Antigua and Barbuda",
            "Argentina" => "Argentina",
            "Armenia" => "Armenia",
            "Aruba" => "Aruba",
            "Australia" => "Australia",
            "Austria" => "Austria",
            "Azerbaijan" => "Azerbaijan",
            "Bahamas" => "Bahamas",
            "Bahrain" => "Bahrain",
            "Bangladesh" => "Bangladesh",
            "Barbados" => "Barbados",
            "Belarus" => "Belarus",
            "Belgium" => "Belgium",
            "Belize" => "Belize",
            "Benin" => "Benin",
            "Bermuda" => "Bermuda",
            "Bhutan" => "Bhutan",
            "Bolivia" => "Bolivia",
            "Bosnia and Herzegovina" => "Bosnia and Herzegovina",
            "Botswana" => "Botswana",
            "Bouvet Island" => "Bouvet Island",
            "Brazil" => "Brazil",
            "British Indian Ocean Territory" => "British Indian Ocean Territory",
            "Brunei Darussalam" => "Brunei Darussalam",
            "Bulgaria" => "Bulgaria",
            "Burkina Faso" => "Burkina Faso",
            "Burundi" => "Burundi",
            "Cambodia" => "Cambodia",
            "Cameroon" => "Cameroon",
            "Canada" => "Canada",
            "Cape Verde" => "Cape Verde",
            "Cayman Islands" => "Cayman Islands",
            "Central African Republic" => "Central African Republic",
            "Chad" => "Chad",
            "Chile" => "Chile",
            "China" => "China",
            "Christmas Island" => "Christmas Island",
            "Cocos (Keeling) Islands" => "Cocos (Keeling) Islands",
            "Colombia" => "Colombia",
            "Comoros" => "Comoros",
            "Congo" => "Congo",
            "Cook Islands" => "Cook Islands",
            "Costa Rica" => "Costa Rica",
            "Cote D'Ivoire" => "Cote D'Ivoire",
            "Croatia" => "Croatia",
            "Cuba" => "Cuba",
            "Cyprus" => "Cyprus",
            "Czech Republic" => "Czech Republic",
            "Denmark" => "Denmark",
            "Djibouti" => "Djibouti",
            "Dominica" => "Dominica",
            "Dominican Republic" => "Dominican Republic",
            "East Timor" => "East Timor",
            "Ecuador" => "Ecuador",
            "Egypt" => "Egypt",
            "El Salvador" => "El Salvador",
            "Equatorial Guinea" => "Equatorial Guinea",
            "Eritrea" => "Eritrea",
            "Estonia" => "Estonia",
            "Ethiopia" => "Ethiopia",
            "Falkland Islands (Malvinas)" => "Falkland Islands (Malvinas)",
            "Faroe Islands" => "Faroe Islands",
            "Fiji" => "Fiji",
            "Finland" => "Finland",
            "France, Metropolitan" => "France, Metropolitan",
            "French Guiana" => "French Guiana",
            "French Polynesia" => "French Polynesia",
            "French Southern Territories" => "French Southern Territories",
            "Gabon" => "Gabon",
            "Gambia" => "Gambia",
            "Georgia" => "Georgia",
            "Germany" => "Germany",
            "Ghana" => "Ghana",
            "Gibraltar" => "Gibraltar",
            "Greece" => "Greece",
            "Greenland" => "Greenland",
            "Grenada" => "Grenada",
            "Guadeloupe" => "Guadeloupe",
            "Guam" => "Guam",
            "Guatemala" => "Guatemala",
            "Guinea" => "Guinea",
            "Guinea-Bissau" => "Guinea-Bissau",
            "Guyana" => "Guyana",
            "Haiti" => "Haiti",
            "Heard and Mc Donald Islands" => "Heard and Mc Donald Islands",
            "Honduras" => "Honduras",
            "Hong Kong" => "Hong Kong",
            "Hungary" => "Hungary",
            "Iceland" => "Iceland",
            "India" => "India",
            "Indonesia" => "Indonesia",
            "Iran (Islamic Republic of)" => "Iran (Islamic Republic of)",
            "Iraq" => "Iraq",
            "Ireland" => "Ireland",
            "Israel" => "Israel",
            "Italy" => "Italy",
            "Jamaica" => "Jamaica",
            "Japan" => "Japan",
            "Jordan" => "Jordan",
            "Kazakhstan" => "Kazakhstan",
            "Kenya" => "Kenya",
            "Kiribati" => "Kiribati",
            "North Korea" => "North Korea",
            "Korea, Republic of" => "Korea, Republic of",
            "Kuwait" => "Kuwait",
            "Kyrgyzstan" => "Kyrgyzstan",
            "Lao People's Democratic Republic" => "Lao People's Democratic Republic",
            "Latvia" => "Latvia",
            "Lebanon" => "Lebanon",
            "Lesotho" => "Lesotho",
            "Liberia" => "Liberia",
            "Libyan Arab Jamahiriya" => "Libyan Arab Jamahiriya",
            "Liechtenstein" => "Liechtenstein",
            "Lithuania" => "Lithuania",
            "Luxembourg" => "Luxembourg",
            "Macau" => "Macau",
            "FYROM" => "FYROM",
            "Madagascar" => "Madagascar",
            "Malawi" => "Malawi",
            "Malaysia" => "Malaysia",
            "Maldives" => "Maldives",
            "Mali" => "Mali",
            "Malta" => "Malta",
            "Marshall Islands" => "Marshall Islands",
            "Martinique" => "Martinique",
            "Mauritania" => "Mauritania",
            "Mauritius" => "Mauritius",
            "Mayotte" => "Mayotte",
            "Mexico" => "Mexico",
            "Micronesia, Federated States of" => "Micronesia, Federated States of",
            "Moldova, Republic of" => "Moldova, Republic of",
            "Monaco" => "Monaco",
            "Mongolia" => "Mongolia",
            "Montserrat" => "Montserrat",
            "Morocco" => "Morocco",
            "Mozambique" => "Mozambique",
            "Myanmar" => "Myanmar",
            "Namibia" => "Namibia",
            "Nauru" => "Nauru",
            "Nepal" => "Nepal",
            "Netherlands" => "Netherlands",
            "Netherlands Antilles" => "Netherlands Antilles",
            "New Caledonia" => "New Caledonia",
            "New Zealand" => "New Zealand",
            "Nicaragua" => "Nicaragua",
            "Niger" => "Niger",
            "Nigeria" => "Nigeria",
            "Niue" => "Niue",
            "Norfolk Island" => "Norfolk Island",
            "Northern Mariana Islands" => "Northern Mariana Islands",
            "Norway" => "Norway",
            "Oman" => "Oman",
            "Pakistan" => "Pakistan",
            "Palau" => "Palau",
            "Panama" => "Panama",
            "Papua New Guinea" => "Papua New Guinea",
            "Paraguay" => "Paraguay",
            "Peru" => "Peru",
            "Philippines" => "Philippines",
            "Pitcairn" => "Pitcairn",
            "Poland" => "Poland",
            "Portugal" => "Portugal",
            "Puerto Rico" => "Puerto Rico",
            "Qatar" => "Qatar",
            "Reunion" => "Reunion",
            "Romania" => "Romania",
            "Russian Federation" => "Russian Federation",
            "Rwanda" => "Rwanda",
            "Saint Kitts and Nevis" => "Saint Kitts and Nevis",
            "Saint Lucia" => "Saint Lucia",
            "Saint Vincent and the Grenadines" => "Saint Vincent and the Grenadines",
            "Samoa" => "Samoa",
            "San Marino" => "San Marino",
            "Sao Tome and Principe" => "Sao Tome and Principe",
            "Saudi Arabia" => "Saudi Arabia",
            "Senegal" => "Senegal",
            "Seychelles" => "Seychelles",
            "Sierra Leone" => "Sierra Leone",
            "Singapore" => "Singapore",
            "Slovak Republic" => "Slovak Republic",
            "Slovenia" => "Slovenia",
            "Solomon Islands" => "Solomon Islands",
            "Somalia" => "Somalia",
            "South Africa" => "South Africa",
            "South Georgia & South Sandwich Islands" => "South Georgia & South Sandwich Islands",
            "Spain" => "Spain",
            "Sri Lanka" => "Sri Lanka",
            "St. Helena" => "St. Helena",
            "St. Pierre and Miquelon" => "St. Pierre and Miquelon",
            "Sudan" => "Sudan",
            "Suriname" => "Suriname",
            "Svalbard and Jan Mayen Islands" => "Svalbard and Jan Mayen Islands",
            "Swaziland" => "Swaziland",
            "Sweden" => "Sweden",
            "Switzerland" => "Switzerland",
            "Syrian Arab Republic" => "Syrian Arab Republic",
            "Taiwan" => "Taiwan",
            "Tajikistan" => "Tajikistan",
            "Tanzania, United Republic of" => "Tanzania, United Republic of",
            "Thailand" => "Thailand",
            "Togo" => "Togo",
            "Tokelau" => "Tokelau",
            "Tonga" => "Tonga",
            "Trinidad and Tobago" => "Trinidad and Tobago",
            "Tunisia" => "Tunisia",
            "Turkey" => "Turkey",
            "Turkmenistan" => "Turkmenistan",
            "Turks and Caicos Islands" => "Turks and Caicos Islands",
            "Tuvalu" => "Tuvalu",
            "Uganda" => "Uganda",
            "Ukraine" => "Ukraine",
            "United Arab Emirates" => "United Arab Emirates",
            "United Kingdom" => "United Kingdom",
            "United States" => "United States",
            "United States Minor Outlying Islands" => "United States Minor Outlying Islands",
            "Uruguay" => "Uruguay",
            "Uzbekistan" => "Uzbekistan",
            "Vanuatu" => "Vanuatu",
            "Vatican City State (Holy See)" => "Vatican City State (Holy See)",
            "Venezuela" => "Venezuela",
            "Viet Nam" => "Viet Nam",
            "Virgin Islands (British)" => "Virgin Islands (British)",
            "Virgin Islands (U.S.)" => "Virgin Islands (U.S.)",
            "Wallis and Futuna Islands" => "Wallis and Futuna Islands",
            "Western Sahara" => "Western Sahara",
            "Yemen" => "Yemen",
            "Democratic Republic of Congo" => "Democratic Republic of Congo",
            "Zambia" => "Zambia",
            "Zimbabwe" => "Zimbabwe",
            "Jersey" => "Jersey",
            "Guernsey" => "Guernsey",
            "Montenegro" => "Montenegro",
            "Serbia" => "Serbia",
            "Aaland Islands" => "Aaland Islands",
            "Bonaire, Sint Eustatius and Saba" => "Bonaire, Sint Eustatius and Saba",
            "Curacao" => "Curacao",
            "Palestinian Territory, Occupied" => "Palestinian Territory, Occupied",
            "South Sudan" => "South Sudan",
            "St. Barthelemy" => "St. Barthelemy",
            "St. Martin (French part)" => "St. Martin (French part)",
            "Canary Islands" => "Canary Islands"
        ];
    }

    public static function getCitizenshipList()
    {
        return [
            "SG" => "Singaporean",
            "SPR" => "Singapore PR",
            "FR" => "Foreigner",
        ];
    }

    public static function getMaritalStatusList()
    {
        return [
            "1" => "SINGLE",
            "2" => "MARRIED",
            "3" => "DIVORCED",
            "4" => "WIDOWED",
            "5" => "SEPERATED",
            "6" => "OTHERS",
        ];
    }

    public static function getCpfrateTypeList()
    {
        return [
            "ALL" => "ALL",
            "F/G" => "F/G",
            "G/G" => "G/G",
        ];
    }
	
	public static function getWorkPass()
    {
        return [
            "S" => "S Pass",
            "E" => "E Pass",
            "WP" => "Work Permit",
        ];
    }

    public static function getContributionCpfType()
    {
        return [
            "G" => "General",
            "FSPR" => "First year of SPR",
            "SSPR" => "Second year of SPR",
        ];
    }

    public static function getContributionWages()
    {
        return [
            'SINDA' => 'SINDA', 
            'MBMF' => 'MBMF', 
            'ECF' => 'ECF',
            'CDAC' => 'CDAC'
        ];
    }

	
	public static function getPayItemCategory()
	{
		return [
			"A" => "Addition",
			"D" => "Deduction",
			"R" => "Reimbursement",
			"OT" => "Overtime",
		];
	}
	
	public static function getCpfType()
    {
       
        return [
            "OW" => "Ordinary Wages",
            "AW" => "Additional Wages",
            "NCPF" => "No CPF",
        ];
    }
    public static function getFrequency()
	{
       
       
		return [
			"F" => "Fixed",
			"V" => "Variable",
		];
	}
	
	public static function getAmountOption()
    {
        return [
            "1" => "__% of Present month’s basic salary",
            "2" => "Amount per day for the days actually worked in a month",
            "3" => "Amount per day for the Total Working days in a month",
            "4" => "Other user entered amount (may differ every month)",
        ];
    }
    public static function getPaymentMode()
        {
            return [
                "1" => "Interbank GIRO",
                "2" => "Cash",
                "3" => "Cheque",
               
            ];
        }
    public static function getEmployeeStatus()
	{
		return [
			"P" => "Probation",
			"C" => "Confirmed",
			"R" => "Resigned",
			
		];
	}

      public static function getSalaryoptions()
    {
        return [
            /*"1" => "Hourly",*/
            "3" => "Daily",
            "2" => "Monthly",
            
        ];
    }
    
	
	public static function CurrencyToNumeric($Currency)
    {
        $Currency = str_replace("$", "", $Currency);
        $Currency = str_replace(",", "", $Currency);
        $Currency = str_replace(" ", "", $Currency);
        return $Currency;
    }

    public static function getEthnicrace()
    {
        return [
            "C" => "CHINESE",
            "I" => "INDIAN",
            "M" => "MALAY",
            "E" => "EURASIAN",
            "O" => "OTHERS",
        ];
    }

    public static function getReligion()
    {
        return [
            "B" => "BUDDHIST",
            "CH" => "CHRISTIAN",
            "CA" => "CATHOLICISM",
            "FT" => "FREE THINKER",
            "H" => "HINDU",
            "M" => "MUSLIM",
            "S" => "SIKH",
            "T" => "TAOIST",
            "O" => "OTHERS",
        ];
    }

    public static function getYesno()
    {
        return [
            "Yes" => "Yes",
            "No" => "No",
        ];
    }
	
	public static function getLoanPaymentMode()
    {
        return [
            "1" => "E-Transfer",
            "2" => "Cheque",
			"3" => "Cash",
        ];
    }
	
	public static function getLoanAmountType()
    {
        return [
            "balance" => "Balance",
            "partial" => "Partial",
        ];
    }
	
	public static function getSector()
	{
		return [
		"0" => "Public",
		"1" => "Private"];	
	}
	
	public static function getWorkWeek()
	{
		return ['1' => '5 Days ( Monday - Friday )', 
				'2' => '5.5 Days ( Monday - Saturday 1/2 )', 
				'3' => '6 Days ( Monday - Saturday )'];	
	}

    public static function genereteyear()
    {
       return  $years = array_combine(range(date("Y"), 1930), range(date("Y"), 1930)) ;
    }

    public static function getMonthNamebyId($monthId)
    {
        if (!(is_null($monthId)||empty($monthId))&& $monthId>=1 && $monthId<=12) {
            $monthlist = self::getMonthList();
            return $monthlist[$monthId];
        } else {
            return null;
        }
        
    }

	public static function getEmployeeType()
	{
		return [
		'all' => 'All Employees',
		'title' => 'Based on Job Title',
		'category' => 'Based on Job Department',];	
	}

    public static function getPaymentModebyId($p_modeid){
        if (!(is_null($p_modeid)||empty($p_modeid))){
            $PaymentModes = self::getPaymentMode();
            return $PaymentModes[$p_modeid];
        }else
            return null;
    }

    public static function getEmployeeStatusById($statusId){
        if (!(is_null($statusId)||empty($statusId))){
            $tempStatusList = self::getEmployeeStatus();
            return $tempStatusList[$statusId];
        }else
            return null;
    }

   public static function getSalaryOptionsById($statusId){
        if (!(is_null($statusId)||empty($statusId))){
            var_dump("expression");
            $tempStatusList = self::getSalaryoptions();
            return $tempStatusList[$statusId];
        }else
            return null;
    }
    public static function getCitizenshipbyId($c_id){
        if (!(is_null($c_id)||empty($c_id))){
            $tempCitizenshipList = self::getCitizenshipList();
            return $tempCitizenshipList[$c_id];
        }else
            return null;
    }

    public static function getLeaveDay()
    {
        return ['SDAY' => 'Single Day',
                'MDAY' => 'Multi Days'];
    }

    public static function getLeaveFirst()
    {
        return ['ALL' => 'All day',
                'FAM' => 'First part of the day'];
    }

    public static function getLeaveSecond()
    {
        return ['ALL' => 'All day',
                'SPM' => 'Second part of the day'];
    }

    public static function getLeaveSingle()
    {
        return ['ALL' => 'All day',
                'FAM' => 'First part of the day',
                'SPM' => 'Second part of the day'];
    }

    public static function getMonthStartAndEnd($month, $year){
        $tempMonth = intval($month);
        $tempResult = [
            "month_start" => null,
            "month_end" => null
        ];
        if($tempMonth >= 1 && $tempMonth <=12){
            $tempFirstofMonth = "first DAY of ".CommonModel::getMonthNamebyId($month)." ".$year;
            $tempLastofMonth = "last DAY of ".CommonModel::getMonthNamebyId($month)." ".$year;

            $tempResult["month_start"] = date("Y-m-d", strtotime($tempFirstofMonth));
            $tempResult["month_end"] = date("Y-m-d", strtotime($tempLastofMonth));
        }
        return $tempResult;
    }

    public static function getHrsAndMins($total_minutes, $format = '%d:%d') {
        settype($total_minutes, 'integer');
        if ($total_minutes < 1) {
            return;
        }
        $hours = floor($total_minutes / 60);
        $minutes = ($total_minutes % 60);
        return sprintf($format, $hours, $minutes);
    }
    
    public static function getStatus()
    {
        //Salary Adjustment Status
        return ['0' => 'In Progress',
                '1' => 'Completed'];
    }
    public static function getIr8aStatus()
    {
        //IR8A Adjustment Status
        return ['1' => 'In Progress',
                '2' => 'Confirm'];
    }
    public static function getSalaryStatus()
    {
        return ['1' => 'Hourly',
                '2' => 'Monthly',
                '3' => 'Daily',];
    }

    public static function getMonthIdbyName($monthName)
    {
        $MonthList = self::getMonthList();
        $tempMonth = array_search($monthName, $MonthList);
        if ($tempMonth) {
            return $tempMonth;
        } else {
            return null;
        }

    }

    public static function getHolidayLeavetype()
    {
        return ['Half' => 'Half Day',
                'Full' => 'Full Day'];
    }

    public static function getLeaveStatus()
    {
        return ['P' => 'Pending',
                'A' => 'Approved',
                'R' => 'Rejected'];
    }

    public static function getMonthListByMonths($month_list, $attribute_name){
        $calendar_months = self::getMonthList();
        $temp_result = [];
        foreach ($month_list as $eachRow) {
            $temp_month_number = $eachRow[$attribute_name];
            if(array_key_exists($temp_month_number,$calendar_months)){
                $temp_result[$temp_month_number] = $calendar_months[$temp_month_number];
            }
        }

        return $temp_result;
    }

/*    public static function getBatchList(){
         return [
            "1" => "Original",
            "2" => "Amendment",
            
        ];
    }

       public static function getBatchName($batch_list, $attribute_name){
        $batchs = self::getBatchList();
        $temp_result = [];
        foreach ($batch_list as $eachRow) {
            $temp_batch_number = $eachRow[$attribute_name];
            if(array_key_exists($temp_batch_number,$batchs)){
                $temp_result[$temp_batch_number] = $batchs[$temp_batch_number];
            }
        }

        return $temp_result;
    }*/
	
	public static function getEstablishedYearRange(){
		$data = CompanyBusinessInfoModel::find()->select('established_year')
												->where(['company_id' => \Yii::$app->user->identity->company_id])
												->asArray()->one();
		$year = $data['established_year'];
		$finYear = [$year-1 => $year-1, $year => $year, $year+1 => $year+1];
		return $finYear;	
	}


    public static function getPayrollProcessingWagesYearRange(){
        $data = WagesModel::find()->select('financial_year')->asArray() ->distinct()->all();
         
           if(!empty($data)){
           
                foreach ($data as $key => $value) {
                    $yr=$value['financial_year'];
                    $finYear[$yr]= $value['financial_year'];
                }
        return $finYear;
            }
     
    }
    public static function getPayrollProcessingContributionYearRanges(){
        $data = ContributionModel::find()->select('financial_year')->asArray() ->distinct()->all();
        if(!empty($data)){
           
                foreach ($data as $key => $value) {
                    $yr=$value['financial_year'];
                    $finYears[$yr]= $value['financial_year'];
                }
        return $finYears;
            }
              
     
    }

    public static function getSalaryStatusById($salaryId)
    {
        if (!(is_null($salaryId)||empty($salaryId))){
            $tempSalaryStatusList = self::getSalaryStatus();
            if(isset($tempSalaryStatusList[$salaryId]))
                return $tempSalaryStatusList[$salaryId];
            else
                return null;
        }else
            return null;
    }

    public static function getUserAccessType()
    {
        return [
            "admin" => "Admin",
            "staff" => "Staff",
            "adminandstaff" => "Admin & Staff"
        ];
    }

    public static function getClaimStatusList()
    {
        return [
            '1' => 'Pending',
            '2' => 'Approved',
            '3' => 'Rejected'
        ];
    }

    public static function getClaimStatus($status_id){
        if (!(is_null($status_id)||empty($status_id))){
            $statusList = self::getClaimStatusList();
            if(isset($statusList[$status_id]))
                return $statusList[$status_id];
            else
                return null;
        }else
            return null;

    }

    public static function getPaidLeaves()
    {
        return [
            'Sick Leave','Annual Leave','Maternity leave',
            'Adoption leave','Childcare leave','Paternity leave','Unpaid infant care leave'
        ];
    }

    public static function getLeaveStatusbyId($status_id)
    {
        if (!(is_null($status_id)||empty($status_id))){
            $statusList = self::getLeaveStatus();
            if(isset($statusList[$status_id]))
                return $statusList[$status_id];
            else
                return null;
        }else
            return null;
    }

    public static function getCompanyAdminInfo($company_id)
    {
        $AdminInfo = [];
        if(isset($company_id)&&!empty($company_id)){
            $connection = \Yii::$app->db;
            $itemname = "hrmClientAdmin_".$company_id;
            $model = $connection->createCommand("SELECT hu.id,hu.email,hu.fullname,haa.item_name FROM  hrm_users hu INNER JOIN hrm_auth_assignment haa ON haa.user_id = hu.id WHERE item_name = '".$itemname."'");
            $AdminInfo = $model->queryOne();
        }

        return $AdminInfo;
    }
}