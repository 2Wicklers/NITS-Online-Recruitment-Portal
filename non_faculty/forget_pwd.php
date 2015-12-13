<?php
session_start();
include "h.conn.php";

if(isset($_POST['email']))
{
	$email = addslashes($_POST['email']);
	$q = "SELECT reg_id, email FROM user_info WHERE email='".$email."' ";
	$r = mysql_query($q) or die(mysql_error());
	$d = mysql_fetch_array($r);
	
	if(!mysql_num_rows($r))
	{
		header("location:rlogin_a.php");
	}
	else
	{
			$reg_id = $d['reg_id'];
			$verify_id = md5(SHA1($email));

			include "phpmailer/class.phpmailer.php";
			include "phpmailer/class.smtp.php";

			$nits_rec2 = new phpmailer();

			$nits_rec2->IsSMTP();
			$nits_rec2->SMTPAuth = "true";
			$nits_rec2->SMTPDebug = 2;
			$nits_rec2->IsHTML(true);
			$nits_rec2->SMTPAuth = true;

			$nits_rec2->Username = "recruitment@nits.ac.in"; //to change email id from sending
			$nits_rec2->Password = "nits_rec@123"; //its password
			$nits_rec2->SMTPSecure = 'tls';
			$nits_rec2->From     = "recruitment@nits.ac.in";
			$nits_rec2->FromName = "NIT Silchar";
			$nits_rec2->Subject = "Forget Password | Recruitment Registration, NIT Silchar!";
			$nits_rec2->Host     = "172.16.30.72"; // HOST SMTP OUT ADDRESS
			$nits_rec2->Port = 587;
			$body = "<html><head><link href='http://www.nits.ac.in/css/style.css' rel='stylesheet' type='text/css'/><link href='http://www.nits.ac.in/nits_rec/css/recruitment_form.css' rel='stylesheet' type='text/css'/><link href='http://old.nits.ac.in/nits_rec/css/final_form.css' rel='stylesheet' type='text/css'/><link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'><link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'></head><body><div id='wrapper' style='width:600px;'><div id='top' ><div id='logo' ><h1><a href='http://recruitment.nits.ac.in/non_faculty/'>National Institute of Technology Silchar</a></h1></div></div>";
			$body .= "<br /><br/><br/><b>To reset your password <a href='http://recruitment.nits.ac.in/non_faculty/forget_pwd.php?vid=".$verify_id."&rid=".$reg_id."'>CLICK HERE</a></b></div></body>";
			$nits_rec2->Mailer   = "smtp";
			$nits_rec2->Priority = '1';
			$nits_rec2->Body = $body;
			$nits_rec2->AltBody = "Reply to this email if you are seeing this kind of mail.";
			$nits_rec2->AddAddress($email);
	
			if(!$nits_rec2->Send())
			{
				echo "There has been a mail error sending to " . $email . "<br/>Error info : ". $nits_rec2->ErrorInfo;
			}
			header("location:index.php?f=s");
	}
}
elseif(isset($_POST['password']) && isset($_POST['cpassword']) && isset($_SESSION['email']))
{
	$password=addslashes($_POST['password']);
	$cpassword=addslashes($_POST['cpassword']);
	if($password!=$cpassword)
	{
		header("location:forgetpass.php?m");
	}
	else
	{
		$password=md5(SHA1($password));
		$q = "UPDATE user_info SET password='".$password."' WHERE email='".addslashes($_SESSION['email'])."' ";
		$r = mysql_query($q) or die(mysql_error());
		unset($_SESSION['email']);
		session_destroy();
		header("location:forgetpass.php?d");
	}
}

elseif(isset($_GET['vid']) && isset($_GET['rid']))
{
	$q = "SELECT email,reg_id FROM user_info WHERE reg_id='".$_GET['rid']."'";
	$r = mysql_query($q) or die(mysql_error());
	$d = mysql_fetch_array($r);
	
	if(md5(SHA1($d['email']))==$_GET['vid'])
	{
		$_SESSION['email']=$d['email'];
		header("location:forgetpass.php");
	}
	else
	{
		echo "Invalid Link!!! Redirecting to Home Page.. Contact recruitment@nits.ac.in for more information...";
		header("refresh:1;url=index.php");
	}
}
else
{
	header("location:index.php");
}
?>