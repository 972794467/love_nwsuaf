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
	 
	 $user_id=$json_array['user_id'];
	 $user_passwd=$json_array['user_passwd'];
	 
	$connect_database=new Connect_database();
	
	$sql='call update_passwd("'.$user_id.'","'.$user_passwd.'");';
	
	if($connect_database->myQuery($sql)){
		 echo SUCCESS_CODE;
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  