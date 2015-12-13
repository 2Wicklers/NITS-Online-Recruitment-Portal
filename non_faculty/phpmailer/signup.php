<?php
include "h.conn.php";
session_start();
?>
<?php

/** Validate captcha */
if (!empty($_REQUEST['captcha'])) {
    if(empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha']) {
        $_SESSION['s_email'] = $_POST['email'];
		$_SESSION['s_mobile'] = $_POST['mobile'];
		$_SESSION['captcha_check']="wrong";
		header("location:rlogin.php");
    }
	else //submit form from here
	{
		unset($_SESSION['captcha_check']);
		$email = addslashes($_POST['email']);
		$password = md5(SHA1($_POST['password']));
		$mobile = $_POST['mobile'];
		
		$qc = "SELECT reg_id FROM user_info WHERE email='".$email."' OR mobile='".$mobile."'";
		$rc = mysql_query($qc) or die(mysql_error());
		if(mysql_num_rows($rc)==1)
		{
			header("location:rlogin.php?s");
		}
		else
		{
			$q1 = "SELECT id FROM user_info";
			$r1 = mysql_query($q1) or die(mysql_error());
			$id = mysql_num_rows($r1);
			$reg_id = 14001 + $id;
			$q = "INSERT INTO user_info(reg_id,email,password,mobile) VALUES('".$reg_id."','".$email."','".$password."','".$mobile."')";
			$r = mysql_query($q) or die(mysql_error());
			$q1 = "INSERT INTO user_exams(reg_id) VALUES('".$reg_id."')";
			$r1 = mysql_query($q1) or die(mysql_error());
			$q2 = "INSERT INTO user_other_details(reg_id) VALUES('".$reg_id."')";
			$r2 = mysql_query($q2) or die(mysql_error());
			$q3 = "INSERT INTO user_earlier_posts(reg_id) VALUES('".$reg_id."')";
			$r3 = mysql_query($q3) or die(mysql_error());
			
			$veriy_id = md5($email);

			include "phpmailer/class.phpmailer.php";
			$nits_rec->IsSMTP();
			$nits_rec = new phpmailer();
			$nits_rec->SMTPAuth = true;

			$nits_rec->Username = "recruitment@nits.ac.in";
			$nits_rec->Password = "pass@123";
			$nits_rec->SMTPSecure = 'ssl';
			$nits_rec->From     = "recruitment@nits.ac.in";
			$nits_rec->FromName = "NIT Silchar";
			$nits_rec->Subject = "Verification for Recruitment of Faculty";
			$nits_rec->Host     = "smtpout.secureserver.net";
			$nits_rec->Port = 25;
			$body = "<link href='http://www.nits.ac.in/css/style.css' rel='stylesheet' type='text/css'/><link href='http://www.nits.ac.in/nits_rec/css/recruitment_form.css' rel='stylesheet' type='text/css'/><link href='http://old.nits.ac.in/nits_rec/css/final_form.css' rel='stylesheet' type='text/css'/><link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'><link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'></head><body><div id='wrapper' style='width:600px;'><div id='top' ><div id='logo' ><h1><a href='index.php'>National Institute of Technology Silchar</a></h1></div></div>";
			$body .= "We have received your request for the faculty position at National Institute of Technology, Silchar.<br />Your username is your email id and password<br/><br/><b>To verify your account <a href='verify.php?vid=".$verify_id."&rid=".$reg_id.">CLICK HERE</a></b></div></body>";
			$nits_rec->Mailer   = "smtp";
			$nits_rec->Priority = '1';
			$nits_rec->Body = $body;
			$nits_rec->AddAddress($email);
	
			if(!$nits_rec->Send())
			{
				echo "There has been a mail error sending to " . $_POST['email'] . "<br/>";
			}
			header("location:index.php?f=s");
		}
	}
    $request_captcha = htmlspecialchars($_REQUEST['captcha']);
    unset($_SESSION['captcha']);
}
?>