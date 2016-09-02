<?php
     require_once('../conf/config.php');
	 require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	 
	 
	 $register_JSON=file_get_contents('php://input');
     if($register_JSON){
		$json_array=json_decode($register_JSON,true);
		if($json_array===null){
			exit(ACCEPTJSON_ERROR_CODE);
		}
	 }
	 else{
		 exit(ACCEPTJSON_ERROR_CODE);
	 }
	 $connect_database = new Connect_database();
	 
	 $reg_mail=$json_array['reg_mail'];
	 $reg_name=$json_array['reg_name'];
	 $reg_passwd=$json_array['reg_passwd'];
	 $reg_aca_id=$json_array['reg_aca_id'];
	 $reg_pro_id=$json_array['reg_pro_id'];
	 $reg_add_city=$json_array['reg_add_city'];
	 $reg_sex=$json_array['reg_sex'];
	 $reg_phone=$json_array['reg_phone'];
	 
	 $register_sql=
	 'call register_user("'.$reg_mail.'","'.$reg_passwd.'","'.$reg_name.'","'.$reg_sex.'","'.$reg_phone.'",'.$reg_aca_id.','.$reg_pro_id.',"'.$reg_add_city.'");';
		if($connect_database->myQuery($register_sql)){
		 exit(SUCCESS_CODE);
	   }
	   else{
		 exit(INSERT_DATABASE_ERROR_CODE);
	   }  

	 
	
	 
	 
	 



