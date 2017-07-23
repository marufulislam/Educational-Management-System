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
$basic_salary = escape(isset($_POST['basic_salary'])) ?  $_POST['basic_salary'] : '';
$house_rent = escape(isset($_POST['house_rent'])) ?  $_POST['house_rent'] : '';
$medical = escape(isset($_POST['medical'])) ?  $_POST['medical'] : '';
$bonus = escape(isset($_POST['bonus'])) ?  $_POST['bonus'] : '';
$others = escape(isset($_POST['others'])) ?  $_POST['others'] : '';
$total = escape(isset($_POST['total'])) ?  $_POST['total'] : '';
$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';
$status = 1;

date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;

if($temp == "Add"){
	
	
	
		$sql = "INSERT INTO `tbl_teacher_salary`(`school_id`, `teacher_id`, `basic_salary`, `house_rent`, `medical`, `bonus`, `others`, `total`, `status`, `created_on`) VALUES ('".$user_id."','".$teacher_id."','".$basic_salary."','".$house_rent."','".$medical."','".$bonus."','".$others."','".$total."','".$status."','".$datetime."')";
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
	
			$sql_update="UPDATE tbl_teacher_salary SET teacher_id='".$teacher_id."',basic_salary='".$basic_salary."',house_rent='".$house_rent."',medical='".$medical."',bonus='".$bonus."',others='".$others."',total='".$total."' WHERE teacher_salary_id='".$Editid."'";	
			$rs_update=mysql_query($sql_update) or die ("Error in update : ".mysql_error());
			if($rs_update){
			?>
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert"></button> Information updated successfully.
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
					<button class="close" data-dismiss="alert"></button> Update failed with an error.
				</div>
				<script>
					$(".form_success").hide();
					$("#idsubmitData").show();
				</script> 
			<?php	
			}
		
		

	?>	

    <?php  

	
			
}
?>