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
$subject_id = escape(isset($_POST['subject_id'])) ?  $_POST['subject_id'] : '';	
$grade_from = escape(isset($_POST['grade_from'])) ?  $_POST['grade_from'] : '';
$grade_to = escape(isset($_POST['grade_to'])) ?  $_POST['grade_to'] : '';
$grade = escape(isset($_POST['grade'])) ?  $_POST['grade'] : '';
$gpa = escape(isset($_POST['gpa_'])) ?  $_POST['gpa_'] : '';
$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';
$status = 1;

date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;



if($temp == "Update"){
	 
	$Editid = $_REQUEST['Editid'];
	$sql_delete="DELETE FROM tbl_grade_assign WHERE grade_assign_id='".$Editid."'";
	$rs_delete=mysql_query($sql_delete);
	

	
	
	
		$sql = "INSERT INTO `tbl_grade_assign`(`grade_assign_id`, `school_id`, `class_id`, `subject_id`, `grade_from`, `grade_to`, `grade`, `gpa`, `status`, `datetime`) VALUES ('$Editid','".$user_id."','".$class_id."','".$subject_id."','".$grade_from."','".$grade_to."','".$grade."','".$gpa."','".$status."','".$datetime."')";
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