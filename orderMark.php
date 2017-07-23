<?php 
require_once('include/connect.php'); 
require_once('include/view.php');

//Customer's previous due
//if(isset($_GET['salesId'])){ 
    
    echo $st_sbj = $_GET['st_sbj'];
	echo $st_id = $_GET['studentId'];
	echo $st_class = $_GET['st_class'];
	echo $st_sec = $_GET['st_sec'];
	echo $st_grp = $_GET['st_grp'];
	echo $st_shft = $_GET['st_shft'];
	
	echo $st_term = $_GET['st_term'];
	echo $st_session = $_GET['st_session'];
	
	echo $ct_marks1 = $_GET['ct_marks1'];
	echo $ct_marks2 = $_GET['ct_marks2'];
	echo $avg = $_GET['avg'];
	echo $creative_marks = $_GET['creative_marks'];
	echo $obj_marks = $_GET['obj_marks'];
	echo $prac_marks = $_GET['prac_marks'];
	echo $total = $_GET['total'];
	echo $user_id = $_GET['user_id'];

	
		
		$qry_sub = mysql_query("SELECT `cr_pass_marks`, `ob_pass_marks`, `pass_marks_under` FROM `tbl_subject` WHERE `subject_id` = '".$st_sbj."'") or die(mysql_error());
  		$row_sub = mysql_fetch_array($qry_sub);
  
  		$integration = round(($avg+$total)/2);
		
		$qry_having_grp = mysql_query("SELECT * FROM `tbl_full_marks` WHERE student_name='".$st_id."' AND class_name='".$st_class."' AND section_name='".$st_sec."' AND group_name='".$st_grp."' AND shift_name='".$st_shft."' AND subject_name='".$st_sbj."' AND term_name='".$st_term."' AND exam_year='".$st_session."'") or die(mysql_error());
			
		if(mysql_num_rows($qry_having_grp) > 0){ ?>
		 <div class="alert alert-success">
         	<button class="close" data-dismiss="alert"></button> You already insert this value.
         </div>
           
		<?php

		}else{
			$sql = mysql_query("INSERT INTO `tbl_full_marks`(`school_id`,`student_name`, `class_name`, `section_name`, `shift_name`, `group_name`, `subject_name`, `term_name`, `exam_year`, `ct_marks1`, `ct_marks2`, `avg`, `creative`, `objective`, `practicle`, `total`,`integration`) VALUES ('".$user_id."','".$st_id."','".$st_class."','".$st_sec."','".$st_shft."','".$st_grp."','".$st_sbj."','".$st_term."','".$st_session."', '".$ct_marks1."','".$ct_marks2."','".$avg."','".$creative_marks."','".$obj_marks."','".$prac_marks."','".$total."','".$integration."')") or die(mysql_error());
			
			$qry_term = mysql_query("SELECT * FROM tbl_term WHERE `term_id` = '".$st_term."'") or die(mysql_error());
			$rw_term = mysql_fetch_array($qry_term);
		
			if($rw_term['isActive'] == 1){
			
			$sql1 = mysql_query("SELECT `sub_marks` FROM tbl_marksheet WHERE student_name='".$st_id."' AND class_name='".$st_class."' AND section_name='".$st_sec."' AND group_name='".$st_grp."' AND shift_name='".$st_shft."' AND subject_name='".$st_sbj."'") or die(mysql_error());
				$rw_sql1 = mysql_fetch_assoc($sql1);
				$total_marks = $integration + $rw_sql1['sub_marks'];
				
				$qry_grade = mysql_query("SELECT `grade`,`gpa` FROM `tbl_grade_assign` WHERE `subject_id`='".$st_sbj."' AND '".$total_marks."' BETWEEN `grade_from` AND `grade_to`") or die(mysql_error());
  $row_grade = mysql_fetch_array($qry_grade);
  
  				$sql_up = "UPDATE `tbl_marksheet` SET `term_name` = '".$st_term."', `sub_marks` = '".$total_marks."',`subject_grade` = '".$row_grade['grade']."',`subject_gpa` = '".$row_grade['gpa']."' WHERE `student_name` = '".$st_id."' AND `class_name` = '".$st_class."' AND `section_name` = '".$st_sec."' AND `shift_name` = '".$st_shft."' AND `group_name` = '".$st_grp."' AND `subject_name` = '".$st_sbj."'";
				$rs_up=mysql_query($sql_up) or die ("Error in update : ".mysql_error());
				echo "insert successful";
			
			
				}else{
				
				$sql1 = mysql_query("INSERT INTO `tbl_marksheet`(`school_id`, `student_name`, `class_name`, `section_name`, `shift_name`, `group_name`, `subject_name`,`term_name`, `exam_year`, `sub_marks`, `subject_grade`, `subject_gpa`) VALUES ('".$user_id."','".$st_id."','".$st_class."','".$st_sec."','".$st_shft."','".$st_grp."','".$st_sbj."','".$st_term."','".$st_session."','".$integration."','','')") or die(mysql_error());
				
				}
			
			}
			
		
		

?>