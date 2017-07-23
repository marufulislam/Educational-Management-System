<div class="portlet-body form">
<?php
require_once('include/connect.php');
require_once('include/functions.php');

$class_name = $_GET['class_name'];
$section_name = $_GET['section_name'];
$shift_name = $_GET['shift_name'];
date_default_timezone_set('Asia/Dhaka');
$cur_date =  dateconvert($_GET['entry_date']);


$qry_student = mysql_query("SELECT `testfile` FROM tbl_student_info WHERE student_class='".$class_name."' AND student_section='".$section_name."' AND student_shift='".$shift_name."'") or die(mysql_error());
	while($rw_student=mysql_fetch_array($qry_student)){
		
		$qry_code=mysql_query("SELECT * FROM tbl_attendance WHERE unique_code='".$rw_student['testfile']."'") or die(mysql_error());
		
		if(mysql_num_rows($qry_code) == 0){
			
					$sql = "INSERT INTO `tbl_attendance`(`unique_code`,`entry_date`, `attendance`) VALUES ('".$rw_student['testfile']."', '".$cur_date."','1')";
		$qry = mysql_query($sql) or die('Error in insertion : ' . mysql_error($sql));
			
			}
		}

?>

	<div class="col-md-12 col-sm-12">
   <div class="portlet purple box">
	  <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Attendance Information(<?php echo  dateconvert($_GET['entry_date']);?>)
        </div>
	  </div>
       <div class="ct_term"> </div>
	  <div class="portlet-body">
		<div class="table-responsive">
            <form action="" method="post" id="attendance_frm" class="form_container left_label"enctype="multipart/form-data">
				<table class="table table-bordered table-striped table-condensed flip-content" id="sample_1">
                    <thead class="flip-content">
                       <tr align="center">
                        
 						<th>Student Name</th>
                        <th>Roll No</th>
                        <th>Status</th>

                       </tr>
                    </thead>
                    <tbody>
                    <?php
					$qry_student=mysql_query("SELECT * FROM tbl_attendance WHERE entry_date='".$cur_date."'") or die(mysql_error());
						while($rw_code=mysql_fetch_array($qry_student)){

							$str = $rw_code['id'];
							 $pk = str_pad($str,5,"0",STR_PAD_LEFT);
							 $is_published = $rw_code['attendance'];
							 
	 	             ?>
					<?php 
						$student_info = mysql_query("SELECT * FROM tbl_student_info WHERE testfile='".$rw_code['unique_code']."'")or die(mysql_error());
						$rw_info = mysql_fetch_array($student_info);
					?>
             			
                    <tr class="hide<?php echo $str;?>">
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>"> 

                     
					 <td align="center"><?php echo $rw_info['student_name'];?></td>
                     <td align="center"><?php echo $rw_info['student_class_roll'];?></td>
                     
                     <td align="center">
                          <span id="like-load<?php  echo $str;?>">&nbsp;</span>
                          <span id="like-panel<?php  echo $str;?>">
                          <?php
                            if($is_published == 1){?>
                                <a href="javascript: void(0)" s_id="attendance-<?php  echo $str;?>" class="present btn btn-xs btn-primary">Present</a>
                            <?php } else {?>
                               <a href="javascript: void(0)" s_id="attendance-<?php  echo $str;?>" class="absent btn btn-xs btn-danger">Absent</a>
                            <?php } ?>
                           </span> 
                     </td>

               
                    </tr>
                  <?php }?>
                  
                  
                    </tbody>                    
               </table>
            </form>
        </div>
       </div>
      </div>
     </div>


     
     
     
   <div class="clearfix space5"></div>       
</div>



