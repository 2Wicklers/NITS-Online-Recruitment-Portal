<!DOCTYPE html>
<?php
session_start();

if(isset($_SESSION['reg_id']) && $_SESSION['reg_id']!='')
{
	header("location:form.php");
}

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>National Institute Of Technology Silchar, Assam</title>    
<link href="http://www.nits.ac.in/css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/rlogin.css" rel="stylesheet" type="text/css"/>


<!-- Beginning of compulsory code below -->

<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<script src='http://www.nits.ac.in/js/jquery-1.6.1.min.js'></script>
<script src="http://www.nits.ac.in/js/organictabs.jquery.js"></script>
    <script>
        $(function() {
             
            $("#example-two").organicTabs({
                "speed": 200
            });
    
        });
    </script>
<script type="text/javascript">
$(document).ready(function() {
// Create two variable with the names of the months and days in an array
var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

// Create a newDate() object
var newDate = new Date();
// Extract the current date from Date object
newDate.setDate(newDate.getDate());
// Output the day, date, month and year    
$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ', ' + newDate.getFullYear());

setInterval( function() {
	// Create a newDate() object and extract the seconds of the current time on the visitor's
	var seconds = new Date().getSeconds();
	// Add a leading zero to seconds value
	$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
	},1000);
	
setInterval( function() {
	// Create a newDate() object and extract the minutes of the current time on the visitor's
	var minutes = new Date().getMinutes();
	// Add a leading zero to the minutes value
	$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
	
setInterval( function() {
	// Create a newDate() object and extract the hours of the current time on the visitor's
	var hours = new Date().getHours();
	// Add a leading zero to the hours value
	$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);
	
}); 
</script>
</head>

<body>

<div id="wrapper" style="background:#eee">
	<!-- header -->
	 <div id="top">
    <div id="logo">
        <h1><a href="index.php">राष्ट्रीय प्रौद्योगिकी संस्थान सिलचर<br />National Institute of Technology Silchar</a></h1>
    </div>
    <div class="clock">
        <div id="Date"></div>
        <ul>
            <li id="hours"> </li>
            <li id="point">:</li>
            <li id="min"> </li>
            <li id="point">:</li>
            <li id="sec"> </li>
        </ul>
    </div>
 </div> 
	<!-- / header --> 
  <div class="hr">
	<center><h2>Application Form for Recruitment of Faculty</h2></center>
  </div>
  <br />
  <br />
  <br />
  <div class="block_container">

		<center><h3>Register Here</h3></center>
		<?php
			if(isset($_GET['s']))
			{
			?>
				<center><h5 style="color:red">This email or mobile has been already registered</h5></center>
				<?php
				}
				?>
		<form action="signup1.php" method="post"><br/>
				<label for="email" ><center><b>E-mail ID</b></center></label>
				<center><input type="email" id="email" name="email" required="" value="<?php echo (isset($_SESSION['captcha_check'])?$_SESSION['s_email']:""); ?>" /></center>
   
	
	<br />
				<label for="mobile"><center><b>Mobile No.</b></center></label>
				<center><input type="text" id="mo_number" name="mobile" required="" pattern="[0-9]{10}" value="<?php echo (isset($_SESSION['captcha_check'])?$_SESSION['s_mobile']:""); ?>" /></center>

    <br />
				<label for="password"><center><b>Password</b></center></label>
				<center><input type="password" id="password" name="password" required="" pattern="\S{6,}"></center>
	
	<br />		
				<center><?php
      // show captcha HTML using Securimage::getCaptchaHtml()
      require_once 'securimage.php';
      ?>
	<input type="text" name="ct_captcha" />	
<?php // change name of input element for form post

      if (!empty($_SESSION['captcha_error'])) {
        // error html to show in captcha output
	unset($_SESSION['captcha_error']);
        $options['error_html'] = $_SESSION['captcha_error'];
      }

      echo Securimage::getCaptchaHtml($options);
    ?></center>
				<center><input type="submit" id="signup" value="Sign Up"></center>
			</form>


			
			
	</div>
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <br />
 </div>
 <!-- Footer -->
<?php/* include "../nits/footer.php" ; */?>
<!-- / Footer -->    
</body>
</html>
