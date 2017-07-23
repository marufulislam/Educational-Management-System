<?php
require_once('../include/connect.php');
require_once('../include/view.php');


if(isset($_REQUEST['temp']) == false){
	$temp = "";
}
else if(isset($_REQUEST['temp']) == true){
	$temp = $_REQUEST['temp'];
}	

$page_link = escape(isset($_POST['page_link'])) ?  $_POST['page_link'] : '';	
$student_name = escape(isset($_POST['student_name'])) ?  $_POST['student_name'] : '';
$student_birth = escape(isset($_POST['student_birth'])) ?  $_POST['student_birth'] : '';
$student_age = escape(isset($_POST['student_age'])) ?  $_POST['student_age'] : '';
$student_birth_place = escape(isset($_POST['student_birth_place'])) ?  $_POST['student_birth_place'] : '';
$student_nationality = escape(isset($_POST['student_nationality'])) ?  $_POST['student_nationality'] : '';
$student_religion = escape(isset($_POST['student_religion'])) ?  $_POST['student_religion'] : '';
$student_gender = escape(isset($_POST['student_gender'])) ?  $_POST['student_gender'] : '';
$photo = escape(isset($_POST['photo'])) ?  $_POST['photo'] : '';
$student_pre_address = escape(isset($_POST['student_pre_address'])) ?  $_POST['student_pre_address'] : '';
$student_per_address = escape(isset($_POST['student_per_address'])) ?  $_POST['student_per_address'] : '';
$student_emmergency_cont_name = escape(isset($_POST['student_emmergency_cont_name'])) ?  $_POST['student_emmergency_cont_name'] : '';
$student_emmergency_cont_relation = escape(isset($_POST['student_emmergency_cont_relation'])) ?  $_POST['student_emmergency_cont_relation'] : '';
$student_emmergency_cont_number = escape(isset($_POST['student_emmergency_cont_number'])) ?  $_POST['student_emmergency_cont_number'] : '';
$student_father_name = escape(isset($_POST['student_father_name'])) ?  $_POST['student_father_name'] : '';
$student_mother_name = escape(isset($_POST['student_mother_name'])) ?  $_POST['student_mother_name'] : '';
$student_father_occupation = escape(isset($_POST['student_father_occupation'])) ?  $_POST['student_father_occupation'] : '';
$student_mother_occupation = escape(isset($_POST['student_mother_occupation'])) ?  $_POST['student_mother_occupation'] : '';
$student_father_education = escape(isset($_POST['student_father_education'])) ?  $_POST['student_father_education'] : '';
$student_mother_education = escape(isset($_POST['student_mother_education'])) ?  $_POST['student_mother_education'] : '';
$student_father_email = escape(isset($_POST['student_father_email'])) ?  $_POST['student_father_email'] : '';
$student_mother_email = escape(isset($_POST['student_mother_email'])) ?  $_POST['student_mother_email'] : '';
$student_home_number = escape(isset($_POST['student_home_number'])) ?  $_POST['student_home_number'] : '';
$student_father_number = escape(isset($_POST['student_father_number'])) ?  $_POST['student_father_number'] : '';
$student_mother_number = escape(isset($_POST['student_mother_number'])) ?  $_POST['student_mother_number'] : '';
$student_parents_image1 = escape(isset($_POST['student_parents_image1'])) ?  $_POST['student_parents_image1'] : '';
$student_parents_image2 = escape(isset($_POST['student_parents_image2'])) ?  $_POST['student_parents_image2'] : '';
$student_sibling_name1 = escape(isset($_POST['student_sibling_name1'])) ?  $_POST['student_sibling_name1'] : '';
$student_sibling_age1 = escape(isset($_POST['student_sibling_age1'])) ?  $_POST['student_sibling_age1'] : '';
$student_sibling_grade1 = escape(isset($_POST['student_sibling_grade1'])) ?  $_POST['student_sibling_grade1'] : '';
$student_sibling_currentschool1 = escape(isset($_POST['student_sibling_currentschool1'])) ?  $_POST['student_sibling_currentschool1'] : '';
$student_sibling_name2 = escape(isset($_POST['student_sibling_name2'])) ?  $_POST['student_sibling_name2'] : '';
$student_sibling_age2 = escape(isset($_POST['student_sibling_age2'])) ?  $_POST['student_sibling_age2'] : '';
$student_sibling_grade2 = escape(isset($_POST['student_sibling_grade2'])) ?  $_POST['student_sibling_grade2'] : '';
$student_sibling_currentschool2 = escape(isset($_POST['student_sibling_currentschool2'])) ?  $_POST['student_sibling_currentschool2'] : '';
$student_sibling_name3 = escape(isset($_POST['student_sibling_name3'])) ?  $_POST['student_sibling_name3'] : '';
$student_sibling_age3 = escape(isset($_POST['student_sibling_age3'])) ?  $_POST['student_sibling_age3'] : '';
$student_sibling_grade3 = escape(isset($_POST['student_sibling_grade3'])) ?  $_POST['student_sibling_grade3'] : '';
$student_sibling_currentschool3 = escape(isset($_POST['student_sibling_currentschool3'])) ?  $_POST['student_sibling_currentschool3'] : '';

