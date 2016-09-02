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
	 
	 $news_user_id=$json_array['news_user_id'];
	 $news_title=$json_array['news_title'];
	 $news_content=$json_array['news_content'];
	 $news_picture_url=$json_array['news_picture_url'];
	 
	 $connect_database=new Connect_database();
	 if($news_picture_url==0){
		
		$sql='call register_news ("'.$news_title.'","'.$news_user_id.'","'.$news_content.'");';
		if($connect_database->myQuery($sql)){
		 echo SUCCESS_CODE;
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  

		 
	 }
	 else{
		 //$sql='call register_college_notice_nonpicture ("'.$col_not_title.'","'.$user_id.'","'.$col_not_con.'");';
		 $sql='INSERT news(news_time,news_user_id,news_title,news_content)
VALUES(CURDATE(),"'.$news_user_id.'","'.$news_title.'","'.$news_content.'");';
		 if($connect_database->myQuery($sql)){
		 //exit(SUCCESS_CODE);
		 echo $connect_database->get_insert_id();
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  
	 }