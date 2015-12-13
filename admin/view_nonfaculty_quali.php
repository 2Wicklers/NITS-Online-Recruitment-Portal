<!DOCTYPE html>
<?php
require_once "db/connection.php";
attempt_connection('nits_recruitment_nf');
session_start();
if(isset($_GET['id']) && $_GET['id']!='' && isset($_SESSION['nits_rec_admin']))
{
$reg_id = mysql_real_escape_string($_GET['id']);
$q1 = "SELECT * FROM user_info WHERE id='".$reg_id."'";
$q2 = "SELECT * FROM user_exams WHERE id='".$reg_id."'";
$q3 = "SELECT * FROM user_earlier_posts WHERE id='".$reg_id."'";
$q4 = "SELECT * FROM user_other_details WHERE id='".$reg_id."'";

$r1 = mysql_query($q1) or die(mysql_error());
$r2 = mysql_query($q2) or die(mysql_error());
$r3 = mysql_query($q3) or die(mysql_error());
$r4 = mysql_query($q4) or die(mysql_error());

$d1 = mysql_fetch_array($r1);
$d2 = mysql_fetch_array($r2);
$d3 = mysql_fetch_array($r3);
$d4 = mysql_fetch_array($r4);


?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>National Institute Of Technology Silchar, Assam</title>    
<link href="http://www.nits.ac.in/css/style.css" rel="stylesheet" type="text/css"/>
<link href="http://recruitment.nits.ac.in/css/recruitment_form.css" rel="stylesheet" type="text/css"/>
<link href="http://recruitment.nits.ac.in/css/final_form.css" rel="stylesheet" type="text/css"/>
<link href="http://recruitment.nits.ac.in/css/print.css" rel="print stylesheet" media="print" type="text/css"/>



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

<div id="wrapper">
	<!-- header -->
	 <div id="top">
	  <div id="logo_2" >
			<img id="logo_print"  src="http://recruitment.nits.ac.in/images/logo(2).png"  width="90px" height="90px" />
			<center><span style="margin-right:60px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h1><a href="index.php">राष्ट्रीय प्रौद्योगिकी संस्थान सिलचर<br />National Institute of Technology Silchar</a></h1></span></center>

	 </div>
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
		<center><a href="logout.php" style="color:white" ><span id="button_print"><b>LOGOUT</b></span></a></center>
    </div>
 </div> 
	<!-- / header --> 
	<span>Registration ID:</span><span id="reg_id" style="color:red;font-size:20px;"><b><?php  echo $d1['reg_id']; ?></b></span>
	<div class="hr"></div>
	<div class="form_fields">
		<center><h2>Application Form for Recruitment of Non-Faculty</h2></center>
		<br />
		<center>Advertisement No.<span style="color:red;font-size:16px;">&#42;</span>:04/14</center><br />
				<center>Application for the Post of <span style="font-size:16px;">&#42;</span> : <?php echo $d1['position']; ?></center>
				
				
		<hr />
		
	<br />
	<hr />
	
			<table class="table_main" >
				<tr>
					<td width="30px">&nbsp;</td>
					<td>Name of applicant<br />(in block letters)<span style="font-size:16px;">&#42;</span></td>
					<td colspan="3">: <span><?php echo $d1['name_applicant']; ?></span></td>
					<td colspan="2" rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../non_faculty/user_pics/<?php echo $d1['reg_id']; ?>.jpg" width="100px" height="120px" /><br /></td>
				</tr>
				
			
				<table >
				
				<tr>
					<td width="30px">&nbsp;</td>
					<td colspan="6">Details of qualifications (Metriculation onwards) <br />(attach supporting documents)<span style="color:red;font-size:16px;">&#42;</span>:<br />&nbsp;</td>
					
				</tr>
				<tr>
					<td colspan="7">
						<table id="table1" border='1' cellspacing='0'>
							<tbody>
								<tr bgcolor="#000000" style="color:#efefef;">
									<th>Exam passed</th><th>Year</th><th>Board/University</th><th>Institution</th><th>Divn./Class</th><th>Percentage<br />of marks</th>
								</tr>
								<?php 
								for($i=1;$i<=5;$i++)
								{								
								?>
								<tr>
									<td><span style="display:block;min-height:25px;padding:5px;width:200px;text-wrap:normal;"><center><?php echo ($d2['exam'.$i.'_name']!=''?$d2['exam'.$i.'_name']:"-"); ?></center></span></td>
									<td><span style="display:block;min-height:25px;padding:5px;width:65px;"><center><?php echo ($d2['exam'.$i.'_year']!='0'?$d2['exam'.$i.'_year']:"-"); ?></center></span></td>
									<td><span style="display:block;min-height:25px;width:200px;padding:5px;text-wrap:normal;"><center><?php echo ($d2['exam'.$i.'_univ']!=''?$d2['exam'.$i.'_univ']:"-"); ?></center></span></td>
									<td><span style="display:block;min-height:25px;width:220px;padding:5px;text-wrap:normal;"><center><?php echo ($d2['exam'.$i.'_institute']!=''?$d2['exam'.$i.'_institute']:"-"); ?></center></span></td>
									<td><span style="display:block;min-height:25px;width:65px;padding:5px;"><center><?php echo ($d2['exam'.$i.'_divn']!=''?$d2['exam'.$i.'_divn']:"-"); ?></center></span></td>
									<td><span style="display:block;min-height:25px;width:75px;padding:5px;"><center><?php echo ($d2['exam'.$i.'_percentage']!='0'?$d2['exam'.$i.'_percentage']:"-"); ?></center></span></td>
								</tr>
								<?php 
								}
								?>
							</tbody>
						</table>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>Use space below for extra relevent information, if any:<br />
					<span style="display:block;width:400px;min-height:140px;text-wrap:normal;">
					<?php echo $d2['other_edu_details']; ?> </span></td>
				</tr>
				<br />
				<tr>
					<td>&nbsp;<br />8.</td>
					<td colspan="6">&nbsp;<br />Particulars of present & previous employment/experience in chronological order (attach supporting documents).</td>
					
				</tr>
				
				<tr>
					<td colspan="7">
						<table id="table2" border='1' cellspacing='0'>
							<tbody>
								<tr bgcolor="#000000" style="color:#efefef;">
								<br />
									<th>Post held</th><th>Institute/Organization</th><th colspan="4"> Period<table width="100%"><tr><td>From<br />(year)</td><td>To<br />(year)</td><td>Year</td><td>Month</td></tr></table></th><th>Nature<br />of duties</th><th>Scale of pay & <br /> Basic pay</th>
								</tr>
								<?php 
								for($i=1;$i<=5;$i++)
								{								
								?>
								<tr>
									<td><span style="display:block;min-height:25px;padding:5px;width:130px;text-wrap:normal;"><center><?php echo ($d3['post'.$i.'_name']!=''?$d3['post'.$i.'_name']:"-"); ?></center></span></td>
									<td><span style="display:block;min-height:25px;width:200px;padding:5px;text-wrap:normal;"><center><?php echo ($d3['post'.$i.'_institute']!=''?$d3['post'.$i.'_institute']:"-"); ?></center></span></td>

									<td><span style="display:block;min-height:25px;padding:5px;width:65px;"><center><?php echo ($d3['post'.$i.'_from']!='0'?$d3['post'.$i.'_from']:"-"); ?></center></span></td>
									<td><span style="display:block;min-height:25px;padding:5px;width:65px;"><center><?php echo ($d3['post'.$i.'_to']!='0'?$d3['post'.$i.'_to']:"-"); ?></center></span></td>
									<td><span style="display:block;min-height:25px;padding:5px;width:65px;"><center><?php echo ($d3['post'.$i.'_total_year']!='0'?$d3['post'.$i.'_total_year']:"-"); ?></center></span></td>
									<td><span style="display:block;min-height:25px;padding:5px;width:60px;"><center><?php echo ($d3['post'.$i.'_total_month']!='0'?$d3['post'.$i.'_total_month']:"-"); ?></center></span></td>
									<td><span style="display:block;min-height:25px;padding:5px;width:100px;"><center><?php echo ($d3['post'.$i.'_nature']!='0'?$d3['post'.$i.'_nature']:"-"); ?></center></span></td>
									<td><span style="display:block;min-height:25px;width:130px;padding:5px;text-wrap:normal;"><center><?php echo ($d3['post'.$i.'_pay']!=''?$d3['post'.$i.'_pay']:"-"); ?></center></span></td>
								</tr>
								<?php 
								}
								?>
							</tbody>
						</table>
					</td>
				</tr>
				
				</table>
				<table>
					
							<tr>
								<td>&nbsp;</td>
								<td colspan=4>Use space below for extra relevant information, if any:<br />
							<span style="display:block;width:400px;min-height:140px;text-wrap:normal;">
								<?php echo $d3['other_posts_details']; ?></td>
							</tr>
					<tr><td width="30px">9. </td><td colspan="4">Languages you can read, write & speak?</td></tr>
				</table>
				<table width="900"  border="1" cellspacing="0" >
  <tr bgcolor="#000000" style="color:#efefef;">
    <th width="100px">Name of Language</th>
    <th width="200px">Read</th>
    <th width="200px">Write</th>
    <th width="200px">Speak</th>
    <th width="200px">Examination passed<br /> if any</th>
  </tr>
    <tr>
    <td>Hindi</td>
    <td><center><input name="lang_hindi_read" type="checkbox" value="1" <?php echo ($d4['lang_hindi_read']=='1'?'checked':''); ?> disabled></center></td>
    <td><center><input name="lang_hindi_write" type="checkbox" value="1"  <?php echo ($d4['lang_hindi_write']=='1'?'checked':''); ?> disabled></center></td>
    <td><center><input name="lang_hindi_speak" type="checkbox" value="1" <?php echo ($d4['lang_hindi_speak']=='1'?'checked':''); ?> disabled></center></td>
    <td><?php echo (($d4['lang_hindi_exam']!='')?$d4['lang_hindi_exam']:''); ?></td>
  </tr>
  <tr>
    <td>English</td>
    <td><center><input name="lang_english_read" type="checkbox" value="1" <?php echo ($d4['lang_english_read']=='1'?'checked':''); ?> disabled></center></td>
    <td><center><input name="lang_english_write" type="checkbox" value="1" <?php echo ($d4['lang_english_write']=='1'?'checked':''); ?> disabled></center></td>
    <td><center><input name="lang_english_speak" type="checkbox" value="1" <?php echo ($d4['lang_english_speak']=='1'?'checked':''); ?> disabled></center></td>
    <td><?php echo (($d4['lang_english_exam']!='')?$d4['lang_english_exam']:''); ?></td>
  </tr>
  <tr>
    <td>Other</td>
    <td><?php echo ($d4['lang_other_1']!=''?$d4['lang_other_1']:''); ?></td>
    <td><?php echo ($d4['lang_other_2']!=''?$d4['lang_other_2']:''); ?></td>
    <td><?php echo ($d4['lang_other_3']!=''?$d4['lang_other_3']:''); ?></td>
    <td><?php echo ($d4['lang_other_exam']!=''?$d4['lang_other_exam']:''); ?></td>
  </tr>
</table>
<br />
</html>
<?php

}
else
	header("location:index.php");
	
?>