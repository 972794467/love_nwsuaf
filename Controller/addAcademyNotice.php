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
	 
	 $user_id=$json_array['user_id'];
	 $aca_not_title=$json_array['aca_not_title'];
	 $aca_not_con=$json_array['aca_not_con'];
	 $aca_not_pic=$json_array['aca_not_pic'];
	 $aca_id=$json_array['aca_id'];
	 
	 $connect_database=new Connect_database();
	 if($aca_not_pic==0){
		$sql='call register_academy_notice_nonpicture ("'.$aca_id.'","'.$aca_not_title.'","'.$user_id.'","'.$aca_not_con.'");';
		if($connect_database->myQuery($sql)){
		 echo SUCCESS_CODE;
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  

		 
	 }
	 else{
		 //$sql='call register_college_notice_nonpicture ("'.$col_not_title.'","'.$user_id.'","'.$col_not_con.'");';
		 $sql='INSERT academy_notice(academy_notice_time,academy_notice_user_id,academy_notice_title,academy_notice_content,academy_notice_academy_number)
VALUES(CURDATE(),"'.$user_id.'","'.$aca_not_title.'","'.$aca_not_con.'","'.$aca_id.'");';
		 if($connect_database->myQuery($sql)){
		 //exit(SUCCESS_CODE);
		 echo $connect_database->get_insert_id();
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  
	 }
	 