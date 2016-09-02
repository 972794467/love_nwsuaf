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
	 
	 $hom_user_id=$json_array['hom_user_id'];
	 $hom_tit=$json_array['hom_tit'];
	 $hom_con=$json_array['hom_con'];
	 $hom_pic=$json_array['hom_pic'];
	 $hom_pro_id=$json_array['hom_pro_id'];
	 
	 $connect_database=new Connect_database();
	 if($hom_pic==0){
		$sql='call register_hometown_nonpicture ("'.$hom_user_id.'","'.$hom_tit.'","'.$hom_con.'","'.$hom_pro_id.'");';
		if($connect_database->myQuery($sql)){
		 echo SUCCESS_CODE;
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  

		 
	 }
	 else{
		 //$sql='call register_college_notice_nonpicture ("'.$col_not_title.'","'.$user_id.'","'.$col_not_con.'");';
		 $sql='INSERT hometown(hometown_time,hometown_user_id,hometown_title,hometown_content,hometown_id)
VALUES(CURDATE(),"'.$hom_user_id.'","'.$hom_tit.'","'.$hom_con.'","'.$hom_pro_id.'");';
		 if($connect_database->myQuery($sql)){
		 //exit(SUCCESS_CODE);
		 echo $connect_database->get_insert_id();
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  
	 }
	 