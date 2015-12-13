<!DOCTYPE html>
<?php
session_start();
include "h.conn.php";
if(1)
{
$reg_id = '14000';
$q1 = "SELECT * FROM user_info WHERE reg_id='".$reg_id."'";
$q2 = "SELECT * FROM user_exams WHERE reg_id='".$reg_id."'";
$q3 = "SELECT * FROM user_earlier_posts WHERE reg_id='".$reg_id."'";
$q4 = "SELECT * FROM user_other_details WHERE reg_id='".$reg_id."'";
$q5 = "SELECT * FROM user_phd_details WHERE reg_id='".$reg_id."'";
$r1 = mysql_query($q1) or die(mysql_error());
$r2 = mysql_query($q2) or die(mysql_error());
$r3 = mysql_query($q3) or die(mysql_error());
$r4 = mysql_query($q4) or die(mysql_error());
$r5 = mysql_query($q5) or die(mysql_error());

$d1 = mysql_fetch_array($r1);
$d2 = mysql_fetch_array($r2);
$d3 = mysql_fetch_array($r3);
$d4 = mysql_fetch_array($r4);
$d5 = mysql_fetch_array($r5);

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>NITS | Online Application</title>    
<link href="http://www.nits.ac.in/css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/recruitment_form.css" rel="stylesheet" type="text/css"/>
<link href="css/print.css" rel="print stylesheet" media="print" type="text/css"/>


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
	 <div id="top" >
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
    </div>
 </div> 
	<!-- / header --> 
	<div class="hr"></div>
	<div class="form_fields">
		<center><h2>Application Form for Recruitment of Faculty</h2></center>
		
			
		<br />
		<form name="recruitment" id="recruitment" action="submit_form.php" method="post" enctype="multipart/form-data">
		<table><tr><td>
		Advertisement No.<span style="color:red;font-size:16px;">&#42;</span></td><td><select name="advertisement_no" required>
<option value=""  >-
<option value="01/14" <?php echo ($d4['advertisement_no']=='01/14'?"selected":""); ?> >01/14
<option value="02/14" <?php echo ($d4['advertisement_no']=='02/14'?"selected":""); ?> >02/14
<option value="03/14" <?php echo ($d4['advertisement_no']=='03/14'?"selected":""); ?> >03/14</select></td>
		<td>Application for the Post of <span style="color:red;font-size:16px;">&#42;</span> : </td><td><select name="faculty_pos" required>
		<option value=""  >-

<option value="Assistant Professor" <?php echo ($d1['faculty_pos']=='Assistant Professor'?"selected":""); ?> >Assistant Professor
<option value="Associate Professor" <?php echo ($d1['faculty_pos']=='Associate Professor'?"selected":""); ?> >Associate Professor
<option value="Professor" <?php echo ($d1['faculty_pos']=='Professor'?"selected":""); ?> >Professor
</select>
 </td>
		<td>Department <span style="color:red;font-size:16px;">&#42;</span> :</td><td> <select name = "department_pos" required>
		<option value=""  >-

<option value="Civil Engineering" <?php echo ($d1['department']=='Civil Engineering'?"selected":""); ?> >Civil Engineering
<option value="Mechanical Engineering" <?php echo ($d1['department']=='Mechanical Engineering'?"selected":""); ?>>Mechanical Engineering
<option value="Electrical Engineering" <?php echo ($d1['department']=='Electrical Engineering'?"selected":""); ?>>Electrical Engineering
<option value="Electronics & Communication Engineering" <?php echo ($d1['department']=='Electronics & Communication Engineering'?"selected":""); ?>>Electronics & Communication Engineering
<option value="Computer Science & Engineering" <?php echo ($d1['department']=='Computer Science & Engineering'?"selected":""); ?>>Computer Science & Engineering
<option value="Electronics & Instrumentation Engineering" <?php echo ($d1['department']=='Electronics & Instrumentation Engineering'?"selected":""); ?>>Electronics & Instrumentation Engineering
<option value="Mathematics" <?php echo ($d1['department']=='Mathematics'?"selected":""); ?>>Mathematics
<option value="Physics" <?php echo ($d1['department']=='Physics'?"selected":""); ?> >Physics
<option value="Chemistry" <?php echo ($d1['department']=='Chemistry'?"selected":""); ?> >Chemistry
<option value="Humanities & Social Science" <?php echo ($d1['department']=='Humanities & Social Science'?"selected":""); ?> >Humanities & Social Science
<option value="Management Studies" <?php echo ($d1['department']=='Management Studies'?"selected":""); ?> >Management Studies

</select>

</td></tr>
	</table> 
		 
		 
		<hr />
		<!--===============BANK DETAILS===================-->
			<h4>Bank Details</h4>
			<table >
				<tr>		<td>Bank name and Branch<span style="color:red;font-size:16px;">&#42;</span></td><td>: <input type="text" required="" name="bank_name_branch" value="<?php echo $d4['bank_name_branch']; ?>"/></td>				</tr>
				<tr>		<td>Transaction Number<span style="color:red;font-size:16px;">&#42;</span></td><td>: <input type="text" required="" name="bank_trans_no" value="<?php echo ($d4['bank_trans_no']!=''?$d4['bank_trans_no']:''); ?>" /></td>				</tr>
				<tr>		<td>Amount<span style="color:red;font-size:16px;">&#42;</span></td><td>: <input type="text" required="" name="bank_amount" value="<?php echo ($d4['bank_amount']!=''?$d4['bank_amount']:''); ?>" /></td>				</tr>
				<tr>		<td>Date<br/>(MM/DD/YYYY)<span style="color:red;font-size:16px;">&#42;</span></td><td>: <input type="date"  required=""  placeholder="mm/dd/yyyy" name="bank_date" value="<?php echo (($d4['bank_date']!='0000-00-00')?$d4['bank_date']:''); ?>" /> </td>				</tr>
			</table>
			<!--===============BANK DETAILS=================== --> 
			<br />
			<hr />
			<table class="table_main" >
				
				</tr>
				<tr>
					<td width="30px">1.<br />&nbsp;</td>
					<td>Name of applicant<br />(in block letters)<span style="color:red;font-size:16px;">&#42;</span></td>
					<td colspan="3"><input type="name" id="name" required="" placeholder="Full Name" name="name_applicant" value="<?php echo $d1['name_applicant']; ?>"/></td>
					<td colspan="2" rowspan="3">
					
					
					
					<div style="width:101px;height:120px;border:1px solid black;"><img src="" id="user_pic" width="100px" height="120px" alt="Upload a recent photograph" /></div><br /> <input name="user_pic1" id="pic" type="file" required onchange="readURL(this);" accept="image/jpeg"/><br />(Upload Image Just Before Submitting The Form)</td>
				</tr>
				<tr>
					<td>2.</td>
					<td>Name of father/husband<span style="color:red;font-size:16px;">&#42;</span></td>
					<td colspan="3"><input type="name" id="f_h_name" required="" placeholder="Father/Husband Name"  name="name_father" value="<?php echo $d1['name_father']; ?>" /></td>
				</tr>
				<tr>
					<td>3.</td>
					<td>Address<br />(a) Permanent address<span style="color:red;font-size:16px;">&#42;</span></td>
					<td colspan="3"><textarea required=""  placeholder="Permanent Address" name="permanent_address"><?php echo $d1['permanent_address']; ?></textarea></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>(b) Present address for<br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; communication with <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PIN code<span style="color:red;font-size:16px;">&#42;</span></td>
					<td colspan="5"><textarea required=""  placeholder="Present Address" name="present_address" ><?php echo $d1['present_address']; ?></textarea><br />
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>Mobile (10 digit)<span style="color:red;font-size:16px;">&#42;</span><br /><br />E-mail<span style="color:red;font-size:16px;">&#42;</span><br /><br />Phone no with STD code</td>
					<td colspan="5">	<input type="text" id="mobile" name="mobile" required="" disabled pattern="[0-9]{10}" placeholder="Mobile no." value="<?php echo $d1['mobile'] ; ?>" /><br />
						<input type="email" id="email" name="email" disabled required="" placeholder="email-ID" value="<?php echo $d1['email']; ?>" /><br />
						<input type="text" id="" name="phone_no"  pattern="[0-9]{8,14}" placeholder="Phone no." value="<?php echo $d1['phone_no']; ?>" /><br />
					</td>
				</tr>
				<tr>
					<td>4.</td>
					<td>(a) Date of birth<br/>(MM/DD/YYYY)<span style="color:red;font-size:16px;">&#42;</span></td>
					<td colspan="2"><input type="date"  required=""  placeholder="mm/dd/yyyy" name="u_dob" value="<?php echo (($d1['dob']!='0000-00-00')?$d1['dob']:''); ?>" /></td>
					<td>(b) Age on 01/03/2014<br/>(DD/MM/YYYY)<span style="color:red;font-size:16px;">&#42;</span></td>
					<td colspan="2"><input style="width:60px;" type="number"  required=""  min="0" max="30" placeholder="dd" name="dd" value="<?php echo (($d1['dd']!='00')?$d1['dd']:'');  ?>"  />
					<input type="number"  style="width:60px;" required=""  min="0" max="11" placeholder="mm" name="mm" value="<?php echo (($d1['mm']!='00')?$d1['mm']:'');  ?>" />
					<input type="number" style="width:60px;" required=""  min="0" max="60" placeholder="yy" name="yy" value="<?php echo (($d1['yy']!='00')?$d1['yy']:'');  ?>" /></td>
					
				</tr>
				<tr>
					<td>5.</td>
					<td> (a) Nationality <span style="color:red;font-size:16px;">&#42;</span></td>
					<td > <input type="text" name="nationality" id="nationality" required="" pattern="[a-z A-Z]{2,30}" placeholder="Country Name" value="<?php echo $d1['nationality']; ?>"/></td>
					<td>&nbsp;</td>
					<td> (b) Place of birth<span style="color:red;font-size:16px;">&#42;</span></td>
					<td > <input type="text" name="place_birth" id="birth_place" required="" pattern="[a-z A-Z]{2,30}"  placeholder="Birth Place" value="<?php echo $d1['place_birth']; ?>"/></td>
					<td>&nbsp;</td>
				</tr>
				</table>
				<table width="700px">
				<tr>
					<td width="30px">6.</td>
					<td width="130px">(a) Caste<span style="color:red;font-size:16px;">&#42;</span></td>
					<td><input type="radio" name="caste" value="SC" <?php echo ($d1['caste']=='SC'?'checked':''); ?> required />SC</td>
					<td><input type="radio" name="caste" value="ST" <?php echo ($d1['caste']=='ST'?'checked':''); ?> required/>ST</td>
					<td><input type="radio" name="caste" value="OBC" <?php echo ($d1['caste']=='OBC'?'checked':''); ?> required/>OBC</td>
					<td><input type="radio" name="caste" value="PWD" <?php echo ($d1['caste']=='PWD'?'checked':''); ?> required/>PWD</td>
					<td><input type="radio" name="caste" value="GEN" <?php echo ($d1['caste']=='GEN'?'checked':''); ?> required/>GEN.</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td width="130px">(b) Gender<span style="color:red;font-size:16px;">&#42;</span></td>
					<td><input type="radio" name="gender" value="male" <?php echo ($d1['gender']=='male'?'checked':''); ?> required/>Male</td>
					<td><input type="radio" name="gender" value="female" <?php echo ($d1['gender']=='female'?'checked':''); ?> required/>Female</td>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td width="130px">(c) Maritial Status<span style="color:red;font-size:16px;">&#42;</span></td>
					<td><input type="radio" name="maritial_status" value="single" <?php echo ($d1['maritial_status']=='single'?'checked':''); ?> required />Single</td>
					<td><input type="radio" name="maritial_status" value="married" <?php echo ($d1['maritial_status']=='married'?'checked':''); ?> required/>Married</td>
					<td><input type="radio" name="maritial_status" value="other" <?php echo ($d1['maritial_status']=='other'?'checked':''); ?> required/>Other</td>
					<td colspan="2">&nbsp;</td>
				</tr>
				</table>
				<table >
				<tr><td  colspan="7">(In the case of reserved category, enclosed duly attested certificate)<br />&nbsp;</td></tr>
				
				<tr>
					<td width="30px">7.&nbsp;<br />&nbsp;</td>
					<td colspan="6">Details of qualifications (Metriculation onwards) <br />(attach supporting documents):<span style="color:red;font-size:16px;">&#42;</span>:<br />&nbsp;</td>
					
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
									<td><input type="text" name="exam<?php echo $i; ?>_name" class="exam_passed" value="<?php echo ($d2['exam'.$i.'_name']!=''?$d2['exam'.$i.'_name']:''); ?>" <?php echo ($i==1?'required':''); ?> /></td>
									<td><input type="number" name="exam<?php echo $i; ?>_year" class="year_passed" value="<?php echo ($d2['exam'.$i.'_year']!='0'?$d2['exam'.$i.'_year']:''); ?>"  <?php echo ($i==1?'required':''); ?> style="width:60px;"  min="1965" max="2014" /></td>
									<td><input type="text" name="exam<?php echo $i; ?>_univ" class="board_uni" value="<?php echo ($d2['exam'.$i.'_univ']!=''?$d2['exam'.$i.'_univ']:''); ?>"  <?php echo ($i==1?'required':''); ?> /></td>
									<td><input type="text" name="exam<?php echo $i; ?>_institute" class="Institution"  value="<?php echo ($d2['exam'.$i.'_institute']!=''?$d2['exam'.$i.'_institute']:''); ?>"  <?php echo ($i==1?'required':''); ?> /></td>
									<td><input type="text" name="exam<?php echo $i; ?>_divn" class="division" style="width:110px;" value="<?php echo ($d2['exam'.$i.'_divn']!=''?$d2['exam'.$i.'_divn']:''); ?>"   <?php echo ($i==1?'required':''); ?> /></td>
									<td><input type="text" name="exam<?php echo $i; ?>_percentage" class="percentage"style="width:60px;" value="<?php echo ($d2['exam'.$i.'_percentage']!='0'?$d2['exam'.$i.'_percentage']:''); ?>"  <?php echo ($i==1?'required':''); ?>  pattern="[0-9]{1}[0-9]{1}(\.\d+)?|[0-9]{1,2}(\.0+)" /></td>

									</tr>
								<?php
									}
								?>
							</tbody>
						</table>
						</td>
				</tr>
				<?php /*<tr> <td colspan=3>&nbsp;<br />For PHD details:</td></tr>
				<tr>
					<td colspan="7">
						<table id="table2" border='1' cellspacing='0'>
							<tbody>
								
								<tr bgcolor="#000000" style="color:#efefef;">
								<br />
									<th>Year of<br /> Enrolment</th><th>Status<br /></th><th>Year (if <br />awarder/submitted)</th><th>Total Period</th><th>Institute/Organization</th>
								</tr>
								
								<tr>
									<td><input type="number" name="year_enrolment" style="width:60px;text-align:center;" min="1965" max="2014" value="<?php echo ($d5['year_enrolment']!='0'?$d5['year_enrolment']:""); ?>" /></td>
									<td><select name="status">
											<option value="Ongoing" <?php echo ($d5['status']=='Ongoing'?"selected":""); ?> >Ongoing
											<option value="Submitted" <?php echo ($d5['status']=='Submitted'?"selected":""); ?> >Submitted
											<option value="Awarded" <?php echo ($d5['status']=='Awarded'?"selected":""); ?> >Awarded</select></td>
									<td><input style="width:100px;" type="number" name="year_awarded" style="width:60px;text-align:center;"  min="1965" max="2014" value="<?php echo ($d5['year_awarded']!='0'?$d5['year_awarded']:""); ?>" /></td>
									<td ><input type="number" name="total_period" style="width:60px;text-align:center;"  min="0" max="40" value="<?php echo ($d5['total_period']!='0'?$d5['total_period']:""); ?>" /></td>
									
									<td><input type="text" name="institute_name" style="width:210px;" value="<?php echo ($d5['institute_name']!=''?$d5['institute_name']:""); ?>"/></td>
											</tr>
								
							</tbody>
						</table>
					</td>
				</tr> 
				*/ ?>
				<tr>
					<td>&nbsp;</td>
					<td>Use space below for extra relevent information, if any<br /><textarea name="other_details_education"><?php echo $d5['other_details_education']; ?></textarea></td><td colspan="5">&nbsp;</td>
				</tr>
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
									<td><input type="text" style="width:130px;" name="post<?php echo $i; ?>_name" value="<?php echo ($d3['post'.$i.'_name']!=''?$d3['post'.$i.'_name']:""); ?>" /></td>
									<td><input type="text" name="post<?php echo $i; ?>_institute" style="width:200px;" value="<?php echo ($d3['post'.$i.'_institute']!=''?$d3['post'.$i.'_institute']:""); ?>"/></td>									
									<td><input type="number" name="post<?php echo $i; ?>_from" style="width:60px;text-align:center;" min="1965" max="2014" value="<?php echo ($d3['post'.$i.'_from']!='0'?$d3['post'.$i.'_from']:""); ?>" /></td>
									<td><input type="number" name="post<?php echo $i; ?>_to" style="width:60px;text-align:center;" min="1965" max="2014" value="<?php echo ($d3['post'.$i.'_to']!='0'?$d3['post'.$i.'_to']:""); ?>"/></td>
									<td ><input type="number" name="post<?php echo $i; ?>_total_year" style="width:60px;text-align:center;"  min="0" max="40" value="<?php echo ($d3['post'.$i.'_total_year']!='0'?$d3['post'.$i.'_total_year']:""); ?>" /></td>
									<td><input type="number" name="post<?php echo $i; ?>_total_month" style="width:60px;text-align:center;"  min="0" max="12" value="<?php echo ($d3['post'.$i.'_total_month']!='0'?$d3['post'.$i.'_total_month']:""); ?>" /></td>
									<td><input type="text" name="post<?php echo $i; ?>_nature" style="width:100px;" value="<?php echo ($d3['post'.$i.'_nature']!=''?$d3['post'.$i.'_nature']:""); ?>"/></td>
									<td><input type="text" name="post<?php echo $i; ?>_pay" style="width:125px;"  value="<?php echo ($d3['post'.$i.'_pay']!='0'?$d3['post'.$i.'_pay']:""); ?>"/></td>
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
					<td colspan=4>Use space below for extra relevant information, if any<br />
					<textarea name="more_posts_desc"><?php echo $d3['more_posts_desc']; ?></textarea></td><td colspan="5">&nbsp;</td>
				</tr>
				<tr><td width="30px">9. </td><td colspan="4">Experience</td></tr>
				</table>
				
				<table border="1" cellspacing="0">
					<tbody>
						<tr bgcolor="#000000" style="color:#efefef;" ><th>&nbsp;</th><th>Name of Organization(s)</th><th>Period(in Years & Months)</th></tr>
						<tr><td>Teaching experience</td>
						<td><input style="width:300px;" type="text" name="teach_exp_org" value="<?php echo $d5['teach_exp_org']; ?>" /></td>
						<td>
						<input type="number" name="teach_exp_period_year" min="0" max="40" value="<?php echo $d5['teach_exp_period_year']; ?>" />
						<input type="number" name="teach_exp_period_month" min="0" max="11" value="<?php echo $d5['teach_exp_period_month']; ?>" />
						</td></tr>
						<tr><td>Post-Ph.D. Research experience</td>
						<td><input  style="width:300px;" type="text" name="phd_exp_org" value="<?php echo $d5['phd_exp_org']; ?>" /></td>
						<td>
						<input type="number" name="phd_exp_period_year" min="0" max="40"  value="<?php echo $d5['phd_exp_period_month']; ?>"  />
						<input type="number" name="phd_exp_period_month" min="0" max="11" value="<?php echo $d5['phd_exp_period_month']; ?>"  />
						</td></tr>
						<tr><td>Industrial experience</td>
						<td><input  style="width:300px;" type="text" name="ind_exp_org" value="<?php echo $d5['ind_exp_org']; ?>" /></td>
						<td>
						<input type="number" name="ind_exp_period_year" min="0" max="40" value="<?php echo $d5['ind_exp_period_month']; ?>" />
						<input type="number" name="ind_exp_period_month" min="0" max="11"  value="<?php echo $d5['ind_exp_period_month']; ?>" />
						</td></tr>
					</tbody>
				</table>
			
				<table>
				<tr><td>10.</td><td colspan="6">Area of Specialization :</td></tr>
				<tr><td colspan=7><textarea name="area_specialization" placeholder="Area of Specialization..." ><?php  echo $d5['area_specialization'];  ?></textarea></td></tr>
				
				<tr><td width="30px">11.</td><td colspan="5" >Number of paper(s) published / patents, if any:</td></tr>
				</table>
				<table border="1" cellspacing="0">
					<tbody>
						<tr bgcolor="#000000" style="color:#efefef;" ><th>&nbsp;</th><th>&nbsp;</th><th>Total nos. of publications</th><th>Nos. of SCI publications</th></tr>
						<tr>
						<td>(a)</td>
						<td>Journal</td>
						<td><input  type="number" min="0"  name="no_paper_published_journal_total" value="<?php echo ($d4['no_paper_published_journal_national'] + $d4['no_paper_published_journal_international']); ?>" /></td>
						<td><input  type="number" min="0"  name="no_sci_total" value="<?php echo ($d4['no_sci_national'] + $d4['no_sci_international']); ?>" /></td>
						</tr>
						<tr>
						<td>&nbsp;</td><td>(i) International</td>
						<td><input    type="number" min="0"  name="no_paper_published_journal_international" value="<?php echo $d4['no_paper_published_journal_international']; ?>" /></td>
						<td><input  type="number" min="0"  name="no_sci_international" value="<?php echo $d4['no_sci_international']; ?>"  /></td>
						</tr>
						<tr>
						<td>&nbsp;</td>
						<td>(ii) National</td><td><input    type="number" min="0"  name="no_paper_published_journal_national" value="<?php echo $d4['no_paper_published_journal_national']; ?>" /></td>
						<td><input  type="number" min="0"  name="no_sci_national" value="<?php echo $d4['no_sci_national']; ?>" /></td>
						</tr>
					</tbody>
				</table>
				
				
				<table>
				<tr><td colspan="7">Give details in extra sheet(s) in the following format (should be submitted along with the hard copy of the application) -> <u><i>Author(s) Name, Title of the paper, Name of the Journal, Name of the Publisher, Year of Publication, Volume, Page No., Impact Factor (if any)</i></u></td></tr>
				<tr>
					<td colspan="7">
					<table >
					<tbody>
						<tr><td>(b)</td><td>Conferences</td><td>&nbsp;</td></tr>
						
						<tr><td></td>&nbsp;<td>(i) International</td>
						<td>
						<input type="number" min="0" name="international_paper_conf_presented_count" value="<?php echo $d4['international_paper_conf_presented_count']; ?>" /></td></tr>
						<tr><td></td>&nbsp;<td>(ii) National</td>
						<td>
						<input type="number" min="0"  name="national_paper_conf_count" value="<?php echo $d4['national_paper_conf_count']; ?>" /></td></tr>
					</tbody>
				</table>
				
					</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) in the following format (should be submitted along with the hard copy of the application) -> <u><i>Author(s) Name, Title of the paper, Name of the Conference Proceedings, Name of the Publisher (if any), Year of Publication, Page No.</i></u></td></tr>
				
				<tr>
					<td colspan="7">
					<table >
						<tbody>
							<tr>
								<td>(c) </td>
								<td> Books/Book Chapters</td>
								<td><input type="number" min="0" name="no_paper_published_books" value="<?php echo $d4['no_paper_published_books']; ?>" /></td>
							</tr>
						</tbody>
					</table>
				
					</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) in the following format (should be submitted along with the hard copy of the application) -> <u><i>Author(s) Name, Title of the Book, Name of the Publisher , Year of Publication, Page No.(if applicable), ISSN No.</i></u></td></tr>
				<tr>
					<td colspan="7">
					<table >
						<tbody>
							<tr>
								<td>(d) </td>
								<td> Patents</td>
								<td><input type="number" min="0" name="no_paper_published_patents" value="<?php echo $d4['no_paper_published_patents']; ?>" /></td>
							</tr>
						</tbody>
					</table>
				
					</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) (should be submitted along with the hard copy of the application) <br /> &nbsp;</td></tr>

				
				<tr>
					<td>12. </td><td colspan="6"> No. of Ph.D. Guided/Ongoing:</td>
				</tr>
				<tr>
					<td>&nbsp;</td><td colspan="6">
					<table border="1" cellspacing="0">
						<tbody>
							<tr bgcolor="#000000" style="color:#efefef;" ><th>&nbsp;</th><th>&nbsp;</th><th>Completed</th><th>Ongoing</th></tr>
							<tr><td>(a)</td><td>Sole/ Principal Supervisor</td>
								<td><input type="number" name="no_phd_guided_sole" value="<?php echo $d4['no_phd_guided_sole']; ?>"/></td>
								<td><input type="number" name="no_phd_guided_sole_ongoing" value="<?php echo $d4['no_phd_guided_sole_ongoing'];  ?>"/></td></tr>
							<tr><td>(b)</td><td>Co - Supervisor</td>
								<td><input type="number"  name="no_phd_guided_supervisor" value="<?php echo $d4['no_phd_guided_supervisor']; ?>"/></td>
								<td><input type="number"  name="no_phd_guided_supervisor_ongoing" value="<?php echo $d4['no_phd_guided_supervisor_ongoing']; ?>"/></td></tr>
						</tbody>
					</table>
					
					</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) in the following format (should be submitted along with the hard copy of the application) -> <u><i>Scholar's Name, Title of the Thesis, Name of the Institute/Univ., Year of Award.<br /> &nbsp;</i></u> </td></tr>

				<tr>
					<td>13. </td><td colspan="6"> No. of M.Tech/M.Sc/B.Tech projects (on live industrial problems) guided:</td>
				</tr>
				<tr>
					<td colspan="7">
					<table >
					<tbody>
						<tr><td>M. Tech. / M. Sc.</td>
						<td><input type="number" min="0" name="no_mtech_projects" value="<?php  echo $d5['no_mtech_projects']; ?>" /></td></tr>
						<tr><td>B. Tech. </td>
						<td><input type="number" min="0"  name="no_btech_projects" value="<?php echo $d5['no_btech_projects']; ?>" /></td></tr>
					</tbody>
					</table>
				
					</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) in the following format (should be submitted along with the hard copy of the application) -> <u><i>Name of the Scholar(s), Title of the Dissertation, Name of Institute/Univ., Year of Award.<br /> &nbsp;</i></u></td></tr>
				
				<tr>
					<td>14. </td><td colspan="6"> No. of Sponsored / Consultancy Projects (attach supporting documents).</td>
				</tr>
				<tr>
					<td>&nbsp;</td><td colspan="7">
						<table border="1" cellspacing="0">
						<tbody>
						<tr bgcolor="#000000" style="color:#efefef;" ><th>&nbsp;</th><th>&nbsp;</th><th>Research Projects</th><th>Consultancy Projects</th></tr>
						<tr><td>(a)</td><td>Principal Investigator</td><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td></td>&nbsp;<td>(i) Completed</td>
						<td><input type="number" name="no_projects_as_coordinator_sf_completed" value="<?php echo $d4['no_projects_as_coordinator_sf_completed']; ?>"/></td>
						<td><input  type="number" min="0"  name="consultancy_sf_completed" value="<?php echo $d4['consultancy_sf_completed'];  ?>"  /></td></tr>
						<tr><td></td>&nbsp;<td>(ii) Ongoing</td>
						<td><input type="number" name="no_projects_as_coordinator_sf_ongoing" value="<?php echo $d4['no_projects_as_coordinator_sf_ongoing']; ?>"/></td>
						<td><input  type="number" min="0"  name="consultancy_sf_ongoing" value="<?php echo $d4['consultancy_sf_ongoing'];  ?>" /></td></tr>
						<tr><td>(b)</td><td>Co-Principal Investigator</td><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td></td>&nbsp;<td>(i) Completed</td>
						<td><input type="number" name="no_projects_as_coordinator_s_completed" value="<?php echo $d4['no_projects_as_coordinator_s_completed']; ?>"/></td>
						<td><input  type="number" min="0"  name="consultancy_s_completed" value="<?php  echo $d4['consultancy_s_completed']; ?>"  /></td></tr>
						<tr><td></td>&nbsp;<td>(ii) Ongoing</td>
						<td><input type="number" name="no_projects_as_coordinator_s_ongoing" value="<?php echo $d4['no_projects_as_coordinator_s_ongoing']; ?>"/></td>
						<td><input  type="number" min="0"  name="consultancy_s_ongoing" value="<?php echo $d4['consultancy_s_ongoing']; ?>" /></td></tr>
					
						</tbody>
					</table>
					</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) in the following format (should be submitted along with the hard copy of the application) -> <u><i>Name of the Sponsoring Agency, Title of the Project, Project period, Status (Completed/Ongoing).<br /> &nbsp;</i></u></td></tr>

				<tr>
					<td>15. </td><td colspan="4"> No. of Conference / Symposium/Seminar/Workshop/STTP organized:</td>
					<td width="200px" colspan="3"><input name="no_conf_symp_seminar_organized" type="number" min="0" value="<?php echo $d4['no_conf_symp_seminar_organized']; ?>" />Nos.</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) in the following format (should be submitted with supporting documents along with the hard copy of the application) -> <u><i>Name of the Programme, Duration, Sponsoring Agency.<br /> &nbsp;</i></u></td></tr>
				<tr>
					<td>16. </td><td colspan="4"> No. of Conference / Symposium/Seminar/Workshop/STTP attended:</td>
					<td colspan="3"><input name="no_conf_symp_seminar_attended" type="number" min="0" value="<?php echo $d4['no_conf_symp_seminar_attended']; ?>" />Nos.</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) in the following format (should be submitted along with the hard copy of the application) -> <u><i>Name of the Programme, Name of the Organization, Duration.<br /> &nbsp;</i></u></td></tr>
				<tr>
					<td>17. </td><td colspan="6"> No. of Experimental / Computational design Projects added to the teaching laboratory:</td>
				</tr>
				<tr>
					<td colspan="7">
					<table >
					<tbody>
						<tr><td>(a) Experimental Projects</td>
						<td><input type="number" min="0" name="no_experiments" value="<?php  echo $d4['no_experiments']; ?>" /></td></tr>
						<tr><td>(b) Computational design Projects </td>
						<td><input type="number" min="0"  name="no_comp_design_projects" value="<?php echo $d4['no_comp_design_projects'];  ?>" /></td></tr>
					</tbody>
					</table>
				
					</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) (should be submitted along with the hard copy of the application).<br /> &nbsp;</td></tr>

				<tr>
					<td>18. </td><td colspan="6"> Awards / Recognition, if any (attach supporting documents):</td>
				</tr>
				
				<tr>
					<td >&nbsp;</td><td colspan="6"><textarea name="awards_recog"><?php  echo $d4['awards_recog']; ?></textarea></td>
				</tr>
				
				
				<tr>
					<td>19. </td><td colspan="6"> Particulars of any other professional experience/Co-curricular activities/other relevant information:</td>
				</tr>
				<tr>
					<td >&nbsp;</td><td colspan="6"><textarea name="particulars_prof_exp_other"><?php echo $d4['particulars_prof_exp_other']; ?></textarea></td>
				</tr>
				<tr>
					<td>20. </td><td colspan="6"> Name and address of TWO Referees:<span style="color:red;font-size:16px;">&#42;</span></td>
				</tr>
				<tr>
					<td colspan="7">
					<table border="1" cellspacing="0">
					<tbody>
						<tr bgcolor="#000000" style="color:#efefef;" ><th>&nbsp;</th><th>Referee 1</th><th>Referee 2</th></tr>
						<tr>
						<td>Name</td>
						<td><input  type="name" name="referee_1_name" value="<?php echo $d1['referee_1_name']; ?>" placeholder="Refree 1 Name" /></td>
						<td><input type="name" name="referee_2_name" value="<?php echo $d1['referee_2_name']; ?>" placeholder="Referee 2 Name" /></td></tr>
						<tr>
						<td>Position</td>
						<td><input   type="text" name="referee_1_position" value="<?php echo $d1['referee_1_position']; ?>" placeholder="Referee 1 Position" /></td>
						<td><input type="text" name="referee_2_position" value="<?php echo $d1['referee_2_position']; ?>" placeholder="Refree 2 Position"  /></td></tr>
						<tr><td>Address<br />&nbsp;<br />&nbsp;<br />&nbsp;</td>
						<td><textarea style="width:200px;" name="referee_1_address" placeholder="Refree 1 Address" ><?php echo $d1['referee_1_address']; ?></textarea></td>
						<td><textarea style="width:200px;" name="referee_2_address"  placeholder="Refree 2 Address" ><?php echo $d1['referee_2_address']; ?></textarea></td></tr>
						<tr><td>Email</td>
						<td><input type="email" id="email" name="referee_1_email" required="" placeholder="Referee 1 email-ID" value="<?php  echo $d1['referee_1_email'];  ?>" /></td>
						<td><input type="email" id="email" name="referee_2_email" required="" placeholder="Referee 2 email-ID" value="<?php  echo $d1['referee_2_email'];  ?>" />
						</td></tr>
						<tr><td>Phone No.</td>
						<td><input type="text"  name="referee_1_phone"  pattern="[0-9]{8,14}" placeholder="Phone no." value="<?php  echo $d1['referee_1_phone']; ?>" /></td>
						<td><input type="text"  name="referee_2_phone"  pattern="[0-9]{8,14}" placeholder="Phone no." value="<?php  echo $d1['referee_2_phone']; ?>" /></td>
						</tr>
						</tbody>
					</table>
					</td>
				</tr>
				
				<tr>
					<td>21. </td><td colspan="6"> List of copies of certificats enclosed<span style="color:red;font-size:16px;">&#42;</span></td>
				</tr>
				<tr><td>&nbsp;</td><td colspan=4><input type="file" name="certificate_files[]" multiple/> (Select MULTIPLE files at once)</td></tr>
				<tr>
					<td>&nbsp;</td><td colspan="6">
					<textarea required=""   placeholder="List here..." name="certificates"><?php echo $d4['certificates']; ?></textarea>
					</td>
				</tr>
				
				
			</table>
			
			<hr />
			
<br />

<input type="checkbox"  id="accept_terms_chkbox" name="accept_terms" required="" />	
					<b>It is certified that  the information stated above as well as in attached sheets are true to the best of my knowledge and belief.</b><br/>

	<span>I hereby declare that all the information given above is correct to the best of my knowledge and belief. Also I have carefully checked that the position for which I am applying has been advertised 
	( Dated : 02/March/2014 ) 
by NIT Silchar . I fully understand that if it is found at a later date that any information given in the application is incorrect/false or if I do not satisfy the eligibility criteria, my candidature/appointment is liable to be cancelled. </span>
<br />
<br />

				

		<hr />
		<br />
			<div class="save_div">
			<center><span name="save" id="save" ></span>
			</center>
			<center>(Click here to save)
			</center>
			<br />
			<br />
			<br />
			<center>
			<span id="logout">
			<a href="logout.php">Logout</a>
			</span>
			</center>
			</div>
			<center><input name="Submit" id="submit_" type="submit" value="Submit"/><br/></center>
		</form>
	</div>
  <br />
  <br />
  <br />
 </div>
 <!-- Footer -->
 
<!-- / Footer -->
</body>
</html>
<?php
}
else
	header("location:index.php");
?>
