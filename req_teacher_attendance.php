<div class="portlet-body form">
<?php
require_once('include/connect.php');
require_once('include/functions.php');

$department = $_GET['department'];
$cur_date =  dateconvert($_GET['entry_date']);


$qry_teacher = mysql_query("SELECT `teacher_id` FROM tbl_teacher_registration WHERE department_id='".$department."'") or die(mysql_error());

	while($rw_teacher=mysql_fetch_array($qry_teacher)){
		
		$qry_code=mysql_query("SELECT * FROM tbl_attendance_teacher WHERE teacher_id='".$rw_teacher['teacher_id']."'") or die(mysql_error());
		
		if(mysql_num_rows($qry_code) == 0){
			
					$sql = "INSERT INTO `tbl_attendance_teacher`(`teacher_id`,`entry_date`, `teacher_attendance`) VALUES ('".$rw_teacher['teacher_id']."', '".$cur_date."','1')";
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
                        
 						<th>SL ID</th>
                        <th>Teacher Name</th>
                        <th>Status</th>

                       </tr>
                    </thead>
                    <tbody>
                    <?php
					$qry_teacher_list=mysql_query("SELECT * FROM tbl_attendance_teacher WHERE entry_date='".$cur_date."'") or die(mysql_error());
						while($rw_teacher_list=mysql_fetch_array($qry_teacher_list)){

							$str = $rw_teacher_list['id'];
							 $pk = str_pad($str,5,"0",STR_PAD_LEFT);
							 $is_published = $rw_teacher_list['teacher_attendance'];
							 
	 	             ?>
					<?php 
						$teacher_info = mysql_query("SELECT * FROM tbl_teacher_registration WHERE teacher_id='".$rw_teacher_list['teacher_id']."'")or die(mysql_error());
						$rw_info = mysql_fetch_array($teacher_info);
					?>
             			
                    <tr class="hide<?php echo $str;?>">
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>"> 

                     
					 <td align="center"><?php echo $pk;?></td>
                     <td align="center"><?php echo $rw_info['teacher_name'];?></td>
                     
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



