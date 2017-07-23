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
$day = escape(isset($_POST['day'])) ?  $_POST['day'] : '';
$status = escape(isset($_POST['status'])) ?  $_POST['status'] : '';



date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;


if($temp == "Update"){
	
	$Editid = $_REQUEST['Editid'];
	$sql_delete="DELETE FROM tbl_weeks WHERE id='".$Editid."'";
	$rs_delete=mysql_query($sql_delete);
	
	
	
	
	
		$sql = "INSERT INTO `tbl_weeks`(`id`, `day`, `status`, `created_at`) VALUES ('$Editid', '".$day."','".$status."','".$datetime."')";
		$qry = mysql_query($sql) or die('Error in insertion : ' . mysql_error($sql));
		
		if ($qry){

		?>	
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button> Information Updated successfully.
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