<?php
if($_SERVER['HTTP_HOST'] == 'localhost'){
	$http = 'http';
}else{
	$http = 'https';
}
return [
    'building_file_path' =>  \Yii::getAlias('@storage').'/web/buildings/',
    'building_file_path_temp' =>  \Yii::getAlias('@storage').'/web/buildings/temp/',
    'rets_xml_path' =>  \Yii::getAlias('@storage').'/web/rets/',
    'rets_path' =>  \Yii::getAlias('@storage').'/web/rets/',
    'basePath' => dirname(__DIR__),
    'ContactAuthUserRole'=>['agent'],
    'field_type' => ['text'=>'Text','textarea'=>'Textarea','checkbox'=>'Checkbox','dropdown'=>'Dropdown','radio'=>'Radio','file'=>'File','number'=>'Number','button'=>'Button'],
    'input_type' => ['text','file','number','button'],
    'client_attatch_path' =>  \Yii::getAlias('@storage').'/web/client_attachments/',
    'Status_type' => [1=>'Unopened',2=>'Viewed',3=>'Review',4=>'Completed',5=>'Received'],
    'http' => $http,
];
