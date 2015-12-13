<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['reg_id_nf']) && $_SESSION['reg_id_nf']!='')
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
<link href="css/recruitment_form.css" rel="stylesheet" type="text/css"/>


<!-- Beginning of compulsory code below -->

<link href='http://fonts.googleapis.com/css?family=Marcellus' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<script src='http://www.nits.ac.in/js/jquery-1.6.1.min.js'></script>
<script src='js/forget.js'></script>
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
	<center><h2>Application Form for Recruitment of Non-Faculty</h2></center>
  </div>
  <br />
  <br />
  <br />
  <center><table cellpadding="20px">
<tr>
<td> 
 <a href="rlogin.php"><button style="width:120px;">Go for Register</button></a> <br />&nbsp;<br />&nbsp;
  </td>
  <td>
  <center><a href="rlogin_a.php"><button>Login</button></a></center><br /> (if already Registered)
  </td>
  </tr>
  
  </table>
  </center>
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
