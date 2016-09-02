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
	 
	 $user_id=$json_array['top_user_id'];
	 $top_tit=$json_array['top_tit'];
	 $top_con=$json_array['top_con'];
	 $top_pic=$json_array['top_pic'];
	 
	 $connect_database=new Connect_database();
	 if($top_pic==0){
		$sql='call register_topic_nonpicture ("'.$top_tit.'","'.$user_id.'","'.$top_con.'");';
		if($connect_database->myQuery($sql)){
		 echo SUCCESS_CODE;
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  

		 
	 }
	 else{
		 //$sql='call register_college_notice_nonpicture ("'.$col_not_title.'","'.$user_id.'","'.$col_not_con.'");';
		 $sql='INSERT topic(topic_time,topic_user_id,topic_title,topic_content)
VALUES(CURDATE(),"'.$user_id.'","'.$top_tit.'","'.$top_con.'");';
		 if($connect_database->myQuery($sql)){
		 //exit(SUCCESS_CODE);
		 echo $connect_database->get_insert_id();
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  
	 }