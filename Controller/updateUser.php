<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	
	$updateUser_JSON=file_get_contents('php://input');
	if($updateUser_JSON){
		$json_array=json_decode($updateUser_JSON,true);
		if($json_array===null){
			exit(ACCEPTJSON_ERROR_CODE);
		}
	 }
	 else{
		 exit(ACCEPTJSON_ERROR_CODE);
	 }
	 
	$user_id= $json_array['user_id'];
	$user_name= $json_array['user_name'];
	$user_phone= $json_array['user_phone'];
	$user_academy_number= $json_array['user_academy_number'];
	$user_address_province= $json_array['user_address_province'];
	$user_address_city= $json_array['user_address_city'];
	$user_sex= $json_array['user_sex'];
	$user_avatar= $json_array['user_avatar'];
	 
	$connect_database=new Connect_database();
	
	$sql='call update_user("'.$user_id.'","'.$user_name.'","'.$user_sex.'","'.$user_phone.'","'.$user_academy_number.'",
	"'.$user_address_province.'","'.$user_address_city.'","'.$user_avatar.'");';
	
	if($connect_database->myQuery($sql)){
		 echo SUCCESS_CODE;
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  
	
	