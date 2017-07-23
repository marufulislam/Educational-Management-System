<?php
require_once('../include/connect.php');
require_once('../include/view.php');


if(isset($_REQUEST['temp']) == false) $temp = "";
else if(isset($_REQUEST['temp']) == true)	$temp = $_REQUEST['temp'];

$page_link = escape(isset($_POST['page_link'])) ?  $_POST['page_link'] : '';	
$student_id = escape(isset($_POST['student_id'])) ?  $_POST['student_id'] : '';
$class_name = escape(isset($_POST['class_name'])) ?  $_POST['class_name'] : '';
$section_name = escape(isset($_POST['section_name'])) ?  $_POST['section_name'] : '';
$group_name = escape(isset($_POST['group_name'])) ?  $_POST['group_name'] : '';
$shift_name = escape(isset($_POST['shift_name'])) ?  $_POST['shift_name'] : '';
$subject_name = escape(isset($_POST['subject_name'])) ?  $_POST['subject_name'] : '';
$term_name = escape(isset($_POST['term_name'])) ?  $_POST['term_name'] : '';
$exam_year = escape(isset($_POST['exam_year'])) ?  $_POST['exam_year'] : '';
$ct_marks1 = escape(isset($_POST['ct_marks1'])) ?  $_POST['ct_marks1'] : '';
$ct_marks2 = escape(isset($_POST['ct_marks2'])) ?  $_POST['ct_marks2'] : '';
$avg = escape(isset($_POST['avg'])) ?  $_POST['avg'] : '';

$creative_marks = escape(isset($_POST['creative_marks'])) ?  $_POST['creative_marks'] : '';
$obj_marks = escape(isset($_POST['obj_marks'])) ?  $_POST['obj_marks'] : '';
$prac_marks = escape(isset($_POST['prac_marks'])) ?  $_POST['prac_marks'] : '';
$total = escape(isset($_POST['total'])) ?  $_POST['total'] : '';

$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';


//print_r($_POST);
//exit();

date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');

$show = 0;
foreach($_POST['student_id'] as $sk => $sv){ 

$qry_sub = mysql_query("SELECT `cr_pass_marks`, `ob_pass_marks`, `pass_marks_under` FROM `tbl_subject` WHERE `subject_id` = '".$subject_name."'") or die(mysql_error());
  $row_sub = mysql_fetch_array($qry_sub);
  
  $integration = round($avg[$sk]+$total[$sk]);
  
  
$qry_grade = mysql_query("SELECT `grade`,`gpa` FROM `tbl_grade_assign` WHERE `class_id`='".$class_name."' AND `subject_id`='".$subject_name."' AND '".$integration."' BETWEEN `grade_from` AND `grade_to`") or die(mysql_error());
  $row_grade = mysql_fetch_array($qry_grade);
					  
$qry_class = mysql_query("SELECT `class_short_form` FROM `tbl_class` WHERE `class_id` = '".$class_name."'") or die(mysql_error());
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
					  
					  
					  if($row_sub['ob_pass_marks'] == 0 && $creative_marks[$sk] < $row_sub['cr_pass_marks']){
						 $subject_grade = "F"; 
						  $subject_gpa = 0.00;
						  }
					  else if($row_sub['cr_pass_marks'] == 0 && $obj_marks[$sk] < $row_sub['ob_pass_marks']){
						 $subject_grade = "F"; 
						  $subject_gpa = 0.00;
						  }	  
						  					  
					  else if($creative_marks[$sk] < $row_sub['cr_pass_marks'] || $obj_marks[$sk] < $row_sub['ob_pass_marks']){

						  $subject_grade = "F";
						   $subject_gpa = 0.00;
						  }else{$subject_grade = $row_grade['grade'];
						       $subject_gpa = $row_grade['gpa'];
						  }
					  
					   
					  
			   }
	
	$qry_having_grp = mysql_query("SELECT * FROM `tbl_full_marks` WHERE `student_name` = '".$sk."' AND `class_name` = '".$class_name."' AND `section_name` = '".$section_name."' AND `shift_name` = '".$shift_name."' AND `group_name` = '".$group_name."' AND `subject_name` = '".$subject_name."'");
	
	
	if(mysql_num_rows($qry_having_grp) > 0){
	 if($ct_marks1[$sk] != '' || $ct_marks2[$sk] != '' || $avg[$sk] != '' || $creative_marks[$sk] != '' || $obj_marks[$sk] != '' || $prac_marks[$sk] != ''){
		$row = mysql_fetch_array($qry_having_grp);
		$sql_up = "UPDATE `tbl_full_marks` SET `term_name` = '".$term_name."',`exam_year` = '".$exam_year."',`ct_marks1` = '".$ct_marks1[$sk]."',`ct_marks2` = '".$ct_marks2[$sk]."',`avg` = '".$avg[$sk]."',`creative` = '".$creative_marks[$sk]."',`objective` = '".$obj_marks[$sk]."',`practicle` = '".$prac_marks[$sk]."',`total` = '".$total[$sk]."',`integration` = '".$integration."',`subject_grade` = '".$subject_grade."',`subject_gpa` = '".$subject_gpa."' WHERE `student_name` = '".$sk."' AND `class_name` = '".$class_name."' AND `section_name` = '".$section_name."' AND `shift_name` = '".$shift_name."' AND `group_name` = '".$group_name."' AND `subject_name` = '".$subject_name."'";
		$rs_up=mysql_query($sql_up) or die ("Error in update : ".mysql_error());
		
		if($rs_up){
		$show++;	
		}
	  }else {
		  echo "There is a insertion problem";
		 // $sql_del =  mysql_query("DELETE FROM `tbl_full_marks` WHERE `student_name` = '".$sk."' AND `class_name` = '".$class_name."' AND `section_name` = '".$section_name."' AND `shift_name` = '".$shift_name."' AND `group_name` = '".$group_name."'");
		  }
	
	
	}else{
		
		
		
		if($ct_marks1[$sk] != '' || $ct_marks2[$sk] != '' || $avg[$sk] != ''){
			$sql_grp = "INSERT INTO `tbl_full_marks`(`school_id`,`student_name`, `class_name`, `section_name`, `shift_name`, `group_name`, `subject_name`, `term_name`, `exam_year`, `ct_marks1`, `ct_marks2`, `avg`, `creative`, `objective`, `practicle`, `total`,`integration`, `subject_grade`,`subject_gpa`) VALUES ('".$user_id."','".escape($sv)."','".$class_name."','".$section_name."','".$shift_name."','".$group_name."','".$subject_name."','".$term_name."','".$exam_year."', '".$ct_marks1[$sk]."','".$ct_marks2[$sk]."','".$avg[$sk]."','".$creative_marks[$sk]."','".$obj_marks[$sk]."','".$prac_marks[$sk]."','".$total[$sk]."','".$integration."','".$subject_grade."','".$subject_gpa."')";
			
			$qry_grp = mysql_query($sql_grp) or die("ERROR in marks Insertion :".mysql_error());
		
		if($qry_grp){
		$show++;	
		}
		
			
		}
	
	
		}
		
}
if($show > 0){
			?>
			<blockquote class="quote_blue">
			  <p>Information Updated successfully.</p>
			</blockquote>
			<script>
			$(".form_success").hide();
			$(".form-group").slideUp();
		   setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 3000);	
			
			</script>
			<?php      
			}else{
		?>
		<blockquote class="quote_pink">
		  <p>Error Occured, Please try again.</p>
		</blockquote>
		<script>
		$("#idsubmitData").show();
		
		</script>
		<?php  
		}
			

?>