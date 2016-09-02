<?php
   class Connect_database{
	   private $db_link;
	    function __construct() {
          $this->db_link=new mysqli(DATABASE_HOST,DATABASE_USER,DATABASE_PASSWORD,DATABASE_DBNAME);
            if(mysqli_connect_errno()){
	           exit(CONNECT_DATABASE_ERROR_CODE);
              }
            else{
	           $this->db_link->query("set names utf8");
            }
       }
	   
	    function __destruct(){
			$this->db_link->close();
			
		}
	   public function myQuery($sql){                       //用于调用存储过程和无返回值的数据库操作
	      $result=$this->db_link->query($sql)or die(INSERT_DATABASE_ERROR_CODE);
		  if($result!==0){
			  //$result->free();
			  return 1;
			  
		  }
		   else{
			  //echo $result;
			  return 0;
		  }
        }
		
		public function myQuery_singular($sql){             //用于返回单条数据的操作
			
			$result=$this->db_link->query($sql);
			if($result==null){				
				return 0;
			}			
			$row=$result->fetch_assoc();
			$result->free();
			return $row;
					
		}
		
		public function myQuery_multiple($sql){              //用于返回多条数据的操作			
			$result=$this->db_link->query($sql);
			$rows=array();
			if(!$result->num_rows){
				return 0;
			}	
			while($row=$result->fetch_assoc()){
				$rows[]=$row;
			}
			$result->free();
			return $rows;
			
		}
		
		public function get_insert_id(){
			return mysqli_insert_id($this->db_link);
			
		}
	   
   
   }
   
   
 
   
   
   
  
   

	





