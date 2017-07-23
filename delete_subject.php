<?php 
require_once('include/connect.php'); 
require_once('include/functions.php'); 
//Customer's previous due
//if(isset($_GET['salesId'])){ 
    echo $vl = $_GET['vl'];
    echo $subId = $_GET['subId'];
	echo $st_id = $_GET['st_id'];
	echo $st_class = $_GET['st_class'];
	echo $st_sec = $_GET['st_sec'];
	echo $st_grp = $_GET['st_grp'];
	echo $st_shft = $_GET['st_shft'];

	


	if($vl == 3){
	$qry = mysql_query("DELETE FROM student_sub_assign WHERE student_id='".$st_id."' AND class_id='".$st_class."' AND sec_id='".$st_sec."' AND group_id='".$st_grp."' AND shift_id='".$st_shft."' AND subject_id='".$subId."'") or die(mysql_error());
	
   	if ($qry){
		?>	
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button> Information Updated successfully.
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
?>
