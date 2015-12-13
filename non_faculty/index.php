<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

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

<div id="wrapper"  style="font-size:16px;">
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
	
 
  <div class="hr"></div>
<center><h2>Application Form for Recruitment of Non Faculty</h2></center>
   <br />
   
 <?php
 
 
	if((!isset($_GET['f']) || $_GET['f']!='s') && !isset($_GET['v']))
	{
  ?>
<div style="padding:10px; text-wrap:normal;">Read the instructions carefully before going to next step: 
<br />
<br />
1.&nbsp;	Before applying:

<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A.&nbsp;  Keep the soft copy of your photograph in JPEG format (file size not to exceed 		      	2MB). 

<br />
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B.&nbsp;  Deposit the amount <b>200 (General/OBC) or 100 (SC/ST/PH)</b> on the account number 		given below and take the receipt from bank where the transaction reference number is mentioned clearly. This transaction number will be required while 			filling the online form:
			<br />	(If you are getting transaction ID, mention it otherwise write "Attached" in the text area. You must attach the hard copy of the bank slip with the application form and keep a photocopy for the future use.)
<br />
Please carefully note that , candidate has to pay a seperate amount of fee for each post.
<br />
<br />
<table>
<tr><td>Name of Bank</td><td>:STATE BANK OF INDIA</td></tr>
<tr><td>Account Number &nbsp;&nbsp;&nbsp;</td><td>:10521277057</td></tr>
<tr><td>Account Name</td><td>:Director, NIT Silchar </td></tr>
<tr><td>Account Type</td><td>:Saving</td></tr>
<tr><td>Branch Name</td><td>:NIT Silchar, Assam</td></tr>
<tr><td>IFSC Code</td><td>:SBIN0007061</td></tr>
</table>
<br />
<br />				
		

2.	Click on "<b>Apply online</b>".
<br /><br />
3.	Candidates are requested to use different e-mail ids for different posts, i.e., email id is required for one post which caannot be used for another.

<br /><br />
4.	Click on "<b>Go for registration</b>" to get registered. User-id (email-id) and password as given by you.
<br />
<br />
5.	Click on "<b>Go for Applying</b>" link and login with your access credentials.
<br />
<br />
6.	Upon successful login enter the relevant details at the respective places.
<br />
<br />
7.  Fields marked with '<span style="color:red;">*</span>' are mendatory.
<br />
<br />

8.	The details filled in application are editable till you finally lock. 
<br />
<br />
9.	Once you are done, lock the details. Once locked the entries are not editable.
<br />
<br />

10.	Upon completion of this process the application reference number is sent to your email. 
<br />
<br />
11. Please safely <b>LOG OUT </b> after submition or filling up the online application form.
<br />
<br />
12. Persons employed in Government and Semi-Government organizations should apply through <b>proper channel </b> against the advertisement. Alternatively, they may send an advance copy of the application and submit the <b>NOC </b> at the time of interview.
<br />
<br />
13. Applicants should produce <b>Medical Fitness Certificate </b> at the time of interview, if called for. <a href="../MEDICAL FITNESS CERTIFICATE.pdf" target="_blank"><span style="color:blue;">format of Medical Fitness Certificate </span></a>
<br />
<br />
14.	Last date of submission of online application is <b>3rd April, 2014 up to 5:00 PM</b>.
<br />
<br />
15.	Take printout of completed application form and send it with all the photocopies of testimonials to <b>Registrar, NIT Silchar, Silchar-788010, Assam </b>so as to reach latest by 17th April, 2014
<br />
<br />
<b><u>16. PLEASE DO CHECK YOUR INBOX AND SPAM/BULK EMAIL BOXES TOO </u></b>
<br/>
<br/>
Contact US
Email-id:- recruitment@nits.ac.in
</div>
  <hr />
  <br />
  <center>
  <a href="index_2.php"><button >Apply Online</button></a></center>
  <br />
<br />				
		<br />
<br />				
		
  <?php
	}
	else
	{
  ?>
  <div>
  <br />
<br />Check your email & then proceed or verify your email!!!
<br /><br />
<br />				
		
<br />
</div>
  <?php
	}
  ?>
 </div>    
 <!-- Footer -->
 
<!-- / Footer -->   
</body>
</html>
