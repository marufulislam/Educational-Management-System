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
$slide_caption = escape(isset($_POST['slide_caption'])) ?  $_POST['slide_caption'] : '';
$photo = escape(isset($_POST['photo'])) ?  $_POST['photo'] : '';
$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';
$status = 1;


date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;


$output_dir = "../../images/slide/".$photo;
$output_dir_thumbs = "../../images/slide/thumbs/small".$photo;

$img = 'temp/thumbs/'.$photo;
$img_thumbs = 'temp/thumbs/small'.$photo;


if($temp == "Add"){
	
	
	
		$sql = "INSERT INTO `tbl_slide_image`(`school_id`, `slide_image_name`, `slide_caption`, `status`, `created_on`) VALUES ('".$user_id."','".$photo."','".$slide_caption."','".$status."','".$datetime."')";
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
		
	
	
}

if($temp == "Update"){
	
	$Editid = $_REQUEST['Editid'];
	
		$qry_category = mysql_query("SELECT * FROM `tbl_slide_image` WHERE slide_image_id='".$Editid."'") or die ("Error in Student selection : ".mysql_error());
	$rs_category = mysql_fetch_array($qry_category); 
			
			if($photo == ''){
				$sql_update="UPDATE `tbl_slide_image` SET `slide_caption`='".$slide_caption."' WHERE slide_image_id='".$Editid."'";	
			}else{
				$sql_update="UPDATE `tbl_slide_image` SET `slide_image_name`='".$photo."',`slide_caption`='".$slide_caption."'
                 WHERE slide_image_id='".$Editid."'";
				
					
				rename($img, $output_dir);
				rename($img_thumbs, $output_dir_thumbs);
				
				$db_photo = $rs_category['slide_image_name'];
				$path1 = '../../images/slide/'.$db_photo;
				$path2 = '../../images/slide/thumbs/small'.$db_photo;
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