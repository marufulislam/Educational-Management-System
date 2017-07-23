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
$subject_name = escape(isset($_POST['subject_name'])) ?  $_POST['subject_name'] : '';
$subject_code = escape(isset($_POST['subject_code'])) ?  $_POST['subject_code'] : '';

$pass_marks_under = escape(isset($_POST['pass_marks_under'])) ?  $_POST['pass_marks_under'] : '';
$cr_pass_marks = escape(isset($_POST['cr_pass_marks'])) ?  $_POST['cr_pass_marks'] : '';
$ob_pass_marks = escape(isset($_POST['ob_pass_marks'])) ?  $_POST['ob_pass_marks'] : '';


$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';
$status = 1;

date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;



if($temp == "Update"){
	
	$Editid = $_REQUEST['Editid'];
	$sql_delete="DELETE FROM tbl_subject WHERE subject_id='".$Editid."'";
	$rs_delete=mysql_query($sql_delete); 
    
	
	
	
		$sql = "INSERT INTO `tbl_subject`(`subject_id`, `school_id`, `class_id`, `subject_name`,`subject_code`,`pass_marks_under`, `cr_pass_marks`, `ob_pass_marks`, `status`, `created_on`) VALUES ('$Editid','".$user_id."','".$class_id."','".$subject_name."', '".$subject_code."', '".$pass_marks_under."', '".$cr_pass_marks."', '".$ob_pass_marks."', '".$status."', '".$datetime."')";
		$qry = mysql_query($sql) or die('Error in insertion : ' . mysql_error($sql));
		
		if ($qry){
		?>	
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button> Information Updated successfully.
            </div>
            <script>
                $(".form_success").hide();
                $(".form-group").slideUp();
                setTimeout(function(){ window.location = '<?php echo urlroute('subject_assign');?>'; }, 1000);	
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