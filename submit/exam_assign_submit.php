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
$term_id = escape(isset($_POST['term_id'])) ?  $_POST['term_id'] : '';
$sector_name = escape(isset($_POST['sector_name'])) ?  $_POST['sector_name'] : '';
$exam_marks = escape(isset($_POST['exam_marks'])) ?  $_POST['exam_marks'] : '';
$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';


date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;



if($temp == "Add"){
	
	$qry_having = mysql_query("SELECT * FROM `tbl_term_sector` WHERE term_id='".$term_id."' AND sector_name='".$sector_name."'");
	if(mysql_num_rows($qry_having) == 0){
	
	$sql = "INSERT INTO `tbl_term_sector`(`school_id`, `term_id`, `sector_name`, `exam_marks`, `datetime`) VALUES ('".$user_id."','".$term_id."','".$sector_name."','".$exam_marks."','".$datetime."')";
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
	$sql_delete="DELETE FROM tbl_term_sector WHERE term_sector_id='".$Editid."'";
	$rs_delete=mysql_query($sql_delete);
	
	
	
	$qry_having = mysql_query("SELECT * FROM `tbl_term_sector` WHERE sector_name='".$sector_name."'");
	if(mysql_num_rows($qry_having) == 0){
	
		$sql = "INSERT INTO `tbl_term_sector`(`term_sector_id`, `school_id`, `term_id`, `sector_name`, `exam_marks`, `datetime`) VALUES ('$Editid', '".$user_id."', '".$term_id."','".$sector_name."', '".$exam_marks."', '".$datetime."')";
		$qry = mysql_query($sql) or die('Error in insertion : ' . mysql_error($sql));
		
		if ($qry){
		?>	
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button> Information Update successfully.
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
?>