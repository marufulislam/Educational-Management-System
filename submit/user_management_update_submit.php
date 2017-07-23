<?php
require_once('../include/connect.php');
require_once('../include/view.php');


if(isset($_REQUEST['temp']) == false){
	$temp = "";
}
else if(isset($_REQUEST['temp']) == true){
	$temp = $_REQUEST['temp'];
}	
	
$fullname = escape(isset($_POST['fullname'])) ?  $_POST['fullname'] : '';
$usr = escape(isset($_POST['usr'])) ?  $_POST['usr'] : '';
$mobile = escape(isset($_POST['mobile'])) ?  $_POST['mobile'] : '';
$address = escape(isset($_POST['address'])) ?  $_POST['address'] : '';
$dob = escape(isset($_POST['dob'])) ?  $_POST['dob'] : '';
$avatar = escape(isset($_POST['photo'])) ?  $_POST['photo'] : '';

$output_dir = "../img/avatar/".$avatar;
$output_dir_thumbs = "../img/avatar/thumbs/small".$avatar;

$img = 'temp/thumbs/'.$avatar;
$img_thumbs = 'temp/thumbs/small'.$avatar;



if($temp=="Update"){
	$Editid = $_SESSION["com_cbs_aaiam_lschool_maruf_loggedin_user_id"];
	
	$qry_ = mysql_query("SELECT * FROM `user_admin` WHERE userid='".$Editid."'") or die ("Error : ".mysql_error());
	$rs_ = mysql_fetch_array($qry_); 
	
	$db_photo = $rs_['avatar'];
	
	
	if($avatar == ''){
	
	$sql_update="UPDATE user_admin SET username='$fullname',usr_code='$usr',mobile='$mobile',address='$address', dob='$dob' WHERE userid='$Editid'";	
	}else{
	$sql_update="UPDATE user_admin SET username='$fullname',usr_code='$usr',mobile='$mobile',address='$address', dob='$dob',avatar='$avatar' WHERE userid='$Editid'";	
				
				$path1 = '../img/avatar/'.$db_photo;
				$path2 = '../img/avatar/thumbs/small'.$db_photo;
				if(file_exists($path1) == true && $db_photo != "") unlink($path1);
				if(file_exists($path2) == true && $db_photo != "") unlink($path2);	
				
				rename($img, $output_dir);
				rename($img_thumbs, $output_dir_thumbs);
		
	}
	$rs_update = mysql_query($sql_update) or die("Error in update user ".mysql_error);
	if($rs_update){
	?>	
    	<div class="alert alert-success">
            <button class="close" data-dismiss="alert"></button> User updated successfully.
        </div>
		<script>
			$(".form_success").hide();
			$(".form-group").slideUp();
			setTimeout(function(){ window.location = '<?php echo urlroute('profile');?>'; }, 3000);	
		</script>
    <?php   
	}
}



?>

