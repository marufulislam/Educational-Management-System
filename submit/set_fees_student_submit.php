<?php
require_once('../include/connect.php');
require_once('../include/view.php');


if(isset($_REQUEST['temp']) == false) $temp = "";
else if(isset($_REQUEST['temp']) == true)	$temp = $_REQUEST['temp'];

$page_link = escape(isset($_POST['page_link'])) ?  $_POST['page_link'] : '';	
$student_id = escape(isset($_POST['student_id'])) ?  $_POST['student_id'] : '';
$class_name = escape(isset($_POST['class_name_double'])) ?  $_POST['class_name_double'] : '';
$section_name = escape(isset($_POST['section_name_double'])) ?  $_POST['section_name_double'] : '';
$group_name = escape(isset($_POST['group_name_double'])) ?  $_POST['group_name_double'] : '';
$shift_name = escape(isset($_POST['shift_name_double'])) ?  $_POST['shift_name_double'] : '';
$exam_year = escape(isset($_POST['exam_year_double'])) ?  $_POST['exam_year_double'] : '';

$group_id = escape(isset($_POST['group_id'])) ?  $_POST['group_id'] : '';
$test_name = escape(isset($_POST['name'])) ?  $_POST['name'] : '';
@$test_name = implode(',',$test_name);
$total = escape(isset($_POST['total'])) ?  $_POST['total'] : '';
$grand_total = escape(isset($_POST['grand_total'])) ?  $_POST['grand_total'] : '';
$advance = escape(isset($_POST['advance'])) ?  $_POST['advance'] : '';

$due = escape(isset($_POST['due'])) ?  $_POST['due'] : '';
$less = escape(isset($_POST['less'])) ?  $_POST['less'] : '';

$user_id = escape(isset($_POST['user_id_double'])) ?  $_POST['user_id_double'] : '';

$unique_token = escape(isset($_POST['unique_token'])) ?  $_POST['unique_token'] : '';



//print_r($_POST);
//exit();

date_default_timezone_set('Asia/Dhaka');
$cur_date = date('Y-m-d');
$time = date('H:i:s');
$datetime=$cur_date."T".$time;



foreach($_POST['name'] as $sk => $sv){

			$sql_group_id = "SELECT * FROM `tbl_fee_sub_category` WHERE `fee_sub_category_id` = '".$sv."'";
			$qry_group_id =  mysql_query($sql_group_id) or die (mysql_error());
			$rs_group_id =  mysql_fetch_array($qry_group_id);
			$group_id = $rs_group_id['fee_category_id']; 
			$test_price = $rs_group_id['fee_sub_category_price'];
			$test_subgroup = $rs_group_id['fee_sub_category_name'];
			
			$qry_having_grp = mysql_query("SELECT * FROM `tbl_req_fee_report` WHERE `student_id` = '".$student_id."'  AND `category_id` = '1' AND `fee_sub_name` = '".$sv."'");
			if(mysql_num_rows($qry_having_grp) > 0){
				
			$sql_delete="DELETE FROM tbl_req_fee_report WHERE random_number='".$unique_token."'";
            $rs_delete=mysql_query($sql_delete);
				
			?>
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button> This student already paid <?php echo $test_subgroup ?>`s &nbsp; charge
            </div>
            <script>
                $(".form_success").hide();
                $(".form-group").slideUp();
                setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 20000);	
            </script>
				<?php
				
				
				}else{
				$sql_test = "INSERT INTO `tbl_req_fee_report`(`school_id`, `student_id`, `category_id`, `fee_sub_name`, `fee_charge`, `random_number`, `isCompleted`, `create_on`) VALUES ('".$user_id."','".$student_id."','".$group_id."','".$sv."','".$test_price."','".$unique_token."','0','".$cur_date."')";
			$rs_test=mysql_query($sql_test) or die ("Error in update : ".mysql_error());
					
					}
	
		  }

$qry_check_charge = mysql_query("SELECT `random_number` FROM `tbl_req_fee_report` WHERE `student_id` = '".$student_id."' AND `random_number` = '".$unique_token."'");
if(mysql_num_rows($qry_check_charge) > 0){
	
	 	$sql_doc = "INSERT INTO `tbl_fee_report`(`school_id`, `student_id`, `class_id`, `section_id`, `shift_id`, `group_id`, `exm_year`, `total`, `grand_total`, `advance`, `due`, `less`, `entry_date`, `created_on`) VALUES ('".$user_id."','".$student_id."','".$class_name."','".$section_name."','".$shift_name."','".$group_name."','".$exam_year."','".$total."','".$grand_total."','".$advance."','".$due."','".$less."','".$cur_date."','".$datetime."')";
	$rs_update=mysql_query($sql_doc) or die ("Error in update : ".mysql_error());
	
	if($due > 1){
		  
		  $qry_having_due = mysql_query("SELECT * FROM `tbl_student_due` WHERE `student_id` = '".$student_id."'");
			if(mysql_num_rows($qry_having_due) > 0){
				$sql_due=mysql_query("UPDATE `tbl_student_due` SET `due` = '".$due."',`create_on` = '".$datetime."' WHERE `student_id` = '".$student_id."'") or die(mysql_error());
				}
				else{
					$sql_due=mysql_query("INSERT INTO `tbl_student_due`(`school_id`, `student_id`, `due`, `create_on`) VALUES ('".$user_id."','".$student_id."','".$due."','".$datetime."')") or die(mysql_error());
					}
			if($sql_due){
				?>
                  <blockquote class="quote_blue"><p>Information added successfully.</p></blockquote>
                <script>
				$(".form_success").hide();
				$(".form-group").slideUp();
                setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 3000);
			    </script>
                <?php
				}else{
					?>
                    
                    <blockquote class="quote_pink"><p>Error Occured, Please try again.</p></blockquote>
				
					<script>
                        $("#idsubmitData").show();
                    </script>
                    <?php
					}		
		  }
	
	  if($rs_update){?>
		  
		 <blockquote class="quote_blue"><p>Information added successfully.</p></blockquote>
		 <script>
            $(".form_success").hide();
            $(".form-group").slideUp();
 
            setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 3000);
         </script>  
		  
	<?php }else {?>
      <blockquote class="quote_pink"><p>Error Occured, Please try again.</p></blockquote>
				
		<script>
            $("#idsubmitData").show();
        </script>
     <?php
		  
		 }
	 
	 			
}		  
		  
		  




?>