<?php 
require_once('include/connect.php'); 
require_once('include/functions.php'); 
//Customer's previous due
//if(isset($_GET['salesId'])){ 
    echo $vl = $_GET['vl'];
    echo $subId = $_GET['subId'];
	echo $st_id = $_GET['st_id'];
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

	if($vl == 1){
		
		$qry_sub = mysql_query("SELECT `cr_pass_marks`, `ob_pass_marks`, `pass_marks_under` FROM `tbl_subject` WHERE `subject_id` = '".$subId."'") or die(mysql_error());
  $row_sub = mysql_fetch_array($qry_sub);
  
  $integration = $avg+$total;
  

  
  $qry_grade = mysql_query("SELECT `grade`,`gpa` FROM `tbl_grade_assign` WHERE `class_id`='".$st_class."' AND `subject_id`='".$subId."' AND '".$integration."' BETWEEN `grade_from` AND `grade_to`") or die(mysql_error());
  $row_grade = mysql_fetch_array($qry_grade);
					  
$qry_class = mysql_query("SELECT `class_short_form` FROM `tbl_class` WHERE `class_id` = '".$st_class."'") or die(mysql_error());
  $row_class = mysql_fetch_array($qry_class);
	       
	 if($row_class['class_short_form'] < 9){
			   
	    if($integration < $row_sub['pass_marks_under']){
				   $subject_grade = "F";
				    $subject_gpa = 0.00;
				   }else{
			   $subject_grade = $row_grade['grade'];
			   $subject_gpa = $row_grade['gpa'];
				   }
			   
			   }else{
					  
					  
					  if($row_sub['ob_pass_marks'] == 0 && $creative_marks < $row_sub['cr_pass_marks']){
						 $subject_grade = "F"; 
						 $subject_gpa = 0.00;
						  }
					  else if($row_sub['cr_pass_marks'] == 0 && $obj_marks < $row_sub['ob_pass_marks']){
						 $subject_grade = "F"; 
						 $subject_gpa = 0.00;
						  }	  
						  					  
					  else if($creative_marks < $row_sub['cr_pass_marks'] || $obj_marks < $row_sub['ob_pass_marks']){

						  $subject_grade = "F";
						  $subject_gpa = 0.00;
						  
						  }else{$subject_grade = $row_grade['grade'];
						   $subject_gpa = $row_grade['gpa'];
						  }
					  
					   
					  
			   }
		
		
		
		
			$qry_having_grp = mysql_query("SELECT * FROM `tbl_full_marks` WHERE student_name='".$st_id."' AND class_name='".$st_class."' AND section_name='".$st_sec."' AND group_name='".$st_grp."' AND shift_name='".$st_shft."' AND subject_name='".$subId."' AND term_name='".$st_term."' AND exam_year='".$st_session."'") or die(mysql_error());
			
		if(mysql_num_rows($qry_having_grp) > 0){
			
		$sql = mysql_query("UPDATE tbl_full_marks SET `ct_marks1` = '".$ct_marks1."',`ct_marks2` = '".$ct_marks2."',`avg` = '".$avg."',`creative` = '".$creative_marks."',`objective` = '".$obj_marks."',`practicle` = '".$prac_marks."',total='".$total."',integration='".$integration."',subject_grade='".$subject_grade."',subject_gpa='".$subject_gpa."' WHERE student_name='".$st_id."' AND class_name='".$st_class."' AND section_name='".$st_sec."' AND group_name='".$st_grp."' AND shift_name='".$st_shft."' AND subject_name='".$subId."' AND term_name='".$st_term."' AND exam_year='".$st_session."'") or die(mysql_error());
		echo "update successful";
		}else{
			$sql = mysql_query("INSERT INTO `tbl_full_marks`(`school_id`,`student_name`, `class_name`, `section_name`, `shift_name`, `group_name`, `subject_name`, `term_name`, `exam_year`, `ct_marks1`, `ct_marks2`, `avg`, `creative`, `objective`, `practicle`, `total`,`integration`, `subject_grade`,`subject_gpa`) VALUES ('".$user_id."','".$st_id."','".$st_class."','".$st_sec."','".$st_shft."','".$st_grp."','".$subId."','".$st_term."','".$st_session."', '".$ct_marks1."','".$ct_marks2."','".$avg."','".$creative_marks."','".$obj_marks."','".$prac_marks."','".$total."','".$integration."','".$subject_grade."','".$subject_gpa."')") or die(mysql_error());
			echo "insert successful";
			}
		
	}
?>