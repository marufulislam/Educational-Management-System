<?php
require_once('include/connect.php');
require_once('include/functions.php');

$class_name = $_GET['class_name'];
$section_name = $_GET['section_name'];
$group_name = $_GET['group_name'];
$shift_name = $_GET['shift_name'];
$student_name = $_GET['student_name'];
$term_name = $_GET['term_name'];
$exam_year = $_GET['exam_year'];

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
                                      
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Roll</th>
                                        <th>Sec</th>
                                        <th>Group</th>
                                        <th>Shift</th>
                                        <th>subject_name</th>
										<?php 
										  $qry_term_select = mysql_query("SELECT * FROM `tbl_term_sector` WHERE `term_id` = '".$term_name."' AND isActive=1") or die(mysql_error());
										  while($rw_term_select = mysql_fetch_array($qry_term_select)){
										?>
										<th><?php echo $rw_term_select['sector_name']?>(<?php echo $rw_term_select['exam_marks']?>)</th>
										
										<?php }?>
                                        <th>Percentage</th>
                                        <th>20% Mark</th>
                                        <th>Creative</th>
                                        <th>OBJ</th>
                                        <th>Prac</th>
                                        <th>Percentage</th>
                        				<th>80% Mark</th>
                                        <th width="100px">Status</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_user_admin = "SELECT * FROM tbl_full_marks WHERE student_name='".$student_name."' AND class_name='".$class_name."' AND section_name='".$section_name."' AND shift_name='".$shift_name."' AND group_name='".$group_name."' AND term_name='".$term_name."' AND exam_year='".$exam_year."'";
                                $qry_user_admin = mysql_query($sql_user_admin);
                                while($row = mysql_fetch_array($qry_user_admin)){
									$pk = $row['full_marks_id'];

                                ?>
                                <tr>
                                
                                 <input type="hidden" id="st_id" name="student_id" value="<?php echo $student_name;?>">
                                 <input type="hidden" id="st_class" name="st_class" value="<?php echo $class_name;?>">
                                 <input type="hidden" id="st_sec" name="st_sec" value="<?php echo $section_name;?>">
                                 <input type="hidden" id="st_grp" name="st_grp" value="<?php echo $group_name;?>">
                                 <input type="hidden" id="st_shft" name="st_shft" value="<?php echo $shift_name;?>">
                                 <input type="hidden" id="st_term" name="st_term" value="<?php echo $term_name;?>">
                                 <input type="hidden" id="st_session" name="st_session" value="<?php echo $exam_year;?>">
                                 <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>"> 
                                 
                                   
                                    <td><?php 
									  $qry_student=mysql_query("SELECT `student_id`,`student_name`,`student_class_roll` FROM tbl_student_info WHERE student_id='".$row['student_name']."'") or die(mysql_error());
									  $rw_student=mysql_fetch_array($qry_student);
									   echo $rw_student['student_name']

									?></td>
                                    <td><?php
                                     $qry_cls = mysql_query("SELECT `class_name` FROM tbl_class WHERE class_id='".$class_name."'") or die(mysql_error());
									 $rw_cls = mysql_fetch_array($qry_cls);
									 echo $rw_cls['class_name'];
									?></td>
                                    <td><?php echo $rw_student['student_class_roll']?></td>
                                    <td><?php 
									 $qry_sec = mysql_query("SELECT `section_name` FROM tbl_section WHERE section_id='".$row['section_name']."'") or die(mysql_error());
									$rw_sec = mysql_fetch_array($qry_sec);
									echo $rw_sec['section_name'];
									?></td>
                                    <td><?php
                                      $qry_grp = mysql_query("SELECT `group_name` FROM tbl_group WHERE group_id='".$row['group_name']."'") or die(mysql_error());
										$rw_grp = mysql_fetch_array($qry_grp);
										echo $rw_grp['group_name'];
									?></td>
                                    <td><?php
                                      $qry_sft = mysql_query("SELECT `shift_name` FROM tbl_shift WHERE shift_id='".$row['shift_name']."'") or die(mysql_error());
										$rw_sft = mysql_fetch_array($qry_sft);
										echo $rw_sft['shift_name'];
									?></td>
                                    <td><?php
                                       $qry_sub_name = mysql_query("SELECT `subject_name` FROM `tbl_subject` WHERE `subject_id` = '".$row['subject_name']."'") or die(mysql_error());
					  $row_sub_name = mysql_fetch_array($qry_sub_name);
					  echo $row_sub_name['subject_name'];
									?></td>
                                    
									  <td> <input type="text" id="ct_marks1<?php echo $row['subject_name']?>" class="form-control" name="" value="<?php echo $row['ct_marks1'];?>" /></td>

 									  <td> <input type="text" id="ct_marks2<?php echo $row['subject_name']?>" class="form-control" name="" value="<?php echo $row['ct_marks2'];?>" /></td>
 									 <td>
                        				<select id="calculation" class="form-control span6 required" name="calculation" onchange="mid_calculate(this.value, <?php echo $row['subject_name']?>)">
                          				  <option value="">Select Percentage</option>
                          
										  <?php 
                                           $rs = mysql_query("SELECT * FROM select_percentage ORDER BY id ASC");
                                            while($obj = mysql_fetch_assoc($rs)) {
                                              echo "<option value = '".$obj['value']."'";
                                              if(@$rs_view['value'] == $obj['value']) echo "selected='selected'" ; 
                                                echo ">".$obj['value']."</option>";          
                                            } 
                                            ?>
                                        </select>
                     				 </td>
                      				 <td> <input type="text" id="avg<?php echo $row['subject_name']?>" class="form-control" name="avg" value="<?php echo $row['avg'];?>" /></td>
                      
                        <td> <input type="text" id="creative_marks<?php echo $row['subject_name']?>" class="form-control" name="creative_marks" value="<?php echo $row['creative'];?>" /></td>
                        
                        <td> <input type="text" id="obj_marks<?php echo $row['subject_name']?>" class="form-control" name="obj_marks" value="<?php echo $row['objective'];?>" /></td>
                        
                        <td> <input type="text" id="prac_marks<?php echo $row['subject_name']?>" class="form-control" name="prac_marks" value="<?php echo $row['practicle'];?>" placeholder="prac marks" /></td>
                        <td>
                        <select id="calculation" class="form-control span6 required" name="calculation" onchange="term_calculate(this.value, <?php echo $row['subject_name']?>)">
                          <option value="">Select Percentage</option>

                          
						  <?php 
                           $rs = mysql_query("SELECT * FROM select_percentage ORDER BY id ASC");
                            while($obj = mysql_fetch_assoc($rs)) {
                              echo "<option value = '".$obj['value']."'";
                              if(@$rs_view['value'] == $obj['value']) echo "selected='selected'" ; 
                                echo ">".$obj['value']."</option>";          
                            } 
                            ?>

                             
                        </select>
                     </td>
                     <td> <input type="text" id="total<?php echo  $row['subject_name'];?>" class="form-control" name="total[<?php echo $str;?>]" value="<?php echo $row['total'];?>" placeholder="final marks" /></td>
 
                                   
                                    <td>
                                       <select name="order_status" id="<?php echo $row['subject_name']?>" class="form-control form-filter input-sm" onchange="setOrderStatus(this.id, this.value)">
											<option value="0" >Active</option>
                                            <option value="1" >Update</option>
											<option value="2" >Delete</option>

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
var setOrderStatus = function(sub_id, sub_value){
    //var vl = jQuery('select#'+sub_id).val();
	
	var st_id = $("#st_id").val();
	var st_class = $("#st_class").val();
	var st_sec = $("#st_sec").val();

	var st_grp = $("#st_grp").val();
	var st_shft = $("#st_shft").val();
	
	var st_term = $("#st_term").val();
	var st_session = $("#st_session").val();
	
	var ct_marks1 = jQuery('#ct_marks1'+sub_id).val();
	var ct_marks2 = jQuery('#ct_marks2'+sub_id).val();
	var avg = jQuery('#avg'+sub_id).val();
	var creative_marks = jQuery('#creative_marks'+sub_id).val();
	var obj_marks = jQuery('#obj_marks'+sub_id).val();
	var prac_marks = jQuery('#prac_marks'+sub_id).val();
	var total = jQuery('#total'+sub_id).val();
	
	var user_id = $("#user_id").val();

	
	//alert(st_term);
	if(sub_value == 2){
		
	$.post("orderStatus.php?vl="+sub_value+"&subId="+sub_id+"&st_id="+st_id+"&st_class="+st_class+"&st_sec="+st_sec+"&st_grp="+st_grp+"&st_shft="+st_shft+"&st_term="+st_term+"&st_session="+st_session, function(response){
		jQuery('select#'+sub_id).prop('disabled','disabled');
	});
	
	}else if(sub_value == 1){
		$.post("orderUpdate.php?vl="+sub_value+"&subId="+sub_id+"&st_id="+st_id+"&st_class="+st_class+"&st_sec="+st_sec+"&st_grp="+st_grp+"&st_shft="+st_shft+"&st_term="+st_term+"&st_session="+st_session+"&ct_marks1="+ct_marks1+"&ct_marks2="+ct_marks2+"&avg="+avg+"&creative_marks="+creative_marks+"&obj_marks="+obj_marks+"&prac_marks="+prac_marks+"&total="+total+"&user_id="+user_id, function(response){
		jQuery('select#'+sub_id).prop('disabled','disabled');
	});
		}
}

</script>  

<script>

var mid_calculate = function(id, st){
	var ct_marks1 = parseFloat($("#ct_marks1"+st).val());	
	var ct_marks2 = parseFloat($("#ct_marks2"+st).val());
	
	var avg = Math.round(ct_marks1 + ct_marks2);
	total = Math.round((avg*id)/50);

    $("#avg"+st).val(total);
	
	}
	
var term_calculate = function(id, st){
	var creative_marks = parseFloat($("#creative_marks"+st).val());	
	var obj_marks = parseFloat($("#obj_marks"+st).val());
	var prac_marks = parseFloat($("#prac_marks"+st).val());
	
	var avg = Math.round(creative_marks + obj_marks + prac_marks);
	total = Math.round((avg*id)/100);

    $("#total"+st).val(total);
	
	}	

</script>	
                  