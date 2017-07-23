<div class="portlet-body form">
<?php
require_once('include/connect.php');
require_once('include/functions.php');

$current_session = $_GET['current_session'];
$promote_session = $_GET['promote_session'];
$current_class = $_GET['current_class'];
$promote_class = $_GET['promote_class'];

$uniqueToken = generateUniqueToken(10);

$qry_promote_class=mysql_query("SELECT * FROM `tbl_class` WHERE class_id='".$promote_class."'") or die(mysql_error());
$rw_promote_class=mysql_fetch_array($qry_promote_class);

$qry_current_class=mysql_query("SELECT * FROM `tbl_class` WHERE class_id='".$current_class."'") or die(mysql_error());
$rw_current_class=mysql_fetch_array($qry_current_class);

$user_admin = mysql_query("SELECT `userid` FROM user_admin WHERE `usr_code` = '".$_SESSION['com_cbs_aaiam_school_maruf_user_email']."'") or die(mysql_error());
$rw_admin = mysql_fetch_assoc($user_admin);
?>

<div class="col-md-12 col-sm-12">
   <div class="portlet purple box">
	  <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Student Information
        </div>
	  </div>
       <div class="student_promotion"> </div>
	  <div class="portlet-body">
		<div class="table-responsive">
            <form action="" method="post" id="promotion_frm" class="form_container left_label"enctype="multipart/form-data">
				<table class="table table-bordered table-striped table-condensed flip-content" id="sample_1">
                    <thead class="flip-content">
                       <tr>
                        <th>SL</th>
 						<th>Student Name</th>
                        <th>Section</th>
                        <th>Roll No</th>
                        <th>Student Information</th>
                        <th>Promote Option</th>

                       </tr>
                    </thead>
                    
                    
                    <tbody>
                    <?php
						$sql_user_admin = "SELECT * FROM `tbl_student_info` WHERE `student_class`='".$current_class."' AND `student_session`='".$current_session."'";
						$qry_user_admin = mysql_query($sql_user_admin);
						$i=0;
						while($row = mysql_fetch_array($qry_user_admin)){
						$i++;	
							$str = $row['student_id'];
							$str_code = $row['testfile'];
							 $pk = str_pad($str,5,"0",STR_PAD_LEFT);

	 	             ?>
						
             			
                    <tr>
                    <input type="hidden" id="student_id[<?php echo $str;?>]" class="form-control" name="student_id[<?php echo $str;?>]" value="<?php echo $row['student_id']; ?>"/>

                    <input type="hidden" name="student_number[<?php echo $str;?>]" id="student_number[<?php echo $str;?>]" value="<?php echo $str_code;?>">
                    <input type="hidden" id="transfer_id" name="transfer_id" value="<?php echo $rw_admin['userid']; ?>">
                    <input type="hidden" name="session_id[<?php echo $str;?>]" id="session_id[<?php echo $str;?>]" value="<?php echo $promote_session;?>"> 

                     <td><?php echo $i;?> </td>	
                     <?php
					 	$qry_section=mysql_query("SELECT * FROM `tbl_section` WHERE section_id='".$row['student_section']."'") or die(mysql_error());
					    $rw_section=mysql_fetch_array($qry_section);
					  ?>
					 <td><?php echo $row['student_name'];?></td>
                      <td><?php echo $rw_section['section_name'];?></td>
                      <td><?php echo $row['student_class_roll'];?></td>
                     
                     
                     <td>
                        <button type="button" class="btn btn-default" onclick="showAjaxModal('http://creativeitem.com/demo/ekattor/index.php?modal/popup/student_promotion_performance/2/1');">
						<i class="entypo-eye"></i> View Academic Performance</button>
                     </td>
                        

                     <td>
                        <select id="promote_info<?php echo $str;?>" class="form-control span6 required" name="promote_info[<?php echo $str;?>]">
                           <option value="<?php echo $promote_class;?>">Enroll To Class - <?php echo $rw_promote_class['class_name'];?></option>
                           <option value="<?php echo $current_class;?>">Enroll To Class - <?php echo $rw_current_class['class_name'];?></option>
                           <option value="<?php echo '0'?>">Select as Alumni</option>
                           
                        </select>
                     
                     </td>
                    </tr>
                  <?php 

				  }?>
                    </tbody>
               </table>
               
               <div class="form-actions center"><!--Begin form-actions-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-offset-3 col-md-9">
											   <button type="button" class="btn green" id="promotion_frm-comment"  onclick="submit_refered_promotion()">&nbsp;Promote Selected Student</button>                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </form>
        </div>
       </div>
      </div>
     </div>
     
   	 <div class="clearfix space5"></div>       
</div>
	



