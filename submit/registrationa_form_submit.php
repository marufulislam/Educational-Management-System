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
$teacher_name = escape(isset($_POST['teacher_name'])) ?  $_POST['teacher_name'] : '';
$husband_name = escape(isset($_POST['husband_name'])) ?  $_POST['husband_name'] : '';
$father_name = escape(isset($_POST['father_name'])) ?  $_POST['father_name'] : '';
$mother_name = escape(isset($_POST['mother_name'])) ?  $_POST['mother_name'] : '';
$birth_date = escape(isset($_POST['birth_date'])) ?  $_POST['birth_date'] : '';
$gender = escape(isset($_POST['gender'])) ?  $_POST['gender'] : '';
$marital_status = escape(isset($_POST['marital_status'])) ?  $_POST['marital_status'] : '';
$permanent_address = escape(isset($_POST['permanent_address'])) ?  $_POST['permanent_address'] : '';
$permanent_thana = escape(isset($_POST['permanent_thana'])) ?  $_POST['permanent_thana'] : '';
$permanent_district = escape(isset($_POST['permanent_district'])) ?  $_POST['permanent_district'] : '';
$present_address = escape(isset($_POST['present_address'])) ?  $_POST['present_address'] : '';
$present_thana = escape(isset($_POST['present_thana'])) ?  $_POST['present_thana'] : '';
$present_district = escape(isset($_POST['present_district'])) ?  $_POST['present_district'] : '';
$account_number = escape(isset($_POST['account_number'])) ?  $_POST['account_number'] : '';
$religion = escape(isset($_POST['religion'])) ?  $_POST['religion'] : '';
$nationality = escape(isset($_POST['nationality'])) ?  $_POST['nationality'] : '';
$national_id_card_no = escape(isset($_POST['national_id_card_no'])) ?  $_POST['national_id_card_no'] : '';
$blood_group = escape(isset($_POST['blood_group'])) ?  $_POST['blood_group'] : '';
$email = escape(isset($_POST['email'])) ?  $_POST['email'] : '';
$department_id = escape(isset($_POST['department_id'])) ?  $_POST['department_id'] : '';
$designation_id = escape(isset($_POST['designation_id'])) ?  $_POST['designation_id'] : '';
$joining_date = escape(isset($_POST['joining_date'])) ?  $_POST['joining_date'] : '';
$present_contact = escape(isset($_POST['present_contact'])) ?  $_POST['present_contact'] : '';
$photo = escape(isset($_POST['photo'])) ?  $_POST['photo'] : '';
$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';
$status = 1;

date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;

$output_dir = "../../images/teacher_staff/".$photo;
$output_dir_thumbs = "../../images/teacher_staff/thumbs/small".$photo;

$img = 'temp/thumbs/'.$photo;
$img_thumbs = 'temp/thumbs/small'.$photo;


if($temp == "Add"){
	
	
	
		$sql = "INSERT INTO `tbl_teacher_registration`(`school_id`, `status`, `created_on`, `teacher_name`, `father_name`, `husband_name`, `mother_name`, `birth_date`, `gender`, `marital_status`, `permanent_address`, `permanent_district`, `permanent_thana`, `permanent_contact`, `present_address`, `present_district`, `present_thana`, `present_contact`, `account_number`, `religion`, `nationality`, `national_id_card_no`, `blood_group`, `email`, `department_id`, `designation_id`, `joining_date`, `teacher_image`, `archive`) VALUES ('".$user_id."','".$status."','".$datetime."','".$teacher_name."','".$father_name."','".$husband_name."','".$mother_name."','".$birth_date."','".$gender."','".$marital_status."','".$permanent_address."','".$permanent_district."','".$permanent_thana."','','".$present_address."','".$present_district."','".$present_thana."','".$present_contact."','".$account_number."','".$religion."','".$nationality."','".$national_id_card_no."','".$blood_group."','".$email."','".$department_id."','".$designation_id."','".$joining_date."','".$photo."','')";
		$qry = mysql_query($sql) or die('Error in insertion : ' . mysql_error($sql));
		
		if ($qry){
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
		
	

	
}

if($temp == "Update"){
	
	$Editid = $_REQUEST['Editid'];
	
		$qry_category = mysql_query("SELECT * FROM `tbl_teacher_registration` WHERE teacher_id='".$Editid."'") or die ("Error in Student selection : ".mysql_error());
	$rs_category = mysql_fetch_array($qry_category); 
			
			if($photo == ''){
				$sql_update="UPDATE `tbl_teacher_registration` SET `teacher_name`='".$teacher_name."',
				`father_name`='".$father_name."',
				`husband_name`='".$husband_name."',
				`mother_name`='".$mother_name."',
				`birth_date`='".$birth_date."',
				`gender`='".$gender."',
				`marital_status`='".$marital_status."',
				`permanent_address`='".$permanent_address."',
				`permanent_district`='".$permanent_district."',
				`permanent_thana`='".$permanent_thana."',
				`present_address`='".$present_address."',
				`present_district`='".$present_district."',
				`present_thana`='".$present_thana."',
				`present_contact`='".$present_contact."',
				`account_number`='".$account_number."',
				`religion`='".$religion."',
				`nationality`='".$nationality."',
				`national_id_card_no`='".$national_id_card_no."',
				`blood_group`='".$blood_group."',
				`email`='".$email."',
				`department_id`='".$department_id."',
				`designation_id`='".$designation_id."',
				`joining_date`='".$joining_date."' WHERE teacher_id='".$Editid."'";	
			}else{
				$sql_update="UPDATE `tbl_teacher_registration` SET `teacher_name`='".$teacher_name."',
				`father_name`='".$father_name."',
				`husband_name`='".$husband_name."',
				`mother_name`='".$mother_name."',
				`birth_date`='".$birth_date."',
				`gender`='".$gender."',
				`marital_status`='".$marital_status."',
				`permanent_address`='".$permanent_address."',
				`permanent_district`='".$permanent_district."',
				`permanent_thana`='".$permanent_thana."',
				`present_address`='".$present_address."',
				`present_district`='".$present_district."',
				`present_thana`='".$present_thana."',
				`present_contact`='".$present_contact."',
				`account_number`='".$account_number."',
				`religion`='".$religion."',
				`nationality`='".$nationality."',
				`national_id_card_no`='".$national_id_card_no."',
				`blood_group`='".$blood_group."',
				`email`='".$email."',
				`department_id`='".$department_id."',
				`designation_id`='".$designation_id."',
				`joining_date`='".$joining_date."',
			    `teacher_image`='".$photo."' WHERE teacher_id='".$Editid."'";
				
					
				rename($img, $output_dir);
				rename($img_thumbs, $output_dir_thumbs);
				
				$db_photo = $rs_category['teacher_image'];
				$path1 = '../../images/teacher_staff/'.$db_photo;
				$path2 = '../../images/teacher_staff/thumbs/small'.$db_photo;
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
					//setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 3000);	
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