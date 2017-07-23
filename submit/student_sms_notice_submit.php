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
$optionsRadios1 = escape(isset($_POST['optionsRadios1'])) ?  $_POST['optionsRadios1'] : '';
$number = escape(isset($_POST['number'])) ?  $_POST['number'] : '';
$class_name = escape(isset($_POST['class_name'])) ?  $_POST['class_name'] : '';
$student_shift = escape(isset($_POST['student_shift'])) ?  $_POST['student_shift'] : '';
$student_class = escape(isset($_POST['student_class'])) ?  $_POST['student_class'] : '';
$student_section = escape(isset($_POST['student_section'])) ?  $_POST['student_section'] : '';
$message = escape(isset($_POST['message'])) ?  $_POST['message'] : '';

print_r($_POST);
exit();

if($temp == "Add"){
	
	$qry_having = mysql_query("SELECT * FROM `news_and_events` WHERE title='".$title."'");
	if(mysql_num_rows($qry_having) == 0){
	
		$sql = "INSERT INTO `news_and_events`(`title`, `location`, `description`, `gallery`) VALUES ('".$title."','".$location."','".$description."','".$gallery."')";
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
	
	$qry_title = mysql_query("SELECT title FROM `news_and_events` WHERE id='".$Editid."'") or die ("Error in title selection : ".mysql_error());;
	$rs_title = mysql_fetch_array($qry_title); 
	$db_title = $rs_title['title'];
	
	if($db_title != $title){
		$qry_having = mysql_query("SELECT * FROM `news_and_events` WHERE title='".$title."'");
		if(mysql_num_rows($qry_having) == 0){
	
			$sql_update="UPDATE news_and_events SET title='".$title."',location='".$location."',description='".$description."',gallery='".$gallery."' WHERE id='".$Editid."';";	
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
	}else{
		
		$sql_update="UPDATE news_and_events SET title='".$title."',location='".$location."',description='".$description."',gallery='".$gallery."' WHERE id='".$Editid."';";	
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
		
	}
			
}
?>