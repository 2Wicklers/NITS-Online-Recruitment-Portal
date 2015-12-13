<?php
mysql_connect('localhost', 'root', '');
if(mysql_select_db("nits_recruitment_nf"))
{
}
else
{
	$q = "CREATE DATABASE nits_recruitment_nf" or die(mysql_error());
	$r = mysql_query($q) or die(mysql_error());
	echo "Database nits_recruitment_nf created successfully<br/>";
}
?>
