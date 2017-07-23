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
$catagory_id = escape(isset($_POST['catagory_id'])) ?  $_POST['catagory_id'] : '';
$photo_caption = escape(isset($_POST['photo_caption'])) ?  $_POST['photo_caption'] : '';
$photo = escape(isset($_POST['photo'])) ?  $_POST['photo'] : '';
$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';
$status = 1;


date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;


$output_dir = "../../images/school_photo/".$photo;
$output_dir_thumbs = "../../images/school_photo/thumbs/small".$photo;

$img = 'temp/thumbs/'.$photo;
$img_thumbs = 'temp/thumbs/small'.$photo;


if($temp == "Add"){
	
	
	
		$sql = "INSERT INTO `tbl_photo_gallery`(`school_id`, `photo_caption`, `catagory_id`, `gallery_image_name`, `status`, `created_on`) VALUES ('".$user_id."','".$photo_caption."','".$catagory_id."','".$photo."','".$status."','".$datetime."')";
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
	
		$qry_category = mysql_query("SELECT * FROM `tbl_photo_gallery` WHERE photo_gallery_id='".$Editid."'") or die ("Error in Student selection : ".mysql_error());
	$rs_category = mysql_fetch_array($qry_category); 
			
			if($photo == ''){
				$sql_update="UPDATE `tbl_photo_gallery` SET `photo_caption`='".$photo_caption."', `catagory_id`='".$catagory_id."' WHERE photo_gallery_id='".$Editid."'";	
			}else{
				$sql_update="UPDATE `tbl_photo_gallery` SET `photo_caption`='".$photo_caption."', `catagory_id`='".$catagory_id."',`gallery_image_name`='".$photo."' WHERE about_id='".$Editid."'";
				
					
				rename($img, $output_dir);
				rename($img_thumbs, $output_dir_thumbs);
				
				$db_photo = $rs_category['gallery_image_name'];
				$path1 = '../../images/school_photo/'.$db_photo;
				$path2 = '../../images/school_photo/thumbs/small'.$db_photo;
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