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
	
$shift_name = escape(isset($_POST['shift_name'])) ?  $_POST['shift_name'] : '';
$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';
$status = 1;

date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;



if($temp == "Add"){
	
	$qry_having = mysql_query("SELECT * FROM `tbl_shift` WHERE shift_name='".$shift_name."'");
	if(mysql_num_rows($qry_having) == 0){
	
		$sql = "INSERT INTO `tbl_shift`(`shift_name`, `school_id`, `status`, `created_on`) VALUES ('".$shift_name."', '".$user_id."', '".$status."', '".$datetime."')";
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

if($temp == "Update"){
	
	$Editid = $_REQUEST['Editid'];
	$sql_delete="DELETE FROM tbl_shift WHERE shift_id='".$Editid."'";
	$rs_delete=mysql_query($sql_delete); 
	
	
	
		$sql = "INSERT INTO `tbl_shift`(`shift_name`, `school_id`, `status`, `created_on`) VALUES ('$Editid', '".$shift_name."', '".$user_id."', '".$status."', '".$datetime."')";
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