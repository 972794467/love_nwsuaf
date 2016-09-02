<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	
	$topic_JSON=file_get_contents('php://input');
	if($topic_JSON){
		$json_array=json_decode($topic_JSON,true);
		if($json_array===null){
			exit(ACCEPTJSON_ERROR_CODE);
		}
	 }
	 else{
		 exit(ACCEPTJSON_ERROR_CODE);
	 }
	$get_topic_id=$json_array['get_topic_id'];
	
	$connect_database = new Connect_database();
	$sql='select * from topic where topic_id<'.$get_topic_id.' limit '.NOTICE_NUMBER.';';
	
	$topic=$connect_database->myQuery_multiple($sql);
	$json_result=json_encode($topic);
	print_r($json_result);
	
	
	