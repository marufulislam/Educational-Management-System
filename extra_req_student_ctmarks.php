<div class="portlet-body form">
<?php
require_once('include/connect.php');
require_once('include/functions.php');

$class_name = $_GET['class_name'];
$section_name = $_GET['section_name'];
$group_name = $_GET['group_name'];
$shift_name = $_GET['shift_name'];
$subject_name = $_GET['subject_name'];
$term_name = $_GET['term_name'];
$exam_year = $_GET['exam_year'];
$uniqueToken = generateUniqueToken(10);


$qry_code=mysql_query("SELECT `subject_code` FROM tbl_subject WHERE subject_id='".$subject_name."'") or die(mysql_error());
$rw_code=mysql_fetch_array($qry_code);


$qry_cls=mysql_query("SELECT `class_short_form` FROM tbl_class WHERE class_id='".$class_name."'") or die(mysql_error());
$rw_cls=mysql_fetch_array($qry_cls);

?>

<?php if(($rw_cls['class_short_form']) > 5){
	
	if($rw_code['subject_code'] == '101' || $rw_code['subject_code'] == '107'){ ?>
	<div class="col-md-12 col-sm-12">
   <div class="portlet purple box">
	  <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Student Information
        </div>
	  </div>
       <div class="ct_term"> </div>
	  <div class="portlet-body">
		<div class="table-responsive">
            <form action=""  class="form-horizontal form-bordered" id="formIDdel" method="post" enctype="multipart/form-data">
				<table class="table table-bordered table-striped table-condensed flip-content" id="sample_1">
                    <thead class="flip-content">
                       <tr>
 						<th>Name</th>
                        <th>Roll</th>
                        <th>1st mid term</th>
                        <th>2nd mid term</th>
                        <th>Calculation</th>
                        <th>Average</th>
                        <th>Creative Marks</th>
                        <th>Obj. Marks</th>
                        <th>Practicle Marks</th>
                        <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                    <?php
					
						$sql_user_double = "SELECT * FROM `student_sub_assign` WHERE `class_id`='".$class_name."' AND `sec_id`='".$section_name."' AND `shift_id`='".$shift_name."' AND `group_id`='".$group_name."' AND `subject_id`='".$subject_name."'";
						$qry_user_double = mysql_query($sql_user_double);
						$i=0;
						while($row_double = mysql_fetch_array($qry_user_double)){
						$i++;	
							$str_double = $row_double['student_id'];
							 $pk_double = str_pad($str_double,5,"0",STR_PAD_LEFT);
							 
							 
						$qry_having_deouble = mysql_query("SELECT * FROM `tbl_full_marks` 
							   WHERE `student_name` = '".$str_double."' 
							   AND `class_name` = '".$class_name."' 
							   AND `section_name` = '".$section_name."' 
							   AND `shift_name` = '".$shift_name."' 
							   AND `group_name` = '".$group_name."' 
							   AND `subject_name` = '".$subject_name."' 
							   AND `exam_year` = '".$exam_year."'
							   AND `term_name` = '".$term_name."'");
						@$ct_marks1_double = $ct_marks2_double = @$avg_double = @$creative_marks_double = @$obj_marks_double = @$prac_marks_double = 0;
						 while($rows_double = mysql_fetch_array($qry_having_deouble)){
							 @$ct_marks1_double = $rows_double['ct_marks1'];
							 @$ct_marks2_double = $rows_double['ct_marks2'];
							  @$avg_double = $rows_double['avg'];
							  @$creative_marks_double = $rows_double['creative'];
							  @$obj_marks_double = $rows_double['objective'];
							  @$prac_marks_double = $rows_double['practicle'];
						 }
	 	             ?>
						
             			
                    <tr>
                    <input type="hidden" id="student_id[<?php echo $str_double;?>]" class="form-control" name="student_id[<?php echo $str_double;?>]" value="<?php echo $row_double['student_id']; ?>"/>
                      
                    <input type="hidden" name="class_name_double" id="class_name_double" value="<?php echo $class_name;?>">
                    <input type="hidden" name="section_name_double" id="section_name_double" value="<?php echo $section_name;?>">
                    <input type="hidden" name="group_name_double" id="group_name_double" value="<?php echo $group_name;?>">
                    <input type="hidden" name="shift_name_double" id="shift_name_double" value="<?php echo $shift_name;?>">
                    <input type="hidden" name="subject_name_double" id="subject_name_double" value="<?php echo $subject_name;?>">
                    <input type="hidden" name="term_name_double" id="term_name_double" value="<?php echo $term_name;?>">
                    <input type="hidden" name="exam_year_double" id="exam_year_double" value="<?php echo $exam_year;?>">
                    <input type="hidden" id="user_id_double" name="user_id_double" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>"> 

                     
					  <?php $qry_student_double=mysql_query("SELECT student_id,student_name,student_class_roll FROM `tbl_student_info` WHERE student_id='".$str_double."'") or die(mysql_error());
					    $rw_student_double=mysql_fetch_array($qry_student_double);
					  ?>	
					 <td><?php echo $rw_student_double['student_name'];?></td>
                      <td><?php echo $rw_student_double['student_class_roll'];?></td>
                     
                     <td>
                     
                      <input type="text" id="double1<?php echo $str_double;?>" class="form-control" name="double1[<?php echo $str_double;?>]" value="" placeholder="1st paper"  onchange="calculate_double_1st(<?php echo $str_double;?>)"/>
                     
                      <input type="text" id="double2<?php echo $str_double;?>" class="form-control" name="double2[<?php echo $str_double;?>]" value="" placeholder="2nd paper"  onchange="calculate_double_1st(<?php echo $str_double;?>)"/>
                      
                      <input type="text" id="ct_marks1_double<?php echo $str_double;?>" class="form-control" name="ct_marks1_double[<?php echo $str_double;?>]" value="<?php echo $ct_marks1_double;?>" placeholder="CT Marks 1" />
                     </td>
                     
                     <td>
                      <input type="text" id="double3<?php echo $str_double;?>" class="form-control" name="double3[<?php echo $str_double;?>]" value="" placeholder="1st paper"  onchange="calculate_double_2nd(<?php echo $str_double;?>)"/>
                      
                     <input type="text" id="double4<?php echo $str_double;?>" class="form-control" name="double4[<?php echo $str_double;?>]" value="" placeholder="1st paper"  onchange="calculate_double_2nd(<?php echo $str_double;?>)"/>
                      
                     <input type="text" id="ct_marks2_double<?php echo $str_double;?>" class="form-control" name="ct_marks2_double[<?php echo $str_double;?>]" value="<?php echo $ct_marks2_double;?>" placeholder="CT Marks 2" />
                      </td>
                     
                     <td>
                        <select id="calculation" class="form-control span6 required" name="calculation" onchange="avg_calculate_double_1st(this.value, <?php echo $str_double;?>)">
                          <option value="">Select an option</option>
                          <option value="1">ADD</option>
                          <option value="2">AVG</option>
                             
                        </select>
                        <select id="calculation" class="form-control span6 required" name="calculation" onchange="avg_calculate_double_2nd(this.value, <?php echo $str_double;?>)">
                          <option value="">Select an option</option>
                          <option value="1">ADD</option>
                          <option value="2">AVG</option>
                             
                        </select>
                     </td>
                        
                     <td> 
                     <input type="text" id="double5<?php echo $str_double;?>" class="form-control" name="double5[<?php echo $str_double;?>]" value="" placeholder="1st paper"  />
                     
                      <input type="text" id="double6<?php echo $str_double;?>" class="form-control" name="double6[<?php echo $str_double;?>]" value="" placeholder="2nd paper" />
                      
                       <input type="text" id="avg_double<?php echo $str_double;?>" class="form-control" name="avg_double[<?php echo $str_double;?>]" value="<?php echo $avg_double;?>" placeholder="Average" />
                     </td>
                     
                       <td> 
                       <input type="text" id="double7<?php echo $str_double;?>" class="form-control" name="double7[<?php echo $str_double;?>]" value="" placeholder="1st paper"  onchange="calculate_double_3rd(<?php echo $str_double;?>)"/>
                       
                        <input type="text" id="double8<?php echo $str_double;?>" class="form-control" name="double8[<?php echo $str_double;?>]" value="" placeholder="2nd paper"  onchange="calculate_double_3rd(<?php echo $str_double;?>)"/>
                        
                         <input type="text" id="creative_marks_double<?php echo $str_double;?>" class="form-control" name="creative_marks_double[<?php echo $str_double;?>]" value="<?php echo $creative_marks_double;?>" placeholder="creative marks"  />
                       </td>
                     
                     <td> 
                     <input type="text" id="double9<?php echo $str_double;?>" class="form-control" name="double9[<?php echo $str_double;?>]" value="" placeholder="1st paper"  onchange="calculate_double_4th(<?php echo $str_double;?>)"/>
                     
                      <input type="text" id="double10<?php echo $str_double;?>" class="form-control" name="double10[<?php echo $str_double;?>]" value="" placeholder="2nd paper"  onchange="calculate_double_4th(<?php echo $str_double;?>)"/>
                      
                       <input type="text" id="obj_marks_double<?php echo $str_double;?>" class="form-control" name="obj_marks_double[<?php echo $str_double;?>]" value="<?php echo $obj_marks_double;?>" placeholder="obj marks" />
                     </td>
                        
                     <td>
                      <input type="text" id="double11<?php echo $str_double;?>" class="form-control" name="double11[<?php echo $str_double;?>]" value="" placeholder="1st paper" />
                      
                       <input type="text" id="double12<?php echo $str_double;?>" class="form-control" name="double12[<?php echo $str_double;?>]" value="" placeholder="2nd paper" />
                       
                        <input type="hidden" id="prac_marks_double<?php echo $str_double;?>" class="form-control" name="prac_marks_double[<?php echo $str_double;?>]" value="<?php echo $prac_marks_double;?>" placeholder="prac marks" />
                      </td>
                      
                      <td>
                      <br />
                       <select name="order_status" id="<?php echo $str_double?>" class=" btn green" onchange="setOrderStatus(this.id, this.value)">
											<option value="0" >Active</option>
                                            <option value="1" >Submit</option>


										</select>
                     
                      </td>
                     
                   
                       
                    </tr>
                  <?php }}else{ ?>
		<div class="col-md-12 col-sm-12">
   <div class="portlet purple box">
	  <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Student Information
        </div>
	  </div>
       <div class="ct_term"> </div>
	  <div class="portlet-body">
		<div class="table-responsive">
            <form action="" method="post" id="ct_marks_frm" class="form_container left_label"enctype="multipart/form-data">
				<table class="table table-bordered table-striped table-condensed flip-content" id="sample_1">
                    <thead class="flip-content">
                       <tr>
                        <th>Student ID</th>
 						<th>Student Name</th>
                        <th>Roll No</th>
                        <th>1st mid term</th>
                        <th>2nd mid term</th>
                        <th>Calculation</th>
                        <th>Average</th>
                        <th>Creative Marks</th>
                        <th>Objective Marks</th>
                        <th>Practicle Marks</th>
                       </tr>
                    </thead>
                    <tbody>
                    <?php
					
						$sql_user_admin = "SELECT * FROM `student_sub_assign` WHERE `class_id`='".$class_name."' AND `sec_id`='".$section_name."' AND `shift_id`='".$shift_name."' AND `group_id`='".$group_name."' AND `subject_id`='".$subject_name."'";
						$qry_user_admin = mysql_query($sql_user_admin);
						$i=0;
						while($row = mysql_fetch_array($qry_user_admin)){
						$i++;	
							$str = $row['student_id'];
							 $pk = str_pad($str,5,"0",STR_PAD_LEFT);
							 
							 
						$qry_having_grp = mysql_query("SELECT * FROM `tbl_full_marks` 
							   WHERE `student_name` = '".$str."' 
							   AND `class_name` = '".$class_name."' 
							   AND `section_name` = '".$section_name."' 
							   AND `shift_name` = '".$shift_name."' 
							   AND `group_name` = '".$group_name."' 
							   AND `subject_name` = '".$subject_name."' 
							   AND `exam_year` = '".$exam_year."'
							   AND `term_name` = '".$term_name."'");
						@$ct_marks1 = $ct_marks2 = @$avg = @$creative_marks = @$obj_marks = @$prac_marks = 0;
						 while($rows = mysql_fetch_array($qry_having_grp)){
							 @$ct_marks1 = $rows['ct_marks1'];
							 @$ct_marks2 = $rows['ct_marks2'];
							  @$avg = $rows['avg'];
							  @$creative_marks = $rows['creative'];
							  @$obj_marks = $rows['objective'];
							  @$prac_marks = $rows['practicle'];
						 }
	 	             ?>
						
             			
                    <tr>
                    <input type="hidden" id="student_id[<?php echo $str;?>]" class="form-control" name="student_id[<?php echo $str;?>]" value="<?php echo $row['student_id']; ?>"/>
                      
                    <input type="hidden" name="class_name" id="class_name" value="<?php echo $class_name;?>">
                    <input type="hidden" name="section_name" id="section_name" value="<?php echo $section_name;?>">
                    <input type="hidden" name="group_name" id="group_name" value="<?php echo $group_name;?>">
                    <input type="hidden" name="shift_name" id="shift_name" value="<?php echo $shift_name;?>">
                    <input type="hidden" name="subject_name" id="subject_name" value="<?php echo $subject_name;?>">
                    <input type="hidden" name="term_name" id="term_name" value="<?php echo $term_name;?>">
                    <input type="hidden" name="exam_year" id="exam_year" value="<?php echo $exam_year;?>">
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>"> 

                     <td><?php echo $pk;?> </td>
					  <?php $qry_student=mysql_query("SELECT student_id,student_name,student_class_roll FROM `tbl_student_info` WHERE student_id='".$str."'") or die(mysql_error());
					    $rw_student=mysql_fetch_array($qry_student);
					  ?>	
					 <td><?php echo $rw_student['student_name'];?></td>
                      <td><?php echo $rw_student['student_class_roll'];?></td>
                     
                     <td> <input type="text" id="ct_marks1<?php echo $str;?>" class="form-control" name="ct_marks1[<?php echo $str;?>]" value="<?php echo $ct_marks1;?>" placeholder="CT Marks 1" /></td>
                     
                     <td> <input type="text" id="ct_marks2<?php echo $str;?>" class="form-control" name="ct_marks2[<?php echo $str;?>]" value="<?php echo $ct_marks2;?>" placeholder="CT Marks 2" /></td>
                     
                     <td>
                        <select id="calculation" class="form-control span6 required" name="calculation" onchange="avg_calculate(this.value, <?php echo $str;?>)">
                          <option value="">Select an option</option>
                          <option value="1">ADD</option>
                          <option value="2">AVG</option>

                             
                        </select>
                     </td>
                        
                     <td> <input type="text" id="avg<?php echo $str;?>" class="form-control" name="avg[<?php echo $str;?>]" value="<?php echo $avg;?>" placeholder="Average" /></td>
                     
                       <td> <input type="text" id="creative_marks<?php echo $str;?>" class="form-control" name="creative_marks[<?php echo $str;?>]" value="<?php echo $creative_marks;?>" placeholder="creative marks" /></td>
                     
                     <td> <input type="text" id="obj_marks<?php echo $str;?>" class="form-control" name="obj_marks[<?php echo $str;?>]" value="<?php echo $obj_marks;?>" placeholder="obj marks" /></td>
                        
                     <td> <input type="text" id="prac_marks<?php echo $str;?>" class="form-control" name="prac_marks[<?php echo $str;?>]" value="<?php echo $prac_marks;?>" placeholder="prac marks" /></td>
                     
                   
                       
                    </tr>
                  <?php }?>
                  
                    </tbody>                    
               </table>
               
               <div class="form-actions right"><!--Begin form-actions-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-offset-3 col-md-9">
											   <button type="button" class="btn green" id="ct_marks_frm-comment"  onclick="submit_refered_commission()">&nbsp;Submit</button>                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </form>
        </div>
       </div>
      </div>
     </div>			  
					  
	<?php }?>
                  
                    </tbody>                    
               </table>
               
               
            </form>
        </div>
       </div>
      </div>
     </div>
<?php	}else{ ?>
	<div class="col-md-12 col-sm-12">
   <div class="portlet purple box">
	  <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Student Information
        </div>
	  </div>
       <div class="ct_term"> </div>
	  <div class="portlet-body">
		<div class="table-responsive">
            <form action="" method="post" id="ct_marks_frm" class="form_container left_label"enctype="multipart/form-data">
				<table class="table table-bordered table-striped table-condensed flip-content" id="sample_1">
                    <thead class="flip-content">
                       <tr>
                        <th>Student ID</th>
 						<th>Student Name</th>
                        <th>Roll No</th>
                        <th>1st mid term</th>
                        <th>2nd mid term</th>
                        <th>Calculation</th>
                        <th>Average</th>
                        <th>Creative Marks</th>
                        <th>Objective Marks</th>
                        <th>Practicle Marks</th>
                       </tr>
                    </thead>
                    <tbody>
                    <?php
					
						$sql_user_admin = "SELECT * FROM `student_sub_assign` WHERE `class_id`='".$class_name."' AND `sec_id`='".$section_name."' AND `shift_id`='".$shift_name."' AND `group_id`='".$group_name."' AND `subject_id`='".$subject_name."'";
						$qry_user_admin = mysql_query($sql_user_admin);
						$i=0;
						while($row = mysql_fetch_array($qry_user_admin)){
						$i++;	
							$str = $row['student_id'];
							 $pk = str_pad($str,5,"0",STR_PAD_LEFT);
							 
							 
						$qry_having_grp = mysql_query("SELECT * FROM `tbl_full_marks` 
							   WHERE `student_name` = '".$str."' 
							   AND `class_name` = '".$class_name."' 
							   AND `section_name` = '".$section_name."' 
							   AND `shift_name` = '".$shift_name."' 
							   AND `group_name` = '".$group_name."' 
							   AND `subject_name` = '".$subject_name."' 
							   AND `exam_year` = '".$exam_year."'
							   AND `term_name` = '".$term_name."'");
						@$ct_marks1 = $ct_marks2 = @$avg = @$creative_marks = @$obj_marks = @$prac_marks = 0;
						 while($rows = mysql_fetch_array($qry_having_grp)){
							 @$ct_marks1 = $rows['ct_marks1'];
							 @$ct_marks2 = $rows['ct_marks2'];
							  @$avg = $rows['avg'];
							  @$creative_marks = $rows['creative'];
							  @$obj_marks = $rows['objective'];
							  @$prac_marks = $rows['practicle'];
						 }
	 	             ?>
						
             			
                    <tr>
                    <input type="hidden" id="student_id[<?php echo $str;?>]" class="form-control" name="student_id[<?php echo $str;?>]" value="<?php echo $row['student_id']; ?>"/>
                      
                    <input type="hidden" name="class_name" id="class_name" value="<?php echo $class_name;?>">
                    <input type="hidden" name="section_name" id="section_name" value="<?php echo $section_name;?>">
                    <input type="hidden" name="group_name" id="group_name" value="<?php echo $group_name;?>">
                    <input type="hidden" name="shift_name" id="shift_name" value="<?php echo $shift_name;?>">
                    <input type="hidden" name="subject_name" id="subject_name" value="<?php echo $subject_name;?>">
                    <input type="hidden" name="term_name" id="term_name" value="<?php echo $term_name;?>">
                    <input type="hidden" name="exam_year" id="exam_year" value="<?php echo $exam_year;?>">
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>"> 

                     <td><?php echo $pk;?> </td>
					  <?php $qry_student=mysql_query("SELECT student_id,student_name,student_class_roll FROM `tbl_student_info` WHERE student_id='".$str."'") or die(mysql_error());
					    $rw_student=mysql_fetch_array($qry_student);
					  ?>	
					 <td><?php echo $rw_student['student_name'];?></td>
                      <td><?php echo $rw_student['student_class_roll'];?></td>
                     
                     <td> <input type="text" id="ct_marks1<?php echo $str;?>" class="form-control" name="ct_marks1[<?php echo $str;?>]" value="<?php echo $ct_marks1;?>" placeholder="CT Marks 1" /></td>
                     
                     <td> <input type="text" id="ct_marks2<?php echo $str;?>" class="form-control" name="ct_marks2[<?php echo $str;?>]" value="<?php echo $ct_marks2;?>" placeholder="CT Marks 2" /></td>
                     
                     <td>
                        <select id="calculation" class="form-control span6 required" name="calculation" onchange="avg_calculate(this.value, <?php echo $str;?>)">
                          <option value="">Select an option</option>
                          <option value="1">ADD</option>
                          <option value="2">AVG</option>

                             
                        </select>
                     </td>
                        
                     <td> <input type="text" id="avg<?php echo $str;?>" class="form-control" name="avg[<?php echo $str;?>]" value="<?php echo $avg;?>" placeholder="Average" /></td>
                     
                       <td> <input type="text" id="creative_marks<?php echo $str;?>" class="form-control" name="creative_marks[<?php echo $str;?>]" value="<?php echo $creative_marks;?>" placeholder="creative marks" /></td>
                     
                     <td> <input type="text" id="obj_marks<?php echo $str;?>" class="form-control" name="obj_marks[<?php echo $str;?>]" value="<?php echo $obj_marks;?>" placeholder="obj marks" /></td>
                        
                     <td> <input type="text" id="prac_marks<?php echo $str;?>" class="form-control" name="prac_marks[<?php echo $str;?>]" value="<?php echo $prac_marks;?>" placeholder="prac marks" /></td>
                     
                   
                       
                    </tr>
                  <?php }?>
                  
                    </tbody>                    
               </table>
               
               <div class="form-actions right"><!--Begin form-actions-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-offset-3 col-md-9">
											   <button type="button" class="btn green" id="ct_marks_frm-comment"  onclick="submit_refered_commission()">&nbsp;Submit</button>                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </form>
        </div>
       </div>
      </div>
     </div>
<?php	} ?>

     
     
     
   <div class="clearfix space5"></div>       
</div>

<script>
var avg_calculate = function(id, st){
	var ct_marks1 = parseFloat($("#ct_marks1"+st).val());	
	var ct_marks2 = parseFloat($("#ct_marks2"+st).val());
	
    if(id == 1){
		if(isNaN(ct_marks1)){
		var total = Math.round(ct_marks2);
		}
		else if(isNaN(ct_marks2)){
		var total = Math.round(ct_marks1);
		}else{
			var total = Math.round(ct_marks1 + ct_marks2);
			}
		
		
		
		
	}else if(id == 2){
		if(isNaN(ct_marks1)){
		var total = Math.round(ct_marks2/2);
		}else if(isNaN(ct_marks2)){
		var total = Math.round(ct_marks1/2);
		}else{ var total = Math.round((ct_marks1+ct_marks2)/2);	
	}
	}
    $("#avg"+st).val(total);
	
	}
	
var avg_calculate_double_1st = function(id, st){
	var ct_marks1 = parseFloat($("#double1"+st).val());	
	var ct_marks2 = parseFloat($("#double3"+st).val());
	
	var avg1 = parseFloat($("#double6"+st).val());
	
    if(id == 1){
		
		if(isNaN(ct_marks1)){
		var total = Math.round(ct_marks2);
		}
		else if(isNaN(ct_marks2)){
		var total = Math.round(ct_marks1);
		}else{
			var total = Math.round(ct_marks1 + ct_marks2);
			}
		
	
	}else if(id == 2){
		if(isNaN(ct_marks1)){
		var total = Math.round(ct_marks2/2);
		}else if(isNaN(ct_marks2)){
		var total = Math.round(ct_marks1/2);
		}else{ var total = Math.round((ct_marks1+ct_marks2)/2);	
	}
	}
    $("#double5"+st).val(total);
	
	var avg2 = total;
	
	var grnd_total = Math.round(avg1 + avg2) ;
	$("#avg_double"+st).val(grnd_total);
	
	
	}
	
var avg_calculate_double_2nd = function(id, st){
	var ct_marks1 = parseFloat($("#double2"+st).val());	
	var ct_marks2 = parseFloat($("#double4"+st).val());
	var avg1 = parseFloat($("#double5"+st).val());
    if(id == 1){
		
		if(isNaN(ct_marks1)){
		var total = Math.round(ct_marks2);
		}
		else if(isNaN(ct_marks2)){
		var total = Math.round(ct_marks1);
		}else{
			var total = Math.round(ct_marks1 + ct_marks2);
			}
		
	
	}else if(id == 2){
		if(isNaN(ct_marks1)){
		var total = Math.round(ct_marks2/2);
		}else if(isNaN(ct_marks2)){
		var total = Math.round(ct_marks1/2);
		}else{ var total = Math.round((ct_marks1+ct_marks2)/2);	
	}
	}
    $("#double6"+st).val(total);
	
	var avg2 = total;
	
	var grnd_total = Math.round(avg1 + avg2) ;
	$("#avg_double"+st).val(grnd_total);
	
	}
	
	

</script>


<script>
    var calculate_double_1st = function(st){
	var ct_marks1 = parseFloat($("#double1"+st).val());
	var ct_marks2 = parseFloat($("#double2"+st).val());
	
		
		if(isNaN(ct_marks1)){
		var add = Math.round(ct_marks2/2);
		}
		else if(isNaN(ct_marks2)){
		var add = Math.round(ct_marks1/2);
		}else{
			var add = Math.round((ct_marks1 + ct_marks2)/2);
			}

	$("#ct_marks1_double"+st).val(add);
	}
	
	var calculate_double_2nd = function(st){
	var ct_marks1 = parseFloat($("#double3"+st).val());
	var ct_marks2 = parseFloat($("#double4"+st).val());
	
		if(isNaN(ct_marks1)){
		var add = Math.round(ct_marks2/2);
		}
		else if(isNaN(ct_marks2)){
		var add = Math.round(ct_marks1/2);
		}else{
			var add = Math.round((ct_marks1 + ct_marks2)/2);
			}

	$("#ct_marks2_double"+st).val(add);
	}
	
	var calculate_double_3rd = function(st){
	var creative1 = parseFloat($("#double7"+st).val());
	var creative2 = parseFloat($("#double8"+st).val());
	
	if(isNaN(creative1)){
		var add = Math.round(creative2);
		}
		else if(isNaN(creative2)){
		var add = Math.round(creative1);
		}else{
			var add = Math.round(creative1 + creative2);
			}

	$("#creative_marks_double"+st).val(add);
	}
	
	var calculate_double_4th = function(st){
	var obj1 = parseFloat($("#double9"+st).val());
	var obj2 = parseFloat($("#double10"+st).val());
	
	if(isNaN(obj1)){
		var add = Math.round(obj2);
		}
		else if(isNaN(obj2)){
		var add = Math.round(obj1);
		}else{
			var add = Math.round(obj1 + obj2);
			}
	$("#obj_marks_double"+st).val(add);
	}
</script>

