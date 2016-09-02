<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	
	$news_JSON=file_get_contents('php://input');
	if($news_JSON){
		$json_array=json_decode($news_JSON,true);
		if($json_array===null){
			exit(ACCEPTJSON_ERROR_CODE);
		}
	 }
	 else{
		 exit(ACCEPTJSON_ERROR_CODE);
	 }
	$news_id=$json_array['get_news_id'];
	
	$connect_database = new Connect_database();
	$sql='select * from news where news_id<'.$news_id.' limit '.NOTICE_NUMBER.';';
	
	$notices=$connect_database->myQuery_multiple($sql);
	$json_result=json_encode($notices);
	print_r($json_result);
	
	