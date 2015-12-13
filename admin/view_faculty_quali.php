<!DOCTYPE html>
<?php
session_start();
require_once "db/connection.php";
attempt_connection('nits_recruitment');
if(isset($_GET['id']) && $_GET['id']!='' && isset($_SESSION['nits_rec_admin']))
{
$id = mysql_real_escape_string($_GET['id']);
$q1 = "SELECT * FROM user_info WHERE id='".$id."'";
$q2 = "SELECT * FROM user_exams WHERE id='".$id."'";
$q3 = "SELECT * FROM user_earlier_posts WHERE id='".$id."'";
$q4 = "SELECT * FROM user_other_details WHERE id='".$id."'";
$q5 = "SELECT * FROM user_phd_details WHERE id='".$id."'";

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
		<center><a href="logout.php" style="color:white" ><span><b>LOGOUT</b></span></a></center>
    </div>
 </div> 
	<!-- / header --> 
	<span>Registration ID:</span><span id="reg_id" style="color:red;font-size:20px;"><b><?php echo $d1['reg_id']; ?></b></span>
	<div class="hr"></div>
	<div class="form_fields">
		<center><h2>Application Form for Recruitment of Faculty</h2></center>
		<br />
		<table width="860px">
			<tr>
				<td>Advertisement No.<span style="color:red;font-size:16px;">&#42;</span></td>
				<td>:<?php  echo $d4['advertisement_no']; ?></td>
				<td>Application for the Post of <span style="font-size:16px;">&#42;</span></td>
				<td>: <?php echo $d1['faculty_pos']; ?></td>
				<td>Department <span style="font-size:16px;">&#42;</span> </td>
				<td>: <?php echo $d1['department']; ?></td>
				
			</tr>
		</table>
		<hr />
	
	
			<table class="table_main" >
				<tr>
					<td width="30px">&nbsp;</td>
					<td>Name of applicant<br />(in block letters)<span style="font-size:16px;">&#42;</span></td>
					<td colspan="3">: <span><?php echo $d1['name_applicant']; ?></span></td>
					<td colspan="2" rowspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="../user_pics/<?php echo $d1['reg_id']; ?>.jpg" width="100px" height="120px" /><br /></td>
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
					<?php echo $d5['other_details_education']; ?> </span></td>
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
								<?php echo $d3['more_posts_desc']; ?></td>
							</tr>
					
					<tr>
					 <td width="30px">9. </td><td colspan="4"> Experience:</td>
					</tr>
					</table>
					<table border="1" cellspacing="0" cellpadding="5px">
					<tbody>
						<tr bgcolor="#000000" style="color:#efefef;" ><th>&nbsp;</th><th width="200px">Name of Organization(s)</th><th colspan="2">Period(in Years & Months)</th></tr>
						<tr><td>Teaching experience</td>
						<td><?php echo $d5['teach_exp_org']; ?></td>
						<td><?php echo $d5['teach_exp_period_year']; ?></td>
						<td><?php echo $d5['teach_exp_period_month']; ?></td>
						</tr>
						<tr><td>Post-Ph.D. Research experience</td>
						<td><?php echo $d5['phd_exp_org']; ?></td>
						<td><?php echo $d5['phd_exp_period_month']; ?> </td>
						<td><?php echo $d5['phd_exp_period_month']; ?></td>
						</tr>
						<tr><td>Industrial experience</td>
						<td><?php echo $d5['ind_exp_org']; ?></td>
						<td><?php echo $d5['ind_exp_period_month']; ?></td>
						<td><?php echo $d5['ind_exp_period_month']; ?></td>
						</tr>
					</tbody>
				</table>
			
				<table>
				<tr><td>10.</td><td colspan="6">Area of Specialization :</td></tr>
				<tr><td colspan=7><span style="display:block;width:400px;min-height:140px;text-wrap:normal;"><?php  echo $d5['area_specialization'];  ?></span></td></tr>
				<tr><td width="30px">11.</td><td colspan="5" >Number of paper(s) published / patents, if any:</td></tr>
				</table>
				<table border="1" cellspacing="0" cellpadding="5px">
					<tbody>
						<tr bgcolor="#000000" style="color:#efefef;" ><th>&nbsp;</th><th>&nbsp;</th><th>Total nos. of publications</th><th>Nos. of SCI publications</th></tr>
						<tr>
						<td>(a)</td>
						<td>Journal</td>
						<td><?php echo ($d4['no_paper_published_journal_national'] + $d4['no_paper_published_journal_international']); ?></td>
						<td><?php echo ($d4['no_sci_national'] + $d4['no_sci_international']); ?></td></tr>
						<tr>
						<td>&nbsp;</td>
						<td>(i) International</td>
						<td><?php echo $d4['no_paper_published_journal_international']; ?></td>
						<td><?php echo $d4['no_sci_international']; ?></td></tr>
						<tr>
						<td>&nbsp;</td>
						<td>(ii) National</td><td><?php echo $d4['no_paper_published_journal_national']; ?></td>
						<td><?php echo $d4['no_sci_national']; ?></td></tr>
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
						<td> : <?php echo $d4['international_paper_conf_presented_count']; ?></td></tr>
						<tr><td></td>&nbsp;<td>(ii) National</td>
					<td> : <?php echo $d4['national_paper_conf_count']; ?></td></tr>
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
								<td> : <?php echo $d4['no_paper_published_books']; ?></td>
							</tr>
						</tbody>
					</table>
				
					</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) in the following format (should be submitted along with the hard copy of the application) -> <u><i>Author(s) Name, Title of the Book, Name of the Publisher,  Year of Publication, Page No.(if applicable), ISSN No.</i></u></td></tr>
				<tr>
					<td colspan="7">
					<table >
						<tbody>
							<tr>
								<td>(d) </td>
								<td> Patents</td>
								<td> : <?php echo $d4['no_paper_published_patents']; ?></td>
							</tr>
						</tbody>
					</table>
				
					</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s)  (should be submitted along with the hard copy of the application) <br /> &nbsp;</td></tr>

				
				<tr>
					<td>12. </td><td colspan="6"> No. of Ph.D. Guided/Ongoing:</td>
				</tr>
				<tr>
					<td>&nbsp;</td><td colspan="6">
					<table border="1" cellspacing="0" cellpadding="5px" >
						<tbody>
							<tr bgcolor="#000000" style="color:#efefef;" ><th>&nbsp;</th><th>&nbsp;</th><th>Completed</th><th>Ongoing</th></tr>
							<tr><td>(a)</td><td>Sole/ Principal Supervisor</td>
								<td><?php echo $d4['no_phd_guided_sole']; ?></td>
								<td><?php echo $d4['no_phd_guided_sole_ongoing'];  ?></td></tr>
							<tr><td>(b)</td><td>Co - Supervisor</td>
								<td><?php echo $d4['no_phd_guided_supervisor']; ?></td>
								<td><?php echo $d4['no_phd_guided_supervisor_ongoing']; ?></td></tr>
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
						<td> : <?php  echo $d5['no_mtech_projects']; ?></td></tr>
						<tr><td>B. Tech. </td>
						<td> : <?php  echo $d5['no_btech_projects']; ?></td></tr>
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
						<table border="1" cellspacing="0" cellpadding="5px">
						<tbody>
						<tr bgcolor="#000000" style="color:#efefef;" ><th>&nbsp;</th><th>&nbsp;</th><th>Research Projects</th><th>Consultancy Projects</th></tr>
						<tr><td>(a)</td><td>Principal Investigator</td><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td></td>&nbsp;<td>(i) Completed</td>
						<td><?php echo $d4['no_projects_as_coordinator_sf_completed']; ?></td>
						<td><?php echo $d4['consultancy_sf_completed'];  ?></td></tr>
						<tr><td></td>&nbsp;<td>(ii) Ongoing</td>
						<td><?php echo $d4['no_projects_as_coordinator_sf_ongoing']; ?></td>
						<td><?php echo $d4['consultancy_sf_ongoing'];  ?></td></tr>
						<tr><td>(b)</td><td>Co-Principal Investigator</td><td>&nbsp;</td><td>&nbsp;</td></tr>
						<tr><td></td>&nbsp;<td>(i) Completed</td>
						<td><?php echo $d4['no_projects_as_coordinator_s_completed']; ?></td>
						<td><?php  echo $d4['consultancy_s_completed']; ?></td></tr>
						<tr><td></td>&nbsp;<td>(ii) Ongoing</td>
						<td><?php echo $d4['no_projects_as_coordinator_s_ongoing']; ?></td>
						<td><?php echo $d4['consultancy_s_ongoing']; ?></td></tr>
					
						</tbody>
					</table>
					</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) in the following format (should be submitted along with the hard copy of the application) -> <u><i>Name of the Sponsoring Agency, Title of the Project, Project period, Status (Completed/Ongoing).<br /> &nbsp;</i></u></td></tr>

				<tr>
					<td>15. </td><td colspan="4"> No. of Conference / Symposium/Seminar/Workshop/STTP organized:</td>
					<td width="200px" colspan="3">: <?php echo $d4['no_conf_symp_seminar_organized']; ?> Nos.</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) in the following format (should be submitted with supporting documents along with the hard copy of the application) -> <u><i>Name of the Programme, Duration, Sponsoring Agency.<br /> &nbsp;</i></u></td></tr>
				<tr>
					<td>16. </td><td colspan="4"> No. of Conference / Symposium/Seminar/Workshop/STTP attended:</td>
					<td colspan="3">: <?php echo $d4['no_conf_symp_seminar_attended']; ?> Nos.</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) in the following format (should be submitted along with the hard copy of the application) -> <u><i>Name of the Programme, Name of the Organization, Duration.<br /> &nbsp;</i></u></td></tr>
				<tr>
					<td>17. </td><td colspan="6"> No. of Experimental / Computational design Projects added to the teaching laboratory:</td>
				</tr>
				<tr>
					<td colspan="7">
					<table cellspacing="5px">
					<tbody>
						<tr><td>(a) Experimental Projects</td>
						<td> : <?php  echo $d4['no_experiments']; ?></td></tr>
						<tr><td>(b) Computational design Projects </td>
						<td> : <?php echo $d4['no_comp_design_projects'];  ?></td></tr>
					</tbody>
					</table>
				
					</td>
				</tr>
				<tr><td colspan="7">Give details in extra sheet(s) (should be submitted along with the hard copy of the application).<br /> &nbsp;</td></tr>

				<tr>
					<td>18. </td><td colspan="6"> Awards / Recognition, if any (attach supporting documents):</td>
				</tr>
				
				<tr>
					<td >&nbsp;</td><td colspan="6">
							<span style="display:block;width:400px;min-height:140px;text-wrap:normal;">
					<?php  echo $d4['awards_recog']; ?></span></td>
				</tr>
				
				
				<tr>
					<td>19. </td><td colspan="6"> Particulars of any other professional experience/Co-curricular activities/other relevant information:</td>
				</tr>
				<tr>
					<td >&nbsp;</td><td colspan="6">
					<span style="display:block;width:400px;min-height:140px;text-wrap:normal;">
					<?php echo $d4['particulars_prof_exp_other']; ?></span></td>
				</tr>
				
				
				
				</table>
				<br />
				<hr />
				
<br />
				
<br />
<br />
<br />
	
		
		<hr />
					
<br />
<br />
		<hr />
		<br />
		
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