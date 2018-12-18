<?php

$db_host = '';
$db_name = '';
$db_username = '';
$db_password = '';

$dsn = "mysql:host=$db_host;dbname=$db_name";

try{$db_connection = new PDO($dsn, $db_username, $db_password);}
catch(Exception $e){	
	echo "There was a failure - " . $e->getMessage();}
