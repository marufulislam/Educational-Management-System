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
$old_password = escape(isset($_POST['old_password'])) ?  $_POST['old_password'] : '';
$new_password = escape(isset($_POST['new_password'])) ?  $_POST['new_password'] : '';

if($temp == "change"){
	
	$old_password = md5($old_password);
	$new_password = md5($new_password);
	$userid = $_SESSION['login'];
	
	$qry_having = mysql_query("SELECT * FROM `user_admin` WHERE password='".$old_password."' AND `userid`='".$userid."';");
	if(mysql_num_rows($qry_having) > 0){
	
		$sql = "UPDATE `user_admin` SET `password`='".$new_password."' WHERE `userid`='".$userid."'";
		$qry = mysql_query($sql) or die('Error in updating password : ' . mysql_error($sql));
		
		if ($qry){
		?>	
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button> Information added successfully.
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
                <button class="close" data-dismiss="alert"></button> Error Occured, Please try again.
            </div>
            <script>
                jQuery("#idsubmitData").show();
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
			jQuery("#idsubmitData").show();
			jQuery(".form_success").hide();		
		</script>
    <?php  
	}
	
}