<!DOCTYPE html>
<?php

session_start();
include "h.conn.php";
if(isset($_SESSION['reg_id_nf']) && $_SESSION['reg_id_nf']!='')
{
$reg_id = $_SESSION['reg_id_nf'];
$q1 = "SELECT * FROM user_info WHERE reg_id='".$reg_id."'";
$q2 = "SELECT * FROM user_exams WHERE reg_id='".$reg_id."'";
$q3 = "SELECT * FROM user_earlier_posts WHERE reg_id='".$reg_id."'";
$q4 = "SELECT * FROM user_other_details WHERE reg_id='".$reg_id."'";

$r1 = mysql_query($q1) or die(mysql_error());
$r2 = mysql_query($q2) or die(mysql_error());
$r3 = mysql_query($q3) or die(mysql_error());
$r4 = mysql_query($q4) or die(mysql_error());

$d1 = mysql_fetch_array($r1);
$d2 = mysql_fetch_array($r2);
$d3 = mysql_fetch_array($r3);
$d4 = mysql_fetch_array($r4);


if($d1['email_verified']==0 || $d1['email_verified']=='')
{
	header("location:index.php?v");
} 

if($d4['submitted']==0)
{
	header("location:form.php");
}
if($d4['submitted']==1)
{
	header("location:previewform.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>National Institute Of Technology Silchar, Assam</title>    
<link href="http://www.nits.ac.in/css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/recruitment_form.css" rel="stylesheet" type="text/css"/>
<link href="css/final_form.css" rel="stylesheet" type="text/css"/>
<link href="css/print.css" rel="print stylesheet" media="print" type="text/css"/>



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
			<img id="logo_print"  src="images/logo(2).png"  width="90px" height="90px" />
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
		<!--===============BANK DETAILS===================-->
			<h4>Bank Details</h4>
			<table >
				<tr>		<td>Bank name and Branch<span style="font-size:16px;">&#42;</span></td><td>: <?php echo $d4['bank_name_branch']; ?> </td></tr>
				<tr>		<td>Transaction Number</td><td>: <?php echo $d4['bank_trans_no']; ?></td></tr>
				<tr>		<td>Amount<span style="font-size:16px;">&#42;</span></td><td>: <?php echo $d4['bank_amount']; ?></td></tr>
				<tr>		<td>Date<span style="font-size:16px;">&#42;</span></td><td>:  <?php echo $d4['bank_date']; ?> (YYYY-MM-DD)</td></tr>
			</table>
			<!--===============BANK DETAILS===================-->
	<br />
	<hr />
	
			<table class="table_main" >
				<tr>
					<td width="30px">1.<br />&nbsp;</td>
					<td>Name of applicant<br />(in block letters)<span style="font-size:16px;">&#42;</span></td>
					<td colspan="3">: <span><?php echo $d1['name_applicant']; ?></span></td>
					<td colspan="2" rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="user_pics/<?php echo $reg_id; ?>.jpg" width="100px" height="120px" /><br /></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>2.</td>
					<td>Name of father/husband<span style="font-size:16px;">&#42;</span></td>
					<td colspan="3">:<span> <?php echo $d1['name_father']; ?></span></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>3.<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;</td>
					<td>Address<br />(a) Permanent address<span style="font-size:16px;">&#42;</span><br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;</td>
					<td colspan="3"><span style="display:block;width:400px;min-height:140px;text-wrap:normal;">: <?php echo $d1['permanent_address']; ?></span></td>
				</tr>
				
				<tr>
					<td>&nbsp;</td>
					<td>(b) Present address for<br /> communication with <br /> PIN code<span style="font-size:16px;">&#42;</span><br />&nbsp;<br />&nbsp;<br />&nbsp;</td>
					<td colspan="5"><br />&nbsp;<span style="display:block;width:400px;min-height:140px;text-wrap:normal;">: <?php echo $d1['present_address']; ?></span><br />
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>Mobile<span style="font-size:16px;">&#42;</span><br /><br />E-mail<span style="font-size:16px;">&#42;</span><br /><br />Phone no with STD code</td>
					<td colspan="5">:<span> <?php echo $d1['mobile']; ?></span><br />&nbsp;<br />
						:<span> <?php echo $d1['email']; ?></span><br />&nbsp;<br />
						:<span> <?php echo $d1['phone_no']; ?></span><br />
					</td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>4.</td>
					<td>Date of birth<span style="font-size:16px;">&#42;</span></td>
					<td colspan="2">:<span> <?php echo $d1['dob']; ?> (YYYY-MM-DD)</span></td>
					<td>(b) Age on 01/03/2014<br/>(DD/MM/YYYY)<span style="color:red;font-size:16px;">&#42;</span></td>
					<td colspan="2">:
					<?php echo (($d1['dd']!='00')?$d1['dd']:'');  ?> days 
					<?php echo (($d1['mm']!='00')?$d1['mm']:'');  ?> months
					<?php echo (($d1['yyyy']!='00')?$d1['yyyy']:''); ?> years
					</td>
					
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td>5.</td>
					<td> (a) Nationality <span style="font-size:16px;">&#42;</span></td>
					<td > :<span> <?php echo $d1['nationality']; ?></span></td>
					<td>&nbsp;</td>
					<td> (b) Place of birth<span style="font-size:16px;">&#42;</span></td>
					<td > :<span> <?php echo $d1['place_birth']; ?></span></td>
					<td>&nbsp;</td>
				</tr>
				</table>
				<table width="700px">
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td width="30px">6.</td>
					<td width="130px">(a) Caste<span style="color:red;font-size:16px;">&#42;</span></td>
					<td colspan=4>:<?php echo $d1['caste']; ?></td>
					
				</tr>
				
				<tr>
					<td>&nbsp;</td>
					<td width="130px">(b) Gender<span style="color:red;font-size:16px;">&#42;</span></td>
					<td colspan=4>:<?php echo $d1['gender']; ?></td>
					
				</tr>

				<tr>
					<td>&nbsp;</td>
					<td width="130px">(c) Maritial Status<span style="color:red;font-size:16px;">&#42;</span></td>
					<td colspan=4>:<?php echo $d1['maritial_status']; ?></td>
					
				</tr>
				</table>
				<table >
				<tr><td  colspan="7">(In the case of reserved category, enclosed duly attested certificate)<br />&nbsp;</td></tr>
				
				<tr>
					<td width="30px">7.&nbsp;<br />&nbsp;</td>
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
<table width="900" cellspacing="0" cellpadding="0">
  <tr>
    <td width="30px">10.</td>
    <td width="300px">Are you a member of any professional body? If so give details:  
</td>
    <td><span style="margin:2px;padding:5px;border:1px solid black;display:block;width:400px;height:120px;text-wrap:normal;">
					<?php echo ($d4['member_of_prof_body_details']!=''?$d4['member_of_prof_body_details']:''); ?> </span></td>
  </tr>
  <tr>
    <td>11.</td>
    <td>Have you been a member of the N.C.C. or any other similar organization? 
</td>
    <td><span style="margin:2px;padding:5px;border:1px solid black;display:block;width:400px;height:120px;text-wrap:normal;">
					<?php echo ($d4['member_of_ncc_similar_details']!=''?$d4['member_of_ncc_similar_details']:''); ?> </span></td>
  </tr>
  <tr>
    <td>12.</td>
    <td>Have you previously applied for any post in this Institution?  If so, give particulars stating date of application</td>
    <td><span style="margin:2px;padding:5px;border:1px solid black;display:block;width:400px;height:120px;text-wrap:normal;">
					<?php echo ($d4['previously_applied_details']!=''?$d4['previously_applied_details']:''); ?></span></td>
  </tr>
</table>

<table>
				<tr >
					<td width="30px">13. </td><td colspan="6"> Have you any near relation among the staff of this Institute? If so, give details:</td>
				</tr>
				<tr >
					<td colspan="7">
	<table  border="1" cellspacing="0" cellpadding="5px">
	<tr bgcolor="#000000" style="color:#efefef;">
    <th width="220px">Name of person</th>
    <th width="220px">Designation</th>
    <th width="220px">Relationship with the candidate</th>
  </tr>
  <tr height="30px">
	<td><?php echo ($d4['near_relation_1_name']!=''?$d4['near_relation_1_name']:''); ?></td>
	<td><?php echo ($d4['near_relation_1_designation']!=''?$d4['near_relation_1_designation']:''); ?></td>
    <td><?php echo ($d4['near_relation_1_relationship']!=''?$d4['near_relation_1_relationship']:''); ?></td>
  </tr>
  <tr height="30px">
	<td><?php echo ($d4['near_relation_2_name']!=''?$d4['near_relation_2_name']:''); ?></td>
	<td><?php echo ($d4['near_relation_2_designation']!=''?$d4['near_relation_2_designation']:''); ?></td>
    <td><?php echo ($d4['near_relation_2_relationship']!=''?$d4['near_relation_2_relationship']:''); ?></td>
  </tr>
</table>
<br />		
					</td>
				</tr>
				
				<tr>
					<td width="30px">14. </td><td colspan="6"> Have you been outside India? If so, give details:</td>
				</tr>
				
				<tr><td colspan="7">
				<table  border="1" cellspacing="0" cellpadding="5px">
	<tr bgcolor="#000000" style="color:#efefef;">
    <th width="200px">Country visited</th>
    <th width="300px">Purpose of visit</th>
    <th width="100px">Year</th>
  </tr>
  <tr height="30px">
	<td><?php echo ($d4['country_1_visited_name']!=''?$d4['country_1_visited_name']:''); ?></td>
	<td><?php echo ($d4['country_1_visited_purpose']!=''?$d4['country_1_visited_purpose']:''); ?></td>
     <td><center><?php echo ($d4['country_1_visited_year']!='0'?$d4['country_1_visited_year']:''); ?></center></td>
  </tr>
  <tr height="30px">
	<td><?php echo ($d4['country_2_visited_name']!=''?$d4['country_2_visited_name']:''); ?></td>
	<td><?php echo ($d4['country_2_visited_purpose']!=''?$d4['country_2_visited_purpose']:''); ?></td>
     <td><center><?php echo ($d4['country_2_visited_year']!='0'?$d4['country_2_visited_year']:''); ?></center></td>
  </tr>
  <tr height="30px">
	<td><?php echo ($d4['country_3_visited_name']!=''?$d4['country_3_visited_name']:''); ?></td>
	<td><?php echo ($d4['country_3_visited_purpose']!=''?$d4['country_3_visited_purpose']:''); ?></td>
     <td><center><?php echo ($d4['country_3_visited_year']!='0'?$d4['country_3_visited_year']:''); ?></center></td>
  </tr>
</table>
<br />
</td>
</tr>
				<tr>
					<td width="30px">15. </td><td colspan="6">Give particulars of places where you have resided for more than 1 year during the preceding 5 years</td>
				</tr>
				
				<tr><td colspan="7">
				<table  border="1" cellspacing="0" cellpadding="0">
	<tr bgcolor="#000000" style="color:#efefef;">
    <th width="100px">From</th>
    <th width="100px">To</th>
    <th >Residential address in full</th>
  </tr>
  <?php 
	for($i=1;$i<=4;$i++)
	{
  ?>
  <tr>
    <td><center><?php echo ($d4['places_resided_'.$i.'_from']!='0'?$d4['places_resided_'.$i.'_from']:""); ?></center></td>
    <td><center><?php echo ($d4['places_resided_'.$i.'_to']!='0'?$d4['places_resided_'.$i.'_to']:""); ?></center></td>
	<td><span style="display:block;width:400px;min-height:40px;text-wrap:normal;"><?php echo ($d4['places_resided_'.$i.'_address']!=''?$d4['places_resided_'.$i.'_address']:""); ?></span></td></tr>
	<?php
		}
	?>

  
  
</table>
<br />
</td>
</tr>
				<tr>
					<td width="30px">16.<br />&nbsp; </td><td colspan="6">Additional Remarks:<br />Applicants may mention here any special qualifications or experience including that of Computer knowledge, which have not been included under the heads given above. (Attach documentary evidence)
</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td colspan=4><br />
					<span style="display:block;width:400px;min-height:140px;text-wrap:normal;"><?php echo ($d4['additional_remarks']!=''?$d4['additional_remarks']:""); ?>
					</td><td colspan="2">&nbsp;</td>
				</tr>
					
				<tr>
					<td>17. </td><td colspan="6"> Name and address of TWO Referees:<span style="color:red;font-size:16px;">&#42;</span></td>
				</tr>
				<tr>
					<td colspan="7">
					<table border="1" cellspacing="0" cellpadding="5px">
					<tbody>
						<tr bgcolor="#000000" style="color:#efefef;" ><th>&nbsp;</th><th>Referee 1</th><th>Referee 2</th></tr>
						<tr><td>Name</td>
						<td><?php echo $d4['referee_1_name']; ?></td>
						<td><?php echo $d4['referee_2_name']; ?></td></tr>
						<tr>
						<td>Position</td>
						<td><?php echo $d4['referee_1_position']; ?></td>
						<td><?php echo $d4['referee_2_position']; ?></td></tr>
						<tr>
						<td>Address<br />&nbsp;<br />&nbsp;<br />&nbsp;</td>
						<td><span style="display:block;width:300px;min-height:140px;text-wrap:normal;">
					<?php echo $d4['referee_1_address']; ?></span></td>
						<td><span style="display:block;width:300px;min-height:140px;text-wrap:normal;">
					<?php echo $d4['referee_2_address']; ?></span></td>
					<tr><td>Email</td>
						<td><?php echo $d4['referee_1_email'];  ?></td>
						<td><?php  echo $d4['referee_2_email']; ?></td>
						</tr>
						<tr><td>Phone No.</td>
						<td><?php echo $d4['referee_1_phone']; ?></td>
						<td><?php echo $d4['referee_2_phone']; ?></td>
						</tr>
						</tbody>
					</table>
					</td>
				</tr>
				
				<tr>
				
					<td>18. </td><td colspan="6"> List of copies of certificates enclosed<span style="font-size:16px;">&#42; : </span></td>
				</tr>
				<tr>
					<td>&nbsp;</td><td colspan="6">
					<?php echo $d4['certificates']; ?>
					</td>
				</tr>
				</table>
				<br />
				<hr />
					<b>It is certified that  the information stated above as well as in attached sheets are true to the best of my knowledge and belief.</b><br/>

	<span>I hereby declare that all the information given above is correct to the best of my knowledge and belief. Also I have carefully checked that the position for which I am applying has been advertised (Advt. No. 04/14 Dated : 02/March/2014 ) 
by NIT Silchar . I fully understand that if it is found at a later date that any information given in the application is incorrect/false or if I do not satisfy the eligibility criteria, my candidature/appointment is liable to be cancelled. </span>
<br />
<br />
<br />
				<table width="800px">
				<tr>
					<td colspan="2">Date<span style="color:red;font-size:16px;">&#42;</span>:</td><td colspan="2" width="300px" ><?php echo $d4['dosubmit']; ?> (YYYY-MM-DD)</td><td >Signature of applicant<br /></td>
				</tr>
				</table>
<br />
<br />
<br />
	
		
		<hr />
						<b> Recommendation / Comments of the present employer with office seal:</b><br />
			(Only for regular employed persons under Govt./Semi Govt. organization)
<br />
<br />
<br />
<br />
<br />
<table width="800px">
				<tr>
					<td colspan="4" width="380px">Seal with date<span style="color:red;font-size:16px;">&#42;</span>:<td >Signature of employer<br /></td>
				</tr>
				</table>

		<hr />
		<br />
		
			<span id="button_print"><center><button onclick="myFunction()">Print</button>&nbsp;<a href="logout.php">Logout</a></center></span>
		
	</div>
  <br />
  <br />
  <br />
 </div>
 <!-- Footer -->
 <script>
function myFunction()
{
window.print();
}
</script>
<!-- / Footer -->    
</body>
</html>
<?php

}
else
	header("location:index.php");
	
?>