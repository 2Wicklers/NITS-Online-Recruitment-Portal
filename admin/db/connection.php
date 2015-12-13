<?php
include "config.php";
function attempt_connection($db_name) {
	connect_db(DB_SERVER,DB_USERNAME,DB_PASSWORD,$db_name);
}
function create_db($db_name) {
	$query = "CREATE DATABASE IF NOT EXISTS ".$db_name;
	$result = mysql_query($query) or die(mysql_error());
	$password = md5(SHA1('nits_rec@123'));
	$query1 = "CREATE TABLE IF NOT EXISTS ".$db_name.".admin (id int(2) NOT NULL auto_increment, username varchar(40) NOT NULL DEFAULT 'admin', password varchar(255) NOT NULL DEFAULT '".mysql_real_escape_string($password)."', PRIMARY KEY (id))";
	$result1 = mysql_query($query1) or die(mysql_error());
	mysql_select_db($db_name);
	$query2 = "INSERT INTO admin (id) VALUES('1')";
	$result2 = mysql_query($query2) or die(mysql_error());
}
function establish_connection($db_server,$db_username,$db_password)
{
	$connection = mysql_connect($db_server,$db_username,$db_password);
	if($connection)
		return 1;
}
function connect_db($db_server,$db_username,$db_password,$db_name) {
	if(establish_connection($db_server,$db_username,$db_password))
	{
		$database = mysql_select_db($db_name);
		if($database)
			return 1;
		else
			create_db($db_name);
			return 1;
	}
	else
	{
		die("Couldn't establish connection to database");
	}
}
?>