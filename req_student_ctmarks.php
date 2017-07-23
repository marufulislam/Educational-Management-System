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
          <div id="printable_area">
            <table class="table table-bordered table-striped table-condensed flip-content" id="sample_1">
              <thead class="flip-content">
               <tr>

                 <th>Student Name</th>
                 <th>Roll No</th>
                 <?php 
                 $qry_term_select = mysql_query("SELECT * FROM `tbl_term_sector` WHERE `term_id` = '".$term_name."' AND isActive=1") or die(mysql_error());
                 while($rw_term_select = mysql_fetch_array($qry_term_select)){
                  ?>
                  <th><?php echo $rw_term_select['sector_name']?>(<?php echo $rw_term_select['exam_marks']?>)</th>

                  <?php }?>
                  <th>Percentage</th>
                  <th>20% Mark</th>
                  <th>Creative Marks</th>
                  <th>Objective Marks</th>
                  <th>Practicle Marks</th>
                  <th>Percentage</th>
                  <th>80% Mark</th>


                </tr>
              </thead>
              <tbody>
                <?php

                $sql_user_admin = "SELECT * FROM `tbl_student_info` WHERE `student_class`='".$class_name."' AND `student_section`='".$section_name."' AND `student_shift`='".$shift_name."' AND `student_group`='".$group_name."'";
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
                  @$ct_marks1 = $ct_marks2 = @$avg = @$creative_marks = @$obj_marks = @$prac_marks = @$total = 0;
                  while($rows = mysql_fetch_array($qry_having_grp)){
                    @$ct_marks1 = $rows['ct_marks1'];
                    @$ct_marks2 = $rows['ct_marks2'];
                    @$avg = $rows['avg'];
                    @$creative_marks = $rows['creative'];
                    @$obj_marks = $rows['objective'];
                    @$prac_marks = $rows['practicle'];
                    @$total = $rows['total'];

                  }
                  ?>


                  <tr class="hide<?php echo $str;?>">
                    <input type="hidden" id="student_id[<?php echo $str;?>]" class="form-control" name="student_id[<?php echo $str;?>]" value="<?php echo $row['student_id']; ?>"/>

                    <input type="hidden" name="class_name" id="class_name" value="<?php echo $class_name;?>">
                    <input type="hidden" name="section_name" id="section_name" value="<?php echo $section_name;?>">
                    <input type="hidden" name="group_name" id="group_name" value="<?php echo $group_name;?>">
                    <input type="hidden" name="shift_name" id="shift_name" value="<?php echo $shift_name;?>">
                    <input type="hidden" name="subject_name" id="subject_name" value="<?php echo $subject_name;?>">
                    <input type="hidden" name="term_name" id="term_name" value="<?php echo $term_name;?>">
                    <input type="hidden" name="exam_year" id="exam_year" value="<?php echo $exam_year;?>">
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>"> 


                    <td><?php echo $row['student_name'];?></td>
                    <td><?php echo $row['student_class_roll'];?></td>


                    <td> <input type="text" id="ct_marks1<?php echo $str;?>" class="form-control numeric" name="ct_marks1[<?php echo $str;?>]" value="<?php echo $ct_marks1;?>" placeholder="CT Marks 1" maxlength="2" /></td>

                    <td> <input type="text" id="ct_marks2<?php echo $str;?>" class="form-control numeric" name="ct_marks2[<?php echo $str;?>]" value="<?php echo $ct_marks2;?>" placeholder="CT Marks 2" maxlength="2"/></td>

                    <td>
                      <select id="calculation" class="form-control span6 required" name="calculation" onchange="mid_calculate(this.value, <?php echo $str;?>)">
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

                    <td> <input type="text" id="avg<?php echo $str;?>" class="form-control" name="avg[<?php echo $str;?>]" value="<?php echo $avg;?>" placeholder="Average" readonly="readonly"/></td>

                    <td> <input type="text" id="creative_marks<?php echo $str;?>" class="form-control numeric" name="creative_marks[<?php echo $str;?>]" value="<?php echo $creative_marks;?>" placeholder="creative marks" maxlength="2"/></td>

                    <td> <input type="text" id="obj_marks<?php echo $str;?>" class="form-control numeric" name="obj_marks[<?php echo $str;?>]" value="<?php echo $obj_marks;?>" placeholder="obj marks" maxlength="2"/></td>

                    <td> <input type="text" id="prac_marks<?php echo $str;?>" class="form-control numeric" name="prac_marks[<?php echo $str;?>]" value="<?php echo $prac_marks;?>" placeholder="prac marks" maxlength="2"/></td>
                    <td>
                      <select id="calculation" class="form-control span6 required" name="calculation" onchange="term_calculate(this.value, <?php echo $str;?>)">
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

                    <td> <input type="text" id="total<?php echo $str;?>" class="form-control" name="total[<?php echo $str;?>]" value="<?php echo $total;?>" placeholder="final marks" readonly="readonly"/></td>

                  </tr>
                  <?php }?>
                  
                  
                  
                  
                  
                  
                </tbody>                    
              </table>
              </div>

              <div class="form-actions right"><!--Begin form-actions-->
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-offset-3 col-md-4">
                      
                      <button type="button" class="btn red" id="promotion_frm-comment" onclick="print_content();">&nbsp;Print Mark Sheet</button>
                    </div>
                    <div class="col-md-5">
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





   <div class="clearfix space5"></div>       
 </div>
 <script>

  $(".numeric").keypress(function (e) {
   if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    return false;
  }
});

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

 function print_content() {
  var html_content = $("#printable_area").html();

  newwindow = window.open();
  newdocument = newwindow.document;
  newdocument.write(html_content);
  newdocument.close();

  newwindow.print();

  return false;
}

</script>	



