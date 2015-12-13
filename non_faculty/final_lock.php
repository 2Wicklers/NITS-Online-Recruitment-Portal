<?php
include "h.conn.php";
session_start();
$q = "UPDATE user_other_details SET submitted='2' WHERE reg_id='".$_SESSION['reg_id_nf']."' ";
$r = mysql_query($q) or die(mysql_error());
$reg_id = $_SESSION['reg_id_nf'];
			include "phpmailer/class.phpmailer.php";
			include "phpmailer/class.smtp.php";
			$qq = "SELECT email,position FROM user_info WHERE reg_id='".$reg_id."'";
			$rr = mysql_query($qq) or die(mysql_error());
			$dd = mysql_fetch_array($rr);
			$email = $dd['email'];
			$position = $dd['position'];
			$nits_rec1 = new phpmailer();

			$nits_rec1->IsSMTP();
			$nits_rec1->SMTPAuth = "true";
			$nits_rec1->SMTPDebug = 2;
			$nits_rec1->IsHTML(true);
			$nits_rec1->SMTPAuth = true;

			$nits_rec1->Username = "recruitment@nits.ac.in"; //to change email id from sending
			$nits_rec1->Password = "nits_rec@123"; //its password
			$nits_rec1->SMTPSecure = 'tls';
			$nits_rec1->From     = "recruitment@nits.ac.in";
			$nits_rec1->FromName = "NIT Silchar";
			$nits_rec1->Subject = "Form submitted successfully.";
			$nits_rec1->Host     = "172.16.30.72"; // HOST SMTP OUT ADDRESS
			$nits_rec1->Port = 587;
			$body = "<html><head><link href='http://www.nits.ac.in/css/style.css' rel='stylesheet' type='text/css'/><link href='http://www.nits.ac.in/nits_rec/css/recruitment_form.css' rel='stylesheet' type='text/css'/><link href='http://old.nits.ac.in/nits_rec/css/final_form.css' rel='stylesheet' type='text/css'/><link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'><link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'></head><body><div id='wrapper' style='width:600px;'><div id='top' ><div id='logo' ><h1><a href='http://recruitment.nits.ac.in/non_faculty/index.php'>National Institute of Technology Silchar</a></h1></div></div>";
			$body .= "THANK YOU for submitting your request for the position : ". $position . ", at National Institute of Technology, Silchar.<br /><br/><br/><b>Login & See your submitted form and print it out, <a href='http://recruitment.nits.ac.in/non_faculty/rlogin_a.php'>CLICK HERE</a></b></div></body>";
			$nits_rec1->Mailer   = "smtp";
			$nits_rec1->Priority = '1';
			$nits_rec1->MsgHTML($body);
			$nits_rec1->AltBody = "THANK YOU for submitting your request for the faculty position : ". $position . ", at National Institute of Technology, Silchar.Login & See your submitted form and print it out, http://recruitment.nits.ac.in/non_faculty/rlogin_a.php";
			$nits_rec1->AddAddress($email);
			$nits_rec1->Encoding="base64";
			if(!$nits_rec1->Send())
			{
				echo "There has been a mail error sending to " . $email . "<br/>Error info : ". $nits_rec->ErrorInfo;
			}
header("location:show_form.php");
?>