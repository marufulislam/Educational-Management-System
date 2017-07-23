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
$class_name = escape(isset($_POST['class_name'])) ?  $_POST['class_name'] : '';
$section_name = escape(isset($_POST['section_name'])) ?  $_POST['section_name'] : '';
$student_shift = escape(isset($_POST['student_shift'])) ?  $_POST['student_shift'] : '';

$day = escape(isset($_POST['day'])) ?  $_POST['day'] : '';
$start_time = escape(isset($_POST['start_time'])) ?  $_POST['start_time'] : '';
$end_time = escape(isset($_POST['end_time'])) ?  $_POST['end_time'] : '';
$teacher_name = escape(isset($_POST['teacher_name'])) ?  $_POST['teacher_name'] : '';
$subject = escape(isset($_POST['subject'])) ?  $_POST['subject'] : '';
$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';

date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;


if($temp == "Add"){
	
	
		$sql = "INSERT INTO `teachers_routine`(`school_id`, `class_id`, `section_id`, `shift_id`, `day`, `start_time`, `end_time`, `subject_id`, `teacher_id`, `created_at`) VALUES ('".$user_id."','".$class_name."','".$section_name."','".$student_shift."','".$day."','".$start_time."','".$end_time."','".$subject."','".$teacher_name."','".$datetime."')";
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
	$sql_delete="DELETE FROM teachers_routine WHERE id='".$Editid."'";
	$rs_delete=mysql_query($sql_delete); 
	
	
	
	
		$sql = "INSERT INTO `teachers_routine`(`school_id`, `class_id`, `section_id`, `shift_id`, `day`, `start_time`, `end_time`, `subject_id`, `teacher_id`, `created_at`) VALUES ('".$user_id."','".$class_name."','".$section_name."','".$student_shift."','".$day."','".$start_time."','".$end_time."','".$subject."','".$teacher_name."','".$datetime."')";
		$qry = mysql_query($sql) or die('Error in insertion : ' . mysql_error($sql));
		
		if ($qry){
		?>	
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button> Information Update successfully.
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

?>