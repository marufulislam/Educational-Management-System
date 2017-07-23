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
	

$student_id = escape(isset($_POST['student_id'])) ?  $_POST['student_id'] : '';
$student_number = escape(isset($_POST['student_number'])) ?  $_POST['student_number'] : '';
$promote_info = escape(isset($_POST['promote_info'])) ?  $_POST['promote_info'] : '';
$session_id = escape(isset($_POST['session_id'])) ?  $_POST['session_id'] : '';
$user_id = escape(isset($_POST['transfer_id'])) ?  $_POST['transfer_id'] : '';

date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');

$info = 0;
foreach($_POST['student_id'] as $sk => $sv){ 

	$qry_student = mysql_query("SELECT `testfile` FROM tbl_student_info WHERE `student_id` = '".$sv."'") or die(mysql_error());
	$rw_student = mysql_fetch_assoc($qry_student);
	
	if($promote_info[$sk] == 0){
		$rs_up = 'He/She is Alumni person';
	}else{
		if($rw_student['testfile'] == $student_number[$sk]){
			$sql_up = "UPDATE `tbl_student_info` SET `student_class` = '".$promote_info[$sk]."', `student_session` = '".$session_id[$sk]."' WHERE `student_id` = '".$sv."'";
			$rs_up=mysql_query($sql_up) or die ("Error in update : ".mysql_error());
			if($rs_up){
				$info++;
			}
			
			}else{
				$rs_up = "Sorry please try again";
				}
		
		}
	 
	
}

if($info > 0){
			?>
			<blockquote class="quote_blue">
			  <p>Information Promoted successfully.</p>
			</blockquote>
			<script>
			$(".form_success").hide();
			$(".form-group").slideUp();
		   setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 3000);	
			
			</script>
			<?php      
			}else{
		?>
		<blockquote class="quote_pink">
		  <p>Error Occured, Please try again.</p>
		</blockquote>
		<script>
		$("#idsubmitData").show();
		
		</script>
		<?php  
		}
?>