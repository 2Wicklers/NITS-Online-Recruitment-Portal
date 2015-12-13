<?php
mysql_connect("localhost", "root", "");
if(mysql_select_db("nits_recruitment"))
{
	echo "Database nits_recruitment already exists<br/>";
}
else
{
	$q = "CREATE DATABASE nits_recruitment" or die(mysql_error());
	$r = mysql_query($q) or die(mysql_error());
	echo "Database nits_recruitment created successfully<br/>";
}

$q = "CREATE TABLE IF NOT EXISTS user_info (id int(11) NOT NULL auto_increment,
							  reg_id int(11) NOT NULL,
							  email varchar(255) NOT NULL,
							  password varchar(255) NOT NULL,
							  email_verified int(2) NOT NULL,
							  department varchar(50),
							  faculty_pos varchar(50),
							  name_applicant varchar(255),
							  name_father varchar(255),
							  permanent_address text,
							  present_address text,
							  mobile bigint(21),
							  phone_no varchar(15),
							  dob date,
							  nationality varchar(50),
							  place_birth varchar(50),
							  caste varchar(11),
							  gender varchar(11),
							  maritial_status varchar(21),
							  PRIMARY KEY (id))";
$r = mysql_query($q) or die(mysql_error());
echo "Table user_info created<br/>"; 	


$q1 = "CREATE TABLE IF NOT EXISTS user_exams(id bigint(21) NOT NULL auto_increment,
													 reg_id int(11) NOT NULL,
													 exam1_name varchar(255),
													 exam1_year int(5),
													 exam1_percentage float(11),
													 exam1_divn varchar(50),
													 exam1_institute varchar(255),
													 exam1_univ varchar(255),
													 exam2_name varchar(255),
													 exam2_year int(5),
													 exam2_percentage float(11),
													 exam2_divn varchar(50),
													 exam2_institute varchar(255),
													 exam2_univ varchar(255),
													 exam3_name varchar(255),
													 exam3_year int(5),
													 exam3_percentage float(11),
													 exam3_divn varchar(50),
													 exam3_institute varchar(255),
													 exam3_univ varchar(255),
													 exam4_name varchar(255),
													 exam4_year int(5),
													 exam4_percentage float(11),
													 exam4_divn varchar(50),
													 exam4_institute varchar(255),
													 exam4_univ varchar(255),
													 exam5_name varchar(255),
													 exam5_year int(5),
													 exam5_percentage float(11),
													 exam5_divn varchar(50),
													 exam5_institute varchar(255),
													 exam5_univ varchar(255),
													 PRIMARY KEY (id))";
$r1 = mysql_query($q1) or die(mysql_error());
echo "Table user_exams created<br/>";
$q2 = "CREATE TABLE IF NOT EXISTS user_other_details(id int(11) NOT NULL auto_increment,
													 reg_id int(11) NOT NULL,
												     national_paper_conf_count int(3),
													 national_paper_conf_desc text,
													 international_paper_conf_presented_count int(3),
													 international_paper_conf_presented_desc text,
													 no_paper_published_journal_national int(3),
													 no_paper_published_journal_international int(3),
													 no_paper_published_books int(3),
													 no_paper_published_patents int(3),
													 no_phd_guided_sole int(3),
													 no_phd_guided_supervisor int(3),
													 no_projects_as_coordinator_sf_completed int(3),
													 no_projects_as_coordinator_sf_ongoing int(3),
													 no_projects_as_coordinator_s_completed int(3),
													 no_projects_as_coordinator_s_ongoing int(3),
													 particulars_prof_exp_other text,
													 certificates text,
													 dosubmit date,
													 bank_trans_no varchar(50),
													 bank_name_branch text,
													 bank_amount varchar(15),
													 bank_date date,
													 submitted int(2),
													 advertisement_no varchar(20),
													 PRIMARY KEY (id))";
$r2 = mysql_query($q2) or die(mysql_error());
echo "Table user_other_details created<br/>";


$q3 = "CREATE TABLE IF NOT EXISTS user_earlier_posts(id int(11) NOT NULL auto_increment,
													 reg_id int(11) NOT NULL,
													 post1_name varchar(50),
													 post1_from int(5),
													 post1_to int(5),
													 post1_total_year int(3),
													 post1_total_month int(3),
													 post1_institute varchar(255),
													 post1_pay varchar(255),
													 post2_name varchar(50),
													 post2_from int(5),
													 post2_to int(5),
													 post2_total_year int(3),
													 post2_total_month int(3),
													 post2_institute varchar(255),
													 post2_pay varchar(255),
													 post3_name varchar(50),
													 post3_from int(5),
													 post3_to int(5),
													 post3_total_year int(3),
													 post3_total_month int(3),
													 post3_institute varchar(255),
													 post3_pay varchar(255),
													 post4_name varchar(50),
													 post4_from int(5),
													 post4_to int(5),
													 post4_total_year int(3),
													 post4_total_month int(3),
													 post4_institute varchar(255),
													 post4_pay varchar(255),
													 post5_name varchar(50),
													 post5_from int(5),
													 post5_to int(5),
													 post5_total_year int(3),
													 post5_total_month int(3),
													 post5_institute varchar(255),
													 post5_pay varchar(255),
													 more_posts_desc text,
													 PRIMARY KEY(id))";
$r3 = mysql_query($q3) or die(mysql_error());
echo "Tables user_earlier_posts created<br/>";

$q4 = "CREATE TABLE IF NOT EXISTS user_phd_details(id int(11) NOT NULL auto_increment,
										reg_id int(21) NOT NULL,
									  year_enrolment int(6),
									  status varchar(20),
									  year_completed int(6),
									  total_period int(5),
									  year_awarded int(6),
									  institute_name varchar(255),
									  other_details_education text,
									  PRIMARY KEY (id))";
$r4 = mysql_query($q4) or die(mysql_error());			  
echo "Tables user_phd_details created<br/>";
?>
