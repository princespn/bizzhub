<?php
if($_SERVER['HTTP_HOST'] == 'localhost'){
	$http = 'http';
}else{
	$http = 'https';
}
return [
    'building_file_path' =>  \Yii::getAlias('@storage').'/web/buildings/',
    'building_file_path_temp' =>  \Yii::getAlias('@storage').'/web/buildings/temp/',
    'basePath' => dirname(__DIR__),
    'field_type' => ['text'=>'Text','textarea'=>'Textarea','checkbox'=>'Checkbox','dropdown'=>'Dropdown','radio'=>'Radio','file'=>'File','number'=>'Number','button'=>'Button'],
    'contact_limit' => ['10'=>'10','20'=>'20','30'=>'30','40'=>'40','50'=>'50','60'=>'60','70'=>'70','80'=>'80','90'=>'90','100'=>'100'],
    'contact_offset' => ['10'=>'10','20'=>'20','30'=>'30','40'=>'40','50'=>'50','60'=>'60','70'=>'70','80'=>'80','90'=>'90','100'=>'100'],
    'http'=>$http,
    'client_attatch_path' =>  \Yii::getAlias('@storage').'/web/client_attachments/',
    'client_instruction_path' =>  \Yii::getAlias('@storage').'/web/client_instruction/',
    'document_path_image' =>  \Yii::getAlias('@storage').'/web/document/image',
    'client_instruction_url' =>  '/web/client_instruction/',
    'roles' =>  ['admin'=>'admin','agent'=>'agent','client'=>'client','profileSelector'=>'profileSelector','successManager'=>'successManager','attorney'=>'attorney','mortgageLender'=>'mortgageLender'],
];
