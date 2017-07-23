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
$teacher_id = escape(isset($_POST['teacher_id'])) ?  $_POST['teacher_id'] : '';
$salary = escape(isset($_POST['salary'])) ?  $_POST['salary'] : '';
$month_name = escape(isset($_POST['month_name'])) ?  $_POST['month_name'] : '';
$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';

$status = 1;
date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;

if($temp == "Add"){
	
	
	
		$sql = "INSERT INTO `tbl_teacher_pay`(`school_id`, `teacher_id`, `salary`, `month_name`, `status`, `created_on`) VALUES ('".$user_id."','".$teacher_id."','".$salary."','".$month_name."','".$status."','".$datetime."')";
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
	$sql_delete="DELETE FROM tbl_teacher_pay WHERE tbl_teacher_pay_id='".$Editid."'";
	$rs_delete=mysql_query($sql_delete); 
	
	
		$sql = "INSERT INTO `tbl_teacher_pay`(`tbl_teacher_pay_id`, `school_id`, `teacher_id`, `salary`, `month_name`, `status`, `created_on`) VALUES ('".$Editid."', '".$user_id."','".$teacher_id."','".$salary."','".$month_name."','".$status."','".$datetime."')";
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
?>