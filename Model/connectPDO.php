<?php
	class Connect_database{
	private $db_link;
	function __construct(){
		$dsn="mysql:host=".DATABASE_HOST.";dbname=".DATABASE_DBNAME;
		$this->db_link=new PDO($dsn,DATABASE_USER,DATABASE_PASSWORD);
		$this->db_link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
	}
	public function myQuery($sql){
		$result=$this->db_link->query($sql);
		
		
	}
	
	}