$student_med_condition = escape(isset($_POST['student_med_condition'])) ?  $_POST['student_med_condition'] : '';
$student_blood_group = escape(isset($_POST['student_blood_group'])) ?  $_POST['student_blood_group'] : '';
$student_class = escape(isset($_POST['student_class'])) ?  $_POST['student_class'] : '';
$student_section = escape(isset($_POST['student_section'])) ?  $_POST['student_section'] : '';
$student_group = escape(isset($_POST['student_group'])) ?  $_POST['student_group'] : '';
$student_shift = escape(isset($_POST['student_shift'])) ?  $_POST['student_shift'] : '';
$optional_sub = escape(isset($_POST['optional_sub'])) ?  $_POST['optional_sub'] : '';
$student_session = escape(isset($_POST['student_session'])) ?  $_POST['student_session'] : '';
$student_class_roll = escape(isset($_POST['student_class_roll'])) ?  $_POST['student_class_roll'] : '';
$student_addmission_fee_aid = escape(isset($_POST['student_addmission_fee_aid'])) ?  $_POST['student_addmission_fee_aid'] : '';
$student_tution_fee_aid = escape(isset($_POST['student_tution_fee_aid'])) ?  $_POST['student_tution_fee_aid'] : '';
$student_note = escape(isset($_POST['student_note'])) ?  $_POST['student_note'] : '';
$testfile = escape(isset($_POST['testfile'])) ?  $_POST['testfile'] : '';

$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';



date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;


$output_dir = "../../images/student/".$photo;
$output_dir_thumbs = "../../images/student/thumbs/small".$photo;

$img = 'temp/thumbs/'.$photo;
$img_thumbs = 'temp/thumbs/small'.$photo;



if($temp == "Add"){
	$qry_having = mysql_query("SELECT * FROM `tbl_student_info` WHERE student_class='".$student_class."' AND student_section='".$student_section."' AND student_group='".$student_group."' AND student_shift='".$student_shift."' AND student_session='".$student_session."'AND student_class_roll='".$student_class_roll."'");
	if(mysql_num_rows($qry_having) == 0){
	
	
	
		$sql = "INSERT INTO `tbl_student_info`(`school_id`, `student_name`, `student_birth`, `student_age`, `student_birth_place`, `student_nationality`, `student_religion`, `student_gender`, `student_image`, `student_pre_address`, `student_per_address`, `student_emmergency_cont_name`, `student_emmergency_cont_relation`, `student_emmergency_cont_number`, `student_father_name`, `student_mother_name`, `student_father_occupation`, `student_mother_occupation`, `student_father_education`, `student_mother_education`, `student_father_email`, `student_mother_email`, `student_home_number`, `student_father_number`, `student_mother_number`, `student_parents_image1`, `student_parents_image2`, `student_sibling_name1`, `student_sibling_age1`, `student_sibling_grade1`, `student_sibling_currentschool1`, `student_sibling_name2`, `student_sibling_age2`, `student_sibling_grade2`, `student_sibling_currentschool2`, `student_sibling_name3`, `student_sibling_age3`, `student_sibling_grade3`, `student_sibling_currentschool3`, `student_med_condition`, `student_blood_group`, `student_class`, `student_section`, `student_group`, `student_shift`, `optional_sub`,  `student_session`, `student_class_roll`, `student_addmission_fee_aid`, `student_tution_fee_aid`, `student_note`, `testfile`, `created_on`) VALUES ('".$user_id."','".$student_name."','".dateConvert($student_birth)."','".$student_age."','".$student_birth_place."','".$student_nationality."','".$student_religion."','".$student_gender."','".$photo."','".$student_pre_address."','".$student_per_address."','".$student_emmergency_cont_name."','".$student_emmergency_cont_relation."','".$student_emmergency_cont_number."','".$student_father_name."','".$student_mother_name."','".$student_father_occupation."','".$student_mother_occupation."','".$student_father_education."','".$student_mother_education."','".$student_father_email."','".$student_mother_email."','".$student_home_number."','".$student_father_number."','".$student_mother_number."','".$student_parents_image1."','".$student_parents_image2."','".$student_sibling_name1."','".$student_sibling_age1."','".$student_sibling_grade1."','".$student_sibling_currentschool1."','".$student_sibling_name2."','".$student_sibling_age2."','".$student_sibling_grade2."','".$student_sibling_currentschool2."','".$student_sibling_name3."','".$student_sibling_age3."','".$student_sibling_grade3."','".$student_sibling_currentschool3."','".$student_med_condition."','".$student_blood_group."','".$student_class."','".$student_section."','".$student_group."','".$student_shift."','".$optional_sub."','".$student_session."','".$student_class_roll."','".$student_addmission_fee_aid."','".$student_tution_fee_aid."','".$student_note."', '".$testfile."', '".$datetime."')";
		$qry = mysql_query($sql) or die('Error in insertion : ' . mysql_error($sql));
			
		if ($qry){
			
			rename($img, $output_dir);
			rename($img_thumbs, $output_dir_thumbs);
		?>	
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button> Information added successfully.
            </div>
            <script>
                $(".form_success").hide();
                $(".form-group").slideUp();
                setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 3000);	
            </script>
    	<?php 	
		}else{
		?>	
            <div class="alert alert-danger">
                <button class="close" data-dismiss="alert"></button> Error Occured, Please try again.
            </div>
            <script>
                $("#idsubmitData").show();
            </script>
    	<?php  
		}
	
	}else{
	?>	
    	<div class="alert alert-danger">
            <button class="close" data-dismiss="alert"></button> This Roll number are Alredy In the list.
        </div>
		<script>
			$("#idsubmitData").show();
			$(".form_success").hide();		
		</script>
    <?php  
	}
	
}

