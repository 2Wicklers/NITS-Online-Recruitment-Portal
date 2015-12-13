<!Doctype html>
<?php
session_start();
include "h.conn.php";
?>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>National Institute Of Technology Silchar, Assam</title>    
<link href="http://www.nits.ac.in/css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/recruitment_form.css" rel="stylesheet" type="text/css"/>


<!-- Beginning of compulsory code below -->

<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<script src='http://www.nits.ac.in/js/jquery-1.6.1.min.js'></script>
<script src="http://www.nits.ac.in/js/organictabs.jquery.js"></script>
<script src="js/add_table.js"></script>
<script src="js/save.js"></script>
    <script>
        $(function() {
             
            $("#example-two").organicTabs({
                "speed": 200
            });
    
        });
		
		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#user_pic')
                        .attr('src', e.target.result);
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		
		function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#sign')
                        .attr('src', e.target.result);
                        
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
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

<div id="wrapper"  style="background:#eee">
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
		<br />
		<center><a href="logout.php" style="color:white" ><span><b>LOGOUT</b></span></a></center>
    </div>
 </div> 
	<!-- / header --> 
	<div class="hr"></div>
	<form action="forget_pwd.php" method="post">
	<br />
	<br />
	<br />
		<?php
			if(!isset($_GET['d']) && isset($_SESSION['email']))
			{
		?>
		<center>Reset your password</center><br />
		<center><input type="password" id="password" name="password" placeholder="New Password" required="" pattern="\S{6,}" /></center><br />
		<center><input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" required="" pattern="\S{6,}" /></center><br />
		<?php
		if(isset($_GET['m']))
		{
			echo "<center><span style='font-color:red'>Password & Confirm Password Do Not Match!!</center><br/>";
		}
		?>
		<center><input type="submit" name="submit" value="Save" /></a></center>
		</form>
		<?php
		}
		elseif(isset($_GET['d']))
			echo "Password changed!! <a href='rlogin_a.php'>CLICK HERE</a> to go to login page.";
		elseif(!isset($_SESSION['email']))
			header("location:index.php");
		?>
	</div>
	
	<!-- Footer -->
 
<!-- / Footer -->    
</body>
</html>