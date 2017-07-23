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
$class_id = escape(isset($_POST['class_id'])) ?  $_POST['class_id'] : '';
$sec_id = escape(isset($_POST['sec_id'])) ?  $_POST['sec_id'] : '';
$shift_id = escape(isset($_POST['shift_id'])) ?  $_POST['shift_id'] : '';
$group_id = escape(isset($_POST['group_id'])) ?  $_POST['group_id'] : '';
$student_id = escape(isset($_POST['student_id'])) ?  $_POST['student_id'] : '';
$subject_id = escape(isset($_POST['subject_id'])) ?  $_POST['subject_id'] : '';
$subject_name = escape(isset($_POST['subject_name'])) ?  $_POST['subject_name'] : '';
$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';
$optionsRadios1 = escape(isset($_POST['optionsRadios1'])) ?  $_POST['optionsRadios1'] : '';

//print_r($_POST);
//exit();

if($optionsRadios1 == 1){
	
	
	
	$qry_having = mysql_query("SELECT * FROM `student_sub_assign` WHERE student_id='".$student_id."' AND class_id='".$class_id."' AND sec_id='".$sec_id."' AND shift_id='".$shift_id."' AND group_id='".$group_id."' AND subject_id='".$subject_name."'");
	if(mysql_num_rows($qry_having) == 0){
	
		$sql = "INSERT INTO `student_sub_assign`(`school_id`, `student_id`, `class_id`, `sec_id`, `shift_id`, `group_id`, `subject_id`) VALUES ('".$user_id."','".$student_id."','".$class_id."','".$sec_id."','".$shift_id."','".$group_id."','".$subject_name."')";
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
	else{
	?>	
    	<div class="alert alert-danger">
            <button class="close" data-dismiss="alert"></button> Alredy In the list.
        </div>
		<script>
			$("#idsubmitData").show();
			$(".form_success").hide();		
		</script>
    <?php  
	}
	

	}
else{


	$qry_having_grp = mysql_query("SELECT * FROM `student_sub_assign` WHERE `student_id` = '".$student_id."' AND `class_id` = '".$class_id."' AND `sec_id` = '".$sec_id."' AND `shift_id` = '".$shift_id."' AND `group_id` = '".$group_id."'");
	
	if(mysql_num_rows($qry_having_grp) > 0){
	$sql_delete="DELETE FROM student_sub_assign WHERE student_id='".$student_id."'";
	$rs_delete=mysql_query($sql_delete);
	
	$show = 0;
foreach($_POST['subject_id'] as $sk => $sv){
	$sql_grp = "INSERT INTO `student_sub_assign`(`school_id`,`student_id`, `class_id`, `sec_id`, `shift_id`, `group_id`, `subject_id`) VALUES ('".$user_id."','".$student_id."','".$class_id."','".$sec_id."','".$shift_id."','".$group_id."','".$sv."')";
			
			$qry_grp = mysql_query($sql_grp) or die("ERROR in marks Insertion :".mysql_error());
		
		if($qry_grp){
		$show++;	
		}
	 }	
		
		}else{
				$show = 0;
foreach($_POST['subject_id'] as $sk => $sv){
	$sql_grp = "INSERT INTO `student_sub_assign`(`school_id`,`student_id`, `class_id`, `sec_id`, `shift_id`, `group_id`, `subject_id`) VALUES ('".$user_id."','".$student_id."','".$class_id."','".$sec_id."','".$shift_id."','".$group_id."','".$sv."')";
			
			$qry_grp = mysql_query($sql_grp) or die("ERROR in marks Insertion :".mysql_error());
		
		if($qry_grp){
		$show++;	
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
		}}
			
?>



