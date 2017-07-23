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
$class_id = escape(isset($_POST['class_id'])) ?  $_POST['class_id'] : '';
$section_id = escape(isset($_POST['section_id'])) ?  $_POST['section_id'] : '';
$teacher_id = escape(isset($_POST['teacher_id'])) ?  $_POST['teacher_id'] : '';
$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';


if($temp == "Add"){
	
	
	
		$sql = "INSERT INTO `tbl_class_teacher_assign`(`school_id`, `class_id`, `section_id`, `teacher_id`) VALUES ('".$user_id."','".$class_id."','".$section_id."','".$teacher_id."')";
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
	
			$sql_update="UPDATE tbl_class_teacher_assign SET class_id='".$class_id."',section_id ='".$section_id ."',teacher_id='".$teacher_id."' WHERE id='".$Editid."';";	
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