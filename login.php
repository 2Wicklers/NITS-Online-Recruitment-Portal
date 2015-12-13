<?php
include "h.conn.php";
if(isset($_POST['email']) && isset($_POST['password']))
{
	$password = md5(SHA1($_POST['password']));
	$q = "SELECT * FROM user_info JOIN user_other_details ON user_info.id=user_other_details.id WHERE user_info.email='".addslashes($_POST['email'])."' AND user_info.password='".$password."' AND user_other_details.submitted='2' ";
	$r = mysql_query($q) or die(mysql_error());
	$d = mysql_fetch_array($r);
	if(mysql_num_rows($r))
	{
		session_start();
		$_SESSION['reg_id'] = $d['reg_id'];
		header("location:form.php");
	}
	else
	{
		header("location:rlogin_a.php?f");
	}
}
?>
