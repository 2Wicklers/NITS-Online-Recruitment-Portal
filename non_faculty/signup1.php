<?php
include "h.conn.php";
session_start();
?>
<?php
require_once 'securimage.php';
      $securimage = new Securimage();
	$captcha = $_POST['ct_captcha'];	
	echo $_POST['ct_captcha'];
die();
/* Validate captcha */
	if ($securimage->check($captcha) == true) {
		        $_SESSION['captcha_error'] = 'Incorrect security code entered<br />';
		        $_SESSION['s_email'] = $_POST['email'];
			$_SESSION['s_mobile'] = $_POST['mobile'];
			header("location:rlogin1.php");
    }
	else //submit form from here
	{
		unset($_SESSION['ctform']['']);
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
			/*
			*PHP MAIL;
			$veriy_id = md5($email);
			include "../phpmailer/class.phpmailer.php";
			$nits_rec->IsSMTP();

			$nits_rec->SMTPAuth = true;

			$nits_rec->Username = "recruitment@nits.ac.in";
			$nits_rec->Password = "pass@123";
			$nits_rec->SMTPSecure = 'ssl';
			$nits_rec->From     = "recruitment@nits.ac.in";
			$nits_rec->FromName = "NIT Silchar";
			$nits_rec->Subject = "Verification for Recruitment of Faculty";
			$nits_rec->Host     = "smtp.nits.ac.in";
			$nits_rec->Port = 25;
			$body = ;
			$nits_rec->Mailer   = "smtp";
			$nits_rec->Priority = '1';
			$nits_rec->Body    = $body;
			$nits_rec->AltBody = $text_body;
			$nits_rec->AddAddress($email);
	
			if(!$nits_rec->Send())
			{
				echo "There has been a mail error sending to " . $_POST['email'] . "<br/>";
			}	
			else
			{
         
			}
			*/
			header("location:index.php?f=s");
		}
	}
    $request_captcha = htmlspecialchars($_REQUEST['captcha']);
    unset($_SESSION['captcha']);
}
?>
