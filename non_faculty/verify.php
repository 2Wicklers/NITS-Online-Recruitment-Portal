<?php
include "h.conn.php";
if(isset($_GET['vid']) && isset($_GET['rid']))
{
	$q = "SELECT email, email_verified FROM user_info WHERE reg_id='".$_GET['rid']."'";
	$r = mysql_query($q) or die(mysql_error());
	if(mysql_num_rows($r))
	{	
		$d = mysql_fetch_array($r);
		$o_e = md5($d['email']);
		
		if($_GET['vid']==$o_e && $d['email_verified']!='1')
		{
			$q1 = "UPDATE user_info SET email_verified=1 WHERE reg_id='".$_GET['rid']."'";
			$r1 = mysql_query($q1) or die(mysql_error());
			session_start();
			$_SESSION['reg_id_nf']=$_GET['rid'];
			header("location:form.php");
		}
		else
		{
				session_start();
				$_SESSION['reg_id_nf']=$_GET['rid'];
				header("location:form.php");
		}
	}
	else
	{
		header("location:index.php");
	}
}
else
{
	header("location:index.php");
}
?>