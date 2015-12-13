<?php
include "h.conn.php";
session_start();
if(!isset($_SESSION['reg_id']))
{
	header("location:index.php");
}
	$reg_id = $_SESSION['reg_id'];
	$name_applicant = strtoupper(addslashes($_POST['name_applicant']));
	$name_father = strtoupper(addslashes($_POST['name_father']));
	$permanent_address  = strtoupper(addslashes($_POST['permanent_address']));
	$present_address = strtoupper(addslashes($_POST['present_address']));
	$department = addslashes($_POST['department_pos']);
	$faculty_pos = $_POST['faculty_pos'];
	
	$phone_no = addslashes($_POST['phone_no']);
	$dob = $_POST['u_dob'];
	$dob = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$1-$2', $dob);
	$dob = addslashes($dob);
	$nationality = addslashes($_POST['nationality']);
	$place_birth = addslashes($_POST['place_birth']);
	$caste = addslashes($_POST['caste']);
	$gender = addslashes($_POST['gender']);
	$maritial_status = addslashes($_POST['maritial_status']);
	for($i=0;$i<5;$i++)
	{
		$j=$i+1;
		$exam_name[$i] = (isset($_POST['exam'.$j.'_name'])?addslashes($_POST['exam'.$j.'_name']):"");
		$exam_year[$i] = (isset($_POST['exam'.$j.'_year'])?addslashes($_POST['exam'.$j.'_year']):"");
		$exam_percentage[$i] = (isset($_POST['exam'.$j.'_percentage'])?addslashes($_POST['exam'.$j.'_percentage']):"");
		$exam_divn[$i] = (isset($_POST['exam'.$j.'_divn'])?addslashes($_POST['exam'.$j.'_divn']):"");
		$exam_institute[$i] = (isset($_POST['exam'.$j.'_institute'])?addslashes($_POST['exam'.$j.'_institute']):"");
		$exam_univ[$i] = (isset($_POST['exam'.$j.'_univ'])?addslashes($_POST['exam'.$j.'_univ']):"");
	}
	
	
	for($i=0;$i<5;$i++)
	{
		$j=$i+1;
		$post_name[$i] = (isset($_POST['post'.$j.'_name'])?addslashes($_POST['post'.$j.'_name']):"");
		$post_from[$i] = (isset($_POST['post'.$j.'_from'])?addslashes($_POST['post'.$j.'_from']):"");
		$post_to[$i] = (isset($_POST['post'.$j.'_to'])?addslashes($_POST['post'.$j.'_to']):"");
		$post_total_year[$i] = (isset($_POST['post'.$j.'_total_year'])?addslashes($_POST['post'.$j.'_total_year']):"");
		$post_total_month[$i] = (isset($_POST['post'.$j.'_total_month'])?addslashes($_POST['post'.$j.'_total_month']):"");
		$post_institute[$i] = (isset($_POST['post'.$j.'_institute'])?addslashes($_POST['post'.$j.'_institute']):"");
		$post_pay[$i] = (isset($_POST['post'.$j.'_pay'])?addslashes($_POST['post'.$j.'_pay']):"");
	}
	
	$national_paper_conf_count = addslashes($_POST['national_paper_conf_count']);
	$national_paper_conf_desc = addslashes($_POST['national_paper_conf_desc']);
	$international_paper_conf_presented_count = addslashes($_POST['international_paper_conf_presented_count']);
	$international_paper_conf_presented_desc = addslashes($_POST['international_paper_conf_presented_desc']);
	$no_paper_published_journal_national = addslashes($_POST['no_paper_published_journal_national']);
	$no_paper_published_journal_international = addslashes($_POST['no_paper_published_journal_international']);
	$no_paper_published_books = addslashes($_POST['no_paper_published_books']);
	$no_paper_published_patents = addslashes($_POST['no_paper_published_patents']);
	$no_phd_guided_sole = addslashes($_POST['no_phd_guided_sole']);
	$no_phd_guided_supervisor = addslashes($_POST['no_phd_guided_supervisor']);
	$no_projects_as_coordinator_sf_completed = addslashes($_POST['no_projects_as_coordinator_sf_completed']);
	$no_projects_as_coordinator_sf_ongoing = addslashes($_POST['no_projects_as_coordinator_sf_ongoing']);
	$no_projects_as_coordinator_s_completed = addslashes($_POST['no_projects_as_coordinator_s_completed']);
	$no_projects_as_coordinator_s_ongoing = addslashes($_POST['no_projects_as_coordinator_s_ongoing']);
	$dosubmit = date('Y-m-d');
	$particulars_prof_exp_other = addslashes($_POST['particulars_prof_exp_other']);
	$certificates = addslashes($_POST['certificates']);
	$more_posts_desc = addslashes($_POST['more_posts_desc']);
	
	$bank_name_branch = strtoupper(addslashes($_POST['bank_name_branch']));
	$bank_trans_no = addslashes($_POST['bank_trans_no']);
	$bank_amount = addslashes($_POST['bank_amount']);
	$bank_date = $_POST['bank_date'];
	$bank_date = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$1-$2', $bank_date); //changing date format for mysql insertion.. 
	$bank_date = addslashes($bank_date);
	
	$year_enrolment = addslashes($_POST['year_enrolment']);
	$status = addslashes($_POST['status']);
	$year_complete = addslashes($_POST['year_complete']);
	$year_awarded = addslashes($_POST['year_awarded']);
	$total_period = addslashes($_POST['total_period']);
	$institute_name = addslashes($_POST['institute_name']);
	$other_details_education = addslashes($_POST['other_details_education']);
	$advertisement_no = addslashes($_POST['advertisement_no']);
	
	$submitted = 0;
	
	$submit1_query = "UPDATE user_info SET gender='".$gender."', maritial_status='".$maritial_status."', department='".$department."', faculty_pos='".$faculty_pos."', name_applicant = '".$name_applicant."',name_father = '".$name_father."',permanent_address = '".$permanent_address."',present_address = '".$present_address."',phone_no = '".$phone_no."',dob = '".$dob."',nationality = '".$nationality."',place_birth = '".$place_birth."',caste = '".$caste."' WHERE reg_id = '".$reg_id."' ";
	$submit1_result = mysql_query($submit1_query) or die(mysql_error());
	
	$submit2_query = "UPDATE user_exams SET exam1_name = '".$exam_name[0]."',exam1_year = '".$exam_year[0]."',exam1_percentage = '".$exam_percentage[0]."',exam1_divn = '".$exam_divn[0]."',exam1_institute = '".$exam_institute[0]."',exam1_univ = '".$exam_univ[0]."', exam2_name = '".$exam_name[1]."',exam2_year = '".$exam_year[1]."',exam2_percentage = '".$exam_percentage[1]."',exam2_divn = '".$exam_divn[1]."',exam2_institute = '".$exam_institute[1]."',exam2_univ = '".$exam_univ[1]."',exam3_name = '".$exam_name[2]."',exam3_year = '".$exam_year[2]."',exam3_percentage = '".$exam_percentage[2]."',exam3_divn = '".$exam_divn[2]."',exam3_institute = '".$exam_institute[2]."',exam3_univ = '".$exam_univ[2]."',exam4_name = '".$exam_name[3]."',exam4_year = '".$exam_year[3]."',exam4_percentage = '".$exam_percentage[3]."',exam4_divn = '".$exam_divn[3]."',exam4_institute = '".$exam_institute[3]."',exam4_univ = '".$exam_univ[3]."',exam5_name = '".$exam_name[4]."',exam5_year = '".$exam_year[4]."',exam5_percentage = '".$exam_percentage[4]."',exam5_divn = '".$exam_divn[4]."',exam5_institute = '".$exam_institute[4]."',exam5_univ = '".$exam_univ[4]."' WHERE reg_id = '".$reg_id."' ";
	$submit2_result = mysql_query($submit2_query) or die(mysql_error());
	
	$submit3_query = "UPDATE user_earlier_posts SET post1_institute='".$post_institute[0]."',post2_institute='".$post_institute[1]."',post3_institute='".$post_institute[2]."',post4_institute='".$post_institute[3]."',post5_institute='".$post_institute[4]."', more_posts_desc='".$more_posts_desc."',post1_name = '".$post_name[0]."',post1_from = '".$post_from[0]."',post1_to = '".$post_to[0]."',post1_total_year = '".$post_total_year[0]."',post1_total_month = '".$post_total_month[0]."',post1_pay = '".$post_pay[0]."',post2_name = '".$post_name[1]."',post2_from = '".$post_from[1]."',post2_to = '".$post_to[1]."',post2_total_year = '".$post_total_year[1]."',post2_total_month = '".$post_total_month[1]."',post2_pay = '".$post_pay[1]."',post3_name = '".$post_name[2]."',post3_from = '".$post_from[2]."',post3_to = '".$post_to[2]."',post3_total_year = '".$post_total_year[2]."',post3_total_month = '".$post_total_month[2]."',post3_pay = '".$post_pay[2]."',post4_name = '".$post_name[3]."',post4_from = '".$post_from[3]."',post4_to = '".$post_to[3]."',post4_total_year = '".$post_total_year[3]."',post4_total_month = '".$post_total_month[3]."',post4_pay = '".$post_pay[3]."',post5_name = '".$post_name[4]."',post5_from = '".$post_from[4]."',post5_to = '".$post_to[4]."',post5_total_year = '".$post_total_year[4]."',post5_total_month = '".$post_total_month[4]."',post5_pay = '".$post_pay[4]."' WHERE reg_id = '".$reg_id."'";
	$submit3_result = mysql_query($submit3_query) or die(mysql_error());
	
	$submit4_query = "UPDATE user_other_details SET advertisement_no='".$advertisement_no."', bank_name_branch='".$bank_name_branch."',bank_trans_no='".$bank_trans_no."',bank_date='".$bank_date."',bank_amount='".$bank_amount."',national_paper_conf_count='".$national_paper_conf_count."', national_paper_conf_desc='".$national_paper_conf_desc."',international_paper_conf_presented_count='".$international_paper_conf_presented_count."',international_paper_conf_presented_desc='".$international_paper_conf_presented_desc."',no_paper_published_journal_national='".$no_paper_published_journal_national."', no_paper_published_journal_international='".$no_paper_published_journal_international."',no_paper_published_books='".$no_paper_published_books."', no_paper_published_patents='".$no_paper_published_patents."',no_phd_guided_sole='".$no_phd_guided_sole."',no_phd_guided_supervisor='".$no_phd_guided_supervisor."',no_projects_as_coordinator_sf_completed='".$no_projects_as_coordinator_sf_completed."',no_projects_as_coordinator_sf_ongoing='".$no_projects_as_coordinator_sf_ongoing."',no_projects_as_coordinator_s_completed='".$no_projects_as_coordinator_s_completed."',no_projects_as_coordinator_s_ongoing='".$no_projects_as_coordinator_s_ongoing."',particulars_prof_exp_other='".$particulars_prof_exp_other."',certificates='".$certificates."',submitted='".$submitted."' WHERE reg_id='".$reg_id."'";
	$submit4_result = mysql_query($submit4_query) or die(mysql_error());
	
	$submit5_query = "UPDATE user_phd_details SET year_enrolment='".$year_enrolment."', status='".$status."', year_completed='".$year_complete."', total_period='".$total_period."', year_awarded='".$year_awarded."', institute_name='".$institute_name."', other_details_education='".$other_details_education."' WHERE reg_id='".$reg_id."' ";
	$submit5_result = mysql_query($submit5_query) or die(mysql_error());
?>	