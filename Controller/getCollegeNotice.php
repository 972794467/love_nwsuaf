<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	
	$college_notice_JSON=file_get_contents('php://input');
	if($college_notice_JSON){
		$json_array=json_decode($college_notice_JSON,true);
		if($json_array===null){
			exit(ACCEPTJSON_ERROR_CODE);
		}
	 }
	 else{
		 exit(ACCEPTJSON_ERROR_CODE);
	 }
	$college_notice_id=$json_array['get_col_not_id'];
	
	$connect_database = new Connect_database();
	$sql='select * from college_notice where college_notice_id<'.$college_notice_id.' limit '.NOTICE_NUMBER.';';
	
	$notices=$connect_database->myQuery_multiple($sql);
	$json_result=json_encode($notices);
	print_r($json_result);
	
	
	
	
	
	
	
