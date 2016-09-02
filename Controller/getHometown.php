<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	
	$hometown_JSON=file_get_contents('php://input');
	if($hometown_JSON){
		$json_array=json_decode($hometown_JSON,true);
		if($json_array===null){
			exit(ACCEPTJSON_ERROR_CODE);
		}
	 }
	 else{
		 exit(ACCEPTJSON_ERROR_CODE);
	 }
	$get_hom_id=$json_array['get_hom_id'];
	$hom_pro_id=$json_array['hom_pro_id'];
	
	$connect_database = new Connect_database();
	$sql='select * from hometown where hometown_primary_id<'.$get_hom_id.' and hometown_id='.$hom_pro_id.' limit '.NOTICE_NUMBER.';';
	
	$hometown=$connect_database->myQuery_multiple($sql);
	$json_result=json_encode($hometown);
	print_r($json_result);