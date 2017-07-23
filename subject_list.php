<?php
require_once('include/connect.php');
require_once('include/functions.php');

$class_name = $_GET['class_name'];
$section_name = $_GET['section_name'];
$group_name = $_GET['group_name'];
$shift_name = $_GET['shift_name'];
$student_name = $_GET['student_name'];


$uniqueToken = generateUniqueToken(10);

?>

<div class="portlet box blue ">
                        <div class="portlet-title">
                           
                        </div>
                        <div class="portlet-body  flip-scroll">
                            <!-- BEGIN FORM-->
                            <form action=""  class="form-horizontal form-bordered" id="formIDdel" method="post" enctype="multipart/form-data">
                    
                            <table class="table table-bordered table-striped table-condensed flip-content" id="sample_1">
                                <thead class="flip-content">
                                    <tr>
                                        <th><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Roll</th>
                                        <th>Sec</th>
                                        <th>Group</th>
                                        <th>Shift</th>
                                        <th>subject_name</th>

                                        <th width="100px">Status</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_user_admin = "SELECT * FROM student_sub_assign WHERE student_id='".$student_name."' AND class_id='".$class_name."' AND sec_id='".$section_name."' AND shift_id='".$shift_name."' AND group_id='".$group_name."' AND `school_id`='".$_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id']."'";
                                $qry_user_admin = mysql_query($sql_user_admin);
                                while($row = mysql_fetch_array($qry_user_admin)){
									$pk = $row['subject_id'];

                                ?>
                                <tr>
                                
                                 <input type="hidden" id="st_id" name="student_id" value="<?php echo $student_name;?>">
                                 <input type="hidden" id="st_class" name="st_class" value="<?php echo $class_name;?>">
                                 <input type="hidden" id="st_sec" name="st_sec" value="<?php echo $section_name;?>">
                                 <input type="hidden" id="st_grp" name="st_grp" value="<?php echo $group_name;?>">
                                 <input type="hidden" id="st_shft" name="st_shft" value="<?php echo $shift_name;?>">
<input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>"> 
                                 
                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                    <td><?php 
									  $qry_student=mysql_query("SELECT `student_id`,`student_name`,`student_class_roll` FROM tbl_student_info WHERE student_id='".$row['student_id']."'") or die(mysql_error());
$rw_student=mysql_fetch_array($qry_student); echo $rw_student['student_name']

									?></td>
                                    <td><?php
                                     $qry_cls = mysql_query("SELECT `class_name` FROM tbl_class WHERE class_id='".$class_name."'") or die(mysql_error());
										$rw_cls = mysql_fetch_array($qry_cls);
										 echo $rw_cls['class_name'];
									?></td>
                                    <td><?php echo $rw_student['student_class_roll']?></td>
                                    <td><?php 
									 $qry_sec = mysql_query("SELECT `section_name` FROM tbl_section WHERE section_id='".$row['sec_id']."'") or die(mysql_error());
									$rw_sec = mysql_fetch_array($qry_sec);
									echo $rw_sec['section_name'];
									?></td>
                                    <td><?php
                                      $qry_grp = mysql_query("SELECT `group_name` FROM tbl_group WHERE group_id='".$row['group_id']."'") or die(mysql_error());
										$rw_grp = mysql_fetch_array($qry_grp);
										echo $rw_grp['group_name'];
									?></td>
                                    <td><?php
                                      $qry_sft = mysql_query("SELECT `shift_name` FROM tbl_shift WHERE shift_id='".$row['shift_id']."'") or die(mysql_error());
										$rw_sft = mysql_fetch_array($qry_sft);
										echo $rw_sft['shift_name'];
									?></td>
                                    <td><?php
                                       $qry_sub_name = mysql_query("SELECT `subject_name` FROM `tbl_subject` WHERE `subject_id` = '".$row['subject_id']."'") or die(mysql_error());
					  $row_sub_name = mysql_fetch_array($qry_sub_name);
					  echo $row_sub_name['subject_name'];
									?></td>
                                    

                                    <td>
                                       <select name="order_status" id="<?php echo $row['subject_id']?>" class="form-control form-filter input-sm" onchange="req_delete_sub(this.id, this.value)">
											<option value="0" readonly >Active</option>

											<option value="3" >Delete</option>

										</select>
                                    </td>
                                </tr>
                                <?php } ?>   
                                </tbody>
                            </table>    
                            
                            </form>
                            <!-- END FORM-->  
                        </div>
                    </div>
                    
<script>
var req_delete_sub = function(sub_id,sub_value){
	
	
	//var vl = jQuery('select#'+sub_id).val();
	var st_id = $("#st_id").val();
	var st_class = $("#st_class").val();
	var st_sec = $("#st_sec").val();
	var st_grp = $("#st_grp").val();
	var st_shft = $("#st_shft").val();
	var user_id = $("#user_id").val();

	
	//alert(obj_marks);
	if(sub_value == 3){
		
	$.post("delete_subject.php?vl="+sub_value+"&subId="+sub_id+"&st_id="+st_id+"&st_class="+st_class+"&st_sec="+st_sec+"&st_grp="+st_grp+"&st_shft="+st_shft, function(response){
		jQuery('select#'+sub_id).prop('disabled','disabled');
	});
	
	}
}

</script>                    