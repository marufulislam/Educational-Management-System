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
$notice_type = escape(isset($_POST['notice_type'])) ?  $_POST['notice_type'] : '';
$notice_heading = escape(isset($_POST['notice_heading'])) ?  $_POST['notice_heading'] : '';
$notice_details = escape(isset($_POST['notice_details'])) ?  $_POST['notice_details'] : '';
$publish_date = escape(isset($_POST['publish_date'])) ?  $_POST['publish_date'] : '';
$upFile = escape(isset($_POST['upFile'])) ?  $_POST['upFile'] : '';
$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';
$status = 1;

date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;

$output_dir_video = "../../file/notice/".$upFile;
$video = 'temp/file/'.$upFile;

if($temp == "Add"){
	
	
	
		$sql = "INSERT INTO `tbl_notice`(`school_id`, `notice_type`, `notice_heading`, `notice_details`, `publish_date`, `notice_attachment`, `status`, `created_on`) VALUES ('".$user_id."','".$notice_type."','".$notice_heading."','".$notice_details."','".$publish_date."','".$upFile."','".$status."','".$datetime."')";
		$qry = mysql_query($sql) or die('Error in insertion : ' . mysql_error($sql));
		
		if ($qry){
			rename($video, $output_dir_video);

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
	
		$qry_category = mysql_query("SELECT * FROM `tbl_notice` WHERE notice_id='".$Editid."'") or die ("Error in Student selection : ".mysql_error());
	$rs_category = mysql_fetch_array($qry_category); 
			
			if($upFile == ''){
				$sql_update="UPDATE `tbl_notice` SET 
				`notice_type`='".$notice_type."',
				`notice_heading`='".$notice_heading."',
				`notice_details`='".$notice_details."', WHERE notice_id='".$Editid."'";	
			}else{
				$sql_update="UPDATE `tbl_notice` SET 
				`notice_type`='".$notice_type."',
				`notice_heading`='".$notice_heading."',
				`notice_details`='".$notice_details."',
				`notice_attachment`='".$upFile."' WHERE notice_id='".$Editid."'";
				
					
				rename($video, $output_dir_video);
			
			$db_file = $rs_category['notice_attachment'];
			$path1 = '../../file/notice/'.$db_file;
			if(file_exists($path1) == true && $db_file != "") unlink($path1);

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