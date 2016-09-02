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
	 
	 $user_id=$json_array['user_id'];
	 $col_not_title=$json_array['col_not_title'];
	 $col_not_con=$json_array['col_not_con'];
	 $col_not_pic=$json_array['col_not_pic'];
	 
	 $connect_database=new Connect_database();
	 if($col_not_pic==0){
		$sql='call register_college_notice_nonpicture ("'.$col_not_title.'","'.$user_id.'","'.$col_not_con.'");';
		if($connect_database->myQuery($sql)){
		 echo SUCCESS_CODE;
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  

		 
	 }
	 else{
		 //$sql='call register_college_notice_nonpicture ("'.$col_not_title.'","'.$user_id.'","'.$col_not_con.'");';
		 $sql='INSERT college_notice(college_notice_time,college_notice_user_id,college_notice_title,college_notice_content)
VALUES(CURDATE(),"'.$user_id.'","'.$col_not_title.'","'.$col_not_con.'");';
		 if($connect_database->myQuery($sql)){
		 //exit(SUCCESS_CODE);
		 echo $connect_database->get_insert_id();
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  
	 }
	 