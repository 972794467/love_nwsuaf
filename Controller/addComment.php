<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	
	$comment_JSON=file_get_contents('php://input');
	if($comment_JSON){
		$json_array=json_decode($comment_JSON,true);
		if($json_array===null){
			exit(ACCEPTJSON_ERROR_CODE);
		}
	 }
	 else{
		 exit(ACCEPTJSON_ERROR_CODE);
	 }
	 
	$comment_type=$json_array['comment_type'];
	$notice_id=$json_array['notice_id'];
	$comment_content=$json_array['comment_content'];
	$user_id=$json_array['user_id'];
	 
	 
	switch ($comment_type){
	case 1:
	$table_name='college_notice_comment';
	break;
	case 2:
	$table_name='academy_notice_comment';
	break;
	case 3:
	$table_name='topic_comment';
	break;
	case 4:
	$table_name='hometown_comment';
	break;
	case 5:
	$table_name='news_comment';
	break;
	default:
	exit(COMMENT_TYPE_ID);
	}

	$connect_database=new Connect_database();
	
	$sql='call register_'.$table_name.' ("'.$notice_id.'","'.$user_id.'","'.$comment_content.'");';
	
	if($connect_database->myQuery($sql)){
		 echo SUCCESS_CODE;
	    }
	    else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	    }  
	
	
	