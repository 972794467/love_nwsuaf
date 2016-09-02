<?php
    $db_link=mysql_connect(DATABASE_HOST,DATABASE_USER,DATABASE_PASSWORD);
	if (!$db_link){
    die('Fail to connect to database:' . mysql_error());
    }
	mysql_select_db(DATABASE_DBNAME);
	