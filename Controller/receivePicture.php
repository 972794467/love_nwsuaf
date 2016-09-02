<?php
	require_once('../conf/config.php');
	require_once('../Model/connect'.DATABASE_CONNECT.'.php');
	
	$file_name=$_FILES['file']['name'];
	$file_type=$_FILES['file']['type'];
	$fileTmp_name=$_FILES['file']['tmp_name'];
	$file_size=$_FILES['file']['size'];
	$file_error=$_FILES['file']['error'];
	if(move_uploaded_file($fileTmp_name,"../src/img/".$file_name)){     //将图片放在指定位置
		//exit(SUCCESS_CODE);
		$picture_array=explode("_",$file_name,3);
		$connect_database=new Connect_database();
	    switch ($picture_array[0]){
			case 1:
			$table_name='college_notice';
			$column_name='college_notice_id';
			break;
			case 2:
			$table_name='academy_notice';
			$column_name='academy_notice_id';
			break;
			case 3:
			$table_name='topic';
			$column_name='topic_id';
			break;
			case 4:
			$table_name='hometown';
			$column_name='hometown_primary_id';
			break;
			case 5:
			$table_name='news';
			$column_name='news_id';
			break;
			default:
			exit(COMMENT_TYPE_ID);
			}
		$path=PICTURE_PATH.$file_name;
		
		$sql='update '.$table_name.' set college_notice_picture_url = "'.$path.'" where '.$column_name.'='.$picture_array[1].' ;';
		if($connect_database->myQuery($sql)){
		echo SUCCESS_CODE;	
			
		}
		else{
			exit(RECEIVE_PICTURE_ERROR_CODE);
		}
	}
	else{
		exit(RECEIVE_PICTURE_ERROR_CODE);
		
	}
	

