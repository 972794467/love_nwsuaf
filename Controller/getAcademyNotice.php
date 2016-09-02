<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	
	$academy_notice_JSON=file_get_contents('php://input');
	if($academy_notice_JSON){
		$json_array=json_decode($academy_notice_JSON,true);
		if($json_array===null){
			exit(ACCEPTJSON_ERROR_CODE);
		}
	 }
	 else{
		 exit(ACCEPTJSON_ERROR_CODE);
	 }
	$academy_notice_id=$json_array['get_aca_id'];
	$academy_id=$json_array['aca_id'];
	
	$connect_database = new Connect_database();
	$sql='select * from academy_notice where academy_notice_id<'.$academy_notice_id.' and academy_notice_academy_number='.$academy_id.' limit '.NOTICE_NUMBER.';';
	
	$notices=$connect_database->myQuery_multiple($sql);
	$json_result=json_encode($notices);
	print_r($json_result);