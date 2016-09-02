<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	
	$login_JSON=file_get_contents('php://input');
	
	if($login_JSON){
		$json_array=json_decode($login_JSON,true);
		if($json_array===null){
			exit(ACCEPTJSON_ERROR_CODE);
		}
	 }
	 else{
		 exit(ACCEPTJSON_ERROR_CODE);
	 }
	 
	 $connect_database = new Connect_database();
	 
	 $login_mail=$json_array['login_mail'];
	 $login_passwd=$json_array['login_passwd'];
	 $login_sql='select * from users where user_mail = "'.$login_mail.'";';
	 
	 $result=$connect_database->myQuery_singular($login_sql);
	 if($result!=null){
	 $passwd=$result['user_password'];
	      if($login_passwd==$passwd){
	        $json_result=json_encode($result);
			$sql='update users set user_online=1 where user_mail = "'.$login_mail.'";';
			$connect_database->myQuery($sql);
             print_r($json_result);	 
	        }
	         else{
		        exit(LOGIN_PASSWD_ERROR_CODE);
	          }
	 }
     else{
		 exit(LOGIN_MAIL_NOT_FOUND_CODE);
	 }	 
		 
	 
	 
	 
	 
	 
	 
	 
	 