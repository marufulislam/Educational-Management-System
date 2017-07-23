<?php
require_once('../include/connect.php');
require_once('../include/view.php');


if(isset($_REQUEST['temp']) == false){
	$temp = "";
}
else if(isset($_REQUEST['temp']) == true){
	$temp = $_REQUEST['temp'];
}	
	
$fullname = escape(isset($_POST['name'])) ?  $_POST['name'] : '';
$email = escape(isset($_POST['email'])) ?  $_POST['email'] : '';
$role = escape(isset($_POST['role'])) ?  $_POST['role'] : '';
$password = escape(isset($_POST['password'])) ?  $_POST['password'] : '';
$hid_den = escape(isset($_POST['hid_den'])) ?  $_POST['hid_den'] : '';



if($temp=="Add"){
	$sql="INSERT INTO `user_admin`(`username`, `usr_code`, `role`, `password`, `userdate`)  VALUES ('$fullname','$email','$role','".md5($password)."','$cur_date');";
	$rs = mysql_query($sql) or die (mysql_error()); 
	
	$sql_userid = "SELECT userid FROM user_admin WHERE usr_code='".$email."'";
	$qry_userid = mysql_query($sql_userid);
	$rs_userid = mysql_fetch_array($qry_userid); 
	$userid = $rs_userid['userid'];
	
	$i=0;
	while($i<$hid_den){
		
		$sd="sel".$i;
		$sd1="chbk".$i;
		if(array_key_exists($sd,$_REQUEST)){
				
			$uacs = $_REQUEST[$sd];
			$uacs1=$_REQUEST[$sd1];
		
			$sql="INSERT INTO t_user_module (userid ,moduleid,accesslevel) VALUES ('$userid','$uacs1','$uacs');";
			$qry = mysql_query($sql) or die(mysql_error);
		}
		$i++;
	}	
	if($rs){
	?>	
    	<div class="alert alert-success">
            <button class="close" data-dismiss="alert"></button> User Created successfully.
        </div>
		<script>
			$(".form_success").hide();
			$(".form-group").slideUp();
			setTimeout(function(){ window.location = '<?php echo urlroute('user_management');?>'; }, 3000);	
		</script>
    <?php    
	}
}

if($temp=="Update"){
	$Editid = $_REQUEST['Editid'];
	$sql="DELETE FROM t_user_module WHERE userid='$Editid'";
	mysql_query($sql);
	$i=0;
	while($i<$hid_den){
		$sd="sel".$i;
		$sd1="chbk".$i;
		if(array_key_exists($sd,$_REQUEST)){
			$uacs = $_REQUEST[$sd];
			$uacs1=$_REQUEST[$sd1];	
			$sql="INSERT INTO t_user_module (userid , moduleid, accesslevel) VALUES ('$Editid','$uacs1','$uacs');";
			mysql_query($sql) or die("Error in update module ".mysql_error);;; //or die(mysql_error());
		}
		$i++;
	}
	$sql_update="UPDATE user_admin SET username='$fullname', role='$role' WHERE userid='$Editid';";	
	$rs_update = mysql_query($sql_update) or die("Error in update user ".mysql_error);
	if($rs_update){
	?>	
    	<div class="alert alert-success">
            <button class="close" data-dismiss="alert"></button> User updated successfully.
        </div>
		<script>
			$(".form_success").hide();
			$(".form-group").slideUp();
			setTimeout(function(){ window.location = '<?php echo urlroute('user_management');?>'; }, 3000);	
		</script>
    <?php   
	}
}



?>

