<?php
include "h.conn.php";
session_start();
if(!isset($_SESSION['reg_id_nf']))
{
	header("location:index.php");
}
	$reg_id = $_SESSION['reg_id_nf'];
	$name_applicant = strtoupper(addslashes($_POST['name_applicant']));
	$name_father = strtoupper(addslashes($_POST['name_father']));
	$permanent_address  = strtoupper(addslashes($_POST['permanent_address']));
	$present_address = strtoupper(addslashes($_POST['present_address']));
	$position = $_POST['position'];
	
	$phone_no = addslashes($_POST['phone_no']);
	$dob = $_POST['u_dob'];
	$dob = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$1-$2', $dob);
	$dob = addslashes($dob);
	$dd = addslashes($_POST['dd']);
	$mm = addslashes($_POST['mm']);
	$yyyy = addslashes($_POST['yyyy']);
	$nationality = addslashes($_POST['nationality']);
	$place_birth = addslashes($_POST['place_birth']);
	$caste = (isset($_POST['caste'])?addslashes($_POST['caste']):'NULL');
	$gender = (isset($_POST['gender'])?addslashes($_POST['gender']):'NULL');
	$maritial_status = (isset($_POST['maritial_status'])?addslashes($_POST['maritial_status']):'NULL');
	$referee_1_name = addslashes($_POST['referee_1_name']);
	$referee_1_position = addslashes($_POST['referee_1_position']);
	$referee_1_address = addslashes($_POST['referee_1_address']);
	$referee_1_email = addslashes($_POST['referee_1_email']);
	$referee_1_phone = addslashes($_POST['referee_1_phone']);
	$referee_2_name = addslashes($_POST['referee_2_name']);
	$referee_2_position = addslashes($_POST['referee_2_position']);
	$referee_2_address = addslashes($_POST['referee_2_address']);
	$referee_2_email = addslashes($_POST['referee_2_email']);
	$referee_2_phone = addslashes($_POST['referee_2_phone']);
	
	
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
	$other_edu_details = addslashes($_POST['other_edu_details']);
	for($i=0;$i<5;$i++)
	{
		$j=$i+1;
		$post_name[$i] = (isset($_POST['post'.$j.'_name'])?addslashes($_POST['post'.$j.'_name']):"");
		$post_from[$i] = (isset($_POST['post'.$j.'_from'])?addslashes($_POST['post'.$j.'_from']):"");
		$post_to[$i] = (isset($_POST['post'.$j.'_to'])?addslashes($_POST['post'.$j.'_to']):"");
		$post_total_year[$i] = (isset($_POST['post'.$j.'_total_year'])?addslashes($_POST['post'.$j.'_total_year']):"");
		$post_total_month[$i] = (isset($_POST['post'.$j.'_total_month'])?addslashes($_POST['post'.$j.'_total_month']):"");
		$post_institute[$i] = (isset($_POST['post'.$j.'_institute'])?addslashes($_POST['post'.$j.'_institute']):"");
		$post_nature[$i] = (isset($_POST['post'.$j.'_nature'])?addslashes($_POST['post'.$j.'_nature']):"");
		$post_pay[$i] = (isset($_POST['post'.$j.'_pay'])?addslashes($_POST['post'.$j.'_pay']):"");
	}
	$other_posts_details = addslashes($_POST['other_posts_details']);
	
	$lang_hindi_read = (isset($_POST['lang_hindi_read'])?'1':'0') ;
	$lang_hindi_write = (isset($_POST['lang_hindi_write'])?'1':'0') ;
	$lang_hindi_speak = (isset($_POST['lang_hindi_speak'])?'1':'0') ;
	$lang_hindi_exam = addslashes($_POST['lang_hindi_exam']);
	$lang_english_read = (isset($_POST['lang_english_read'])?'1':'0') ;
	$lang_english_write = (isset($_POST['lang_english_write'])?'1':'0') ;
	$lang_english_speak = (isset($_POST['lang_english_speak'])?'1':'0') ;
	$lang_english_exam = addslashes($_POST['lang_english_exam']);
	$lang_other_1 = addslashes($_POST['lang_other_1']);
	$lang_other_2 = addslashes($_POST['lang_other_2']);
	$lang_other_3 = addslashes($_POST['lang_other_3']);
	$lang_other_exam = addslashes($_POST['lang_other_exam']);
	
	$member_of_prof_body_details = addslashes($_POST['member_of_prof_body_details']);
	$member_of_ncc_similar_details = addslashes($_POST['member_of_ncc_similar_details']);
	
	$previously_applied_details = addslashes($_POST['previously_applied_details']);
	
	$near_relation_1_name = addslashes($_POST['near_relation_1_name']);
	$near_relation_1_designation = addslashes($_POST['near_relation_1_designation']);
	$near_relation_1_relationship = addslashes($_POST['near_relation_1_relationship']);
	$near_relation_2_name = addslashes($_POST['near_relation_2_name']);
	$near_relation_2_designation = addslashes($_POST['near_relation_2_designation']);
	$near_relation_2_relationship = addslashes($_POST['near_relation_2_relationship']);
	
	$country_1_visited_name = addslashes($_POST['country_1_visited_name']);
	$country_1_visited_purpose = addslashes($_POST['country_1_visited_purpose']);
	$country_1_visited_year = addslashes($_POST['country_1_visited_year']);
	$country_2_visited_name = addslashes($_POST['country_2_visited_name']);
	$country_2_visited_purpose = addslashes($_POST['country_2_visited_purpose']);
	$country_2_visited_year = addslashes($_POST['country_2_visited_year']);
	
	$places_resided_1_from = addslashes($_POST['places_resided_1_from']);
	$places_resided_1_to = addslashes($_POST['places_resided_1_to']);
	$places_resided_1_address = addslashes($_POST['places_resided_1_address']);
	$places_resided_2_from = addslashes($_POST['places_resided_2_from']);
	$places_resided_2_to = addslashes($_POST['places_resided_2_to']);
	$places_resided_2_address = addslashes($_POST['places_resided_2_address']);
	$places_resided_3_from = addslashes($_POST['places_resided_3_from']);
	$places_resided_3_to = addslashes($_POST['places_resided_3_to']);
	$places_resided_3_address = addslashes($_POST['places_resided_3_address']);
	$places_resided_4_from = addslashes($_POST['places_resided_4_from']);
	$places_resided_4_to = addslashes($_POST['places_resided_4_to']);
	$places_resided_4_address = addslashes($_POST['places_resided_4_address']);
	
	$additional_remarks = addslashes($_POST['additional_remarks']);
	
	
	$certificates = addslashes($_POST['certificates']);
	
	$bank_name_branch = strtoupper(addslashes($_POST['bank_name_branch']));
	$bank_trans_no = addslashes($_POST['bank_trans_no']);
	$bank_amount = addslashes($_POST['bank_amount']);
	$bank_date = $_POST['bank_date'];
	$bank_date = preg_replace('#(\d{2})/(\d{2})/(\d{4})#', '$3-$1-$2', $bank_date); //changing date format for mysql insertion.. 
	$bank_date = addslashes($bank_date);
	
	
	$submitted = 0;
	
	$submit1_query = "UPDATE user_info SET gender='".$gender."', maritial_status='".$maritial_status."', position='".$position."', name_applicant = '".$name_applicant."',name_father = '".$name_father."',permanent_address = '".$permanent_address."',present_address = '".$present_address."',phone_no = '".$phone_no."',dob = '".$dob."',dd = '".$dd."',mm = '".$mm."',yyyy = '".$yyyy."',nationality = '".$nationality."',place_birth = '".$place_birth."',caste = '".$caste."' WHERE reg_id = '".$reg_id."' ";
	$submit1_result = mysql_query($submit1_query) or die(mysql_error());
	
	$submit2_query = "UPDATE user_exams SET exam1_name = '".$exam_name[0]."',exam1_year = '".$exam_year[0]."',exam1_percentage = '".$exam_percentage[0]."',exam1_divn = '".$exam_divn[0]."',exam1_institute = '".$exam_institute[0]."',exam1_univ = '".$exam_univ[0]."', exam2_name = '".$exam_name[1]."',exam2_year = '".$exam_year[1]."',exam2_percentage = '".$exam_percentage[1]."',exam2_divn = '".$exam_divn[1]."',exam2_institute = '".$exam_institute[1]."',exam2_univ = '".$exam_univ[1]."',exam3_name = '".$exam_name[2]."',exam3_year = '".$exam_year[2]."',exam3_percentage = '".$exam_percentage[2]."',exam3_divn = '".$exam_divn[2]."',exam3_institute = '".$exam_institute[2]."',exam3_univ = '".$exam_univ[2]."',exam4_name = '".$exam_name[3]."',exam4_year = '".$exam_year[3]."',exam4_percentage = '".$exam_percentage[3]."',exam4_divn = '".$exam_divn[3]."',exam4_institute = '".$exam_institute[3]."',exam4_univ = '".$exam_univ[3]."',exam5_name = '".$exam_name[4]."',exam5_year = '".$exam_year[4]."',exam5_percentage = '".$exam_percentage[4]."',exam5_divn = '".$exam_divn[4]."',exam5_institute = '".$exam_institute[4]."',exam5_univ = '".$exam_univ[4]."', other_edu_details='".$other_edu_details."' WHERE reg_id = '".$reg_id."' ";
	$submit2_result = mysql_query($submit2_query) or die(mysql_error());
	
	$submit3_query = "UPDATE user_earlier_posts SET post1_institute='".$post_institute[0]."',post2_institute='".$post_institute[1]."',post3_institute='".$post_institute[2]."',post4_institute='".$post_institute[3]."',post5_institute='".$post_institute[4]."', post1_name = '".$post_name[0]."',post1_from = '".$post_from[0]."',post1_to = '".$post_to[0]."',post1_total_year = '".$post_total_year[0]."',post1_total_month = '".$post_total_month[0]."',post1_pay = '".$post_pay[0]."',post2_name = '".$post_name[1]."',post2_from = '".$post_from[1]."',post2_to = '".$post_to[1]."',post2_total_year = '".$post_total_year[1]."',post2_total_month = '".$post_total_month[1]."',post2_pay = '".$post_pay[1]."',post3_name = '".$post_name[2]."',post3_from = '".$post_from[2]."',post3_to = '".$post_to[2]."',post3_total_year = '".$post_total_year[2]."',post3_total_month = '".$post_total_month[2]."',post3_pay = '".$post_pay[2]."',post4_name = '".$post_name[3]."',post4_from = '".$post_from[3]."',post4_to = '".$post_to[3]."',post4_total_year = '".$post_total_year[3]."',post4_total_month = '".$post_total_month[3]."',post4_pay = '".$post_pay[3]."',post5_name = '".$post_name[4]."',post5_from = '".$post_from[4]."',post5_to = '".$post_to[4]."',post5_total_year = '".$post_total_year[4]."',post5_total_month = '".$post_total_month[4]."',post5_pay = '".$post_pay[4]."',post1_nature = '".$post_nature[0]."',post2_nature = '".$post_nature[1]."',post3_nature = '".$post_nature[2]."',post4_nature = '".$post_nature[3]."',post5_nature = '".$post_nature[4]."', other_posts_details='".$other_posts_details."' WHERE reg_id = '".$reg_id."'";
	$submit3_result = mysql_query($submit3_query) or die(mysql_error());
	
	$submit4_query = "UPDATE user_other_details SET additional_remarks='".$additional_remarks."',places_resided_4_address='".$places_resided_4_address."',places_resided_4_to='".$places_resided_4_to."',places_resided_4_from='".$places_resided_4_from."',places_resided_3_address='".$places_resided_3_address."',places_resided_3_to='".$places_resided_3_to."',places_resided_3_from='".$places_resided_3_from."',places_resided_2_address='".$places_resided_2_address."',places_resided_2_to='".$places_resided_2_to."',places_resided_2_from='".$places_resided_2_from."',places_resided_1_address='".$places_resided_1_address."',places_resided_1_to='".$places_resided_1_to."',places_resided_1_from='".$places_resided_1_from."',country_2_visited_year='".$country_2_visited_year."',country_2_visited_purpose='".$country_2_visited_purpose."',country_2_visited_name='".$country_2_visited_name."',country_1_visited_year='".$country_1_visited_year."',country_1_visited_purpose='".$country_1_visited_purpose."',country_1_visited_name='".$country_1_visited_name."',near_relation_2_relationship='".$near_relation_2_relationship."',near_relation_2_designation='".$near_relation_2_designation."',near_relation_2_name='".$near_relation_2_name."',near_relation_1_relationship='".$near_relation_1_relationship."',near_relation_1_designation='".$near_relation_1_designation."',near_relation_1_name='".$near_relation_1_name."',previously_applied_details='".$previously_applied_details."',member_of_prof_body_details='".$member_of_prof_body_details."',previously_applied_details='".$previously_applied_details."',member_of_ncc_similar_details='".$member_of_ncc_similar_details."',member_of_prof_body_details='".$member_of_prof_body_details."',lang_other_exam='".$lang_other_exam."',lang_other_1='".$lang_other_1."',lang_other_2='".$lang_other_2."',lang_other_3='".$lang_other_3."', lang_hindi_read='".$lang_hindi_read."', lang_hindi_write='".$lang_hindi_write."', lang_hindi_speak='".$lang_hindi_speak."',lang_hindi_exam='".$lang_hindi_exam."',lang_english_read='".$lang_english_read."',lang_english_write='".$lang_english_write."',lang_english_speak='".$lang_english_speak."',lang_english_exam='".$lang_english_exam."',referee_1_name='".$referee_1_name."', referee_1_position='".$referee_1_position."',referee_1_address='".$referee_1_address."',referee_1_email='".$referee_1_email."',referee_1_phone='".$referee_1_phone."',referee_2_name='".$referee_2_name."', referee_2_position='".$referee_2_position."',referee_2_address='".$referee_2_address."',referee_2_email='".$referee_2_email."',referee_2_phone='".$referee_2_phone."', bank_name_branch='".$bank_name_branch."',bank_trans_no='".$bank_trans_no."',bank_date='".$bank_date."',bank_amount='".$bank_amount."',certificates='".$certificates."',submitted='".$submitted."' WHERE reg_id='".$reg_id."'";
	$submit4_result = mysql_query($submit4_query) or die(mysql_error());
?>	