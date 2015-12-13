<?php
mysql_connect('localhost', 'root', '');
if(mysql_select_db("nits_recruitment"))
{
}
else
{
	$q = "CREATE DATABASE nits_recruitment" or die(mysql_error());
	$r = mysql_query($q) or die(mysql_error());
	echo "Database nits_recruitment created successfully<br/>";
}
?>