if($temp == "Update"){
	
	$Editid = $_REQUEST['Editid'];
	
		$qry_category = mysql_query("SELECT * FROM `tbl_student_info` WHERE student_id='".$Editid."'") or die ("Error in Student selection : ".mysql_error());
	$rs_category = mysql_fetch_array($qry_category); 
			
			if($photo == ''){
				$sql_update="UPDATE `tbl_student_info` SET `student_name`='".$student_name."',
				`student_birth`='".dateConvert($student_birth)."',
				`student_age`='".$student_age."',
				`student_birth_place`='".$student_birth_place."',
				`student_nationality`='".$student_nationality."',
				`student_religion`='".$student_religion."',
				`student_gender`='".$student_gender."',
				`student_pre_address`='".$student_pre_address."',
				`student_per_address`='".$student_per_address."',
				`student_emmergency_cont_name`='".$student_emmergency_cont_name."',
				`student_emmergency_cont_relation`='".$student_emmergency_cont_relation."',
				`student_emmergency_cont_number`='".$student_emmergency_cont_number."',
				`student_father_name`='".$student_father_name."',
				`student_mother_name`='".$student_mother_name."',
				`student_father_occupation`='".$student_father_occupation."',
				`student_mother_occupation`='".$student_mother_occupation."',
				`student_father_education`='".$student_father_education."',
				`student_mother_education`='".$student_mother_education."',
				`student_father_email`='".$student_father_email."',
				`student_mother_email`='".$student_mother_email."',
				`student_home_number`='".$student_home_number."',
				`student_father_number`='".$student_father_number."',
				`student_mother_number`='".$student_mother_number."',
				`student_parents_image1`='".$student_parents_image1."',
				`student_parents_image2`='".$student_parents_image2."',
				`student_sibling_name1`='".$student_sibling_name1."',
				`student_sibling_age1`='".$student_sibling_age1."',
				`student_sibling_grade1`='".$student_sibling_grade1."',
				`student_sibling_currentschool1`='".$student_sibling_currentschool1."',
				`student_sibling_name2`='".$student_sibling_name2."',
				`student_sibling_age2`='".$student_sibling_age2."',
				`student_sibling_grade2`='".$student_sibling_grade2."',
				`student_sibling_currentschool2`='".$student_sibling_currentschool2."',
				`student_sibling_name3`='".$student_sibling_name3."',
				`student_sibling_age3`='".$student_sibling_age3."',
				`student_sibling_grade3`='".$student_sibling_grade3."',
				`student_sibling_currentschool3`='".$student_sibling_currentschool3."',
				
				`student_med_condition`='".$student_med_condition."',
				`student_blood_group`='".$student_blood_group."',
				`student_class`='".$student_class."',
				`student_section`='".$student_section."',
				`student_group`='".$student_group."',
				`student_shift`='".$student_shift."',
				`optional_sub`='".$optional_sub."',
				`student_session`='".$student_session."',
				`student_class_roll`='".$student_class_roll."',
				`student_addmission_fee_aid`='".$student_addmission_fee_aid."',
				`student_tution_fee_aid`='".$student_tution_fee_aid."',
				`testfile`='".$testfile."',
				`student_note`='".$student_note."' WHERE student_id='".$Editid."'";	
			}else{
				$sql_update="UPDATE `tbl_student_info` SET `student_name`='".$student_name."',
				`student_birth`='".dateConvert($student_birth)."',
				`student_age`='".$student_age."',
				`student_birth_place`='".$student_birth_place."',
				`student_nationality`='".$student_nationality."',
				`student_religion`='".$student_religion."',
				`student_gender`='".$student_gender."',
				`student_image`='".$photo."',
				`student_pre_address`='".$student_pre_address."',
				`student_per_address`='".$student_per_address."',
				`student_emmergency_cont_name`='".$student_emmergency_cont_name."',
				`student_emmergency_cont_relation`='".$student_emmergency_cont_relation."',
				`student_emmergency_cont_number`='".$student_emmergency_cont_number."',
				`student_father_name`='".$student_father_name."',
				`student_mother_name`='".$student_mother_name."',
				`student_father_occupation`='".$student_father_occupation."',
				`student_mother_occupation`='".$student_mother_occupation."',
				`student_father_education`='".$student_father_education."',
				`student_mother_education`='".$student_mother_education."',
				`student_father_email`='".$student_father_email."',
				`student_mother_email`='".$student_mother_email."',
				`student_home_number`='".$student_home_number."',
				`student_father_number`='".$student_father_number."',
				`student_mother_number`='".$student_mother_number."',
				`student_parents_image1`='".$student_parents_image1."',
				`student_parents_image2`='".$student_parents_image2."',
				`student_sibling_name1`='".$student_sibling_name1."',
				`student_sibling_age1`='".$student_sibling_age1."',
				`student_sibling_grade1`='".$student_sibling_grade1."',
				`student_sibling_currentschool1`='".$student_sibling_currentschool1."',
				`student_sibling_name2`='".$student_sibling_name2."',
				`student_sibling_age2`='".$student_sibling_age2."',
				`student_sibling_grade2`='".$student_sibling_grade2."',
				`student_sibling_currentschool2`='".$student_sibling_currentschool2."',
				`student_sibling_name3`='".$student_sibling_name3."',
				`student_sibling_age3`='".$student_sibling_age3."',
				`student_sibling_grade3`='".$student_sibling_grade3."',
				`student_sibling_currentschool3`='".$student_sibling_currentschool3."',
				
				`student_med_condition`='".$student_med_condition."',
				`student_blood_group`='".$student_blood_group."',
				`student_class`='".$student_class."',
				`student_section`='".$student_section."',
				`student_group`='".$student_group."',
				`student_shift`='".$student_shift."',
				`optional_sub`='".$optional_sub."',
				`student_session`='".$student_session."',
				`student_class_roll`='".$student_class_roll."',
				`student_addmission_fee_aid`='".$student_addmission_fee_aid."',
				`student_tution_fee_aid`='".$student_tution_fee_aid."',
				`testfile`='".$testfile."',
				`student_note`='".$student_note."' WHERE student_id='".$Editid."'";
				
					
				rename($img, $output_dir);
				rename($img_thumbs, $output_dir_thumbs);
				
				$db_photo = $rs_category['student_image'];
				$path1 = '../../images/student/'.$db_photo;
				$path2 = '../../images/student/thumbs/small'.$db_photo;
				if(file_exists($path1) == true && $db_photo != "") unlink($path1);
				if(file_exists($path2) == true && $db_photo != "") unlink($path2);	

			}
			
			
			$rs_update=mysql_query($sql_update) or die ("Error in update : ".mysql_error());
			if($rs_update){
			?>
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert"></button> Information updated successfully.
				</div>
				<script>
					jQuery(".form_success").hide();
					jQuery(".form-group").slideUp();
					setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 3000);	
				</script> 
			<?php
			}else{
			?>
				<div class="alert alert-danger">
					<button class="close" data-dismiss="alert"></button> Update failed with an error.
				</div>
				<script>
					jQuery(".form_success").hide();
					jQuery("#idsubmitData").show();
				</script> 
			<?php	
			}
				
}
?>