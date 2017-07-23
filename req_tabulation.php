<div class="portlet-body form">
<?php
require_once('include/connect.php');
require_once('include/functions.php');

$current_class = $_GET['current_class'];
$term_name = $_GET['term_name'];
$promote_session = $_GET['promote_session'];

$uniqueToken = generateUniqueToken(10);

$qry_promote_class=mysql_query("SELECT * FROM `tbl_class` WHERE class_id='".$current_class."'") or die(mysql_error());
$rw_promote_class=mysql_fetch_array($qry_promote_class);

$qry_term=mysql_query("SELECT * FROM `tbl_term` WHERE term_id='".$term_name."'") or die(mysql_error());
$rw_term=mysql_fetch_array($qry_term);

$user_admin = mysql_query("SELECT `userid` FROM user_admin WHERE `usr_code` = '".$_SESSION['com_cbs_aaiam_school_maruf_user_email']."'") or die(mysql_error());
$rw_admin = mysql_fetch_assoc($user_admin);
?>

    <div class="col-md-12 col-sm-12">
       <div class="portlet purple box">
          <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Student Tabulation Sheet
            </div>
          </div>
           <div class="student_promotion"> </div>
          <div class="portlet-body">
            <div class="table-responsive">
                <form action="" method="" id="promotion_frm" class="form_container left_label"enctype="multipart/form-data">
                <div id="printable_area">
                    <table class="table table-bordered table-striped table-condensed flip-content" id="sample_1" border="1">
                        <thead class="flip-content">
                           <tr>
                            <th>Students</th>
                            <th>Roll</th>
                            <th>Section</th>
                            <th>Shift</th>
                                <?php
                                 $qry_subject = mysql_query("SELECT `subject_id`, `subject_name` FROM tbl_subject WHERE class_id='".$current_class."'") or die(mysql_error());
                                    while($rw_subject=mysql_fetch_array($qry_subject)){
                                ?>
                                <th><?php echo $rw_subject['subject_name']; ?></th>
                                <?php } ?>
                                <th>Total Grade</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql_students = "SELECT `student_id`, `student_section`, `student_shift`, `student_name`, `student_class_roll` FROM tbl_student_info WHERE student_class='".$current_class."' AND student_session='".$promote_session."'";
                            $qry_students = mysql_query($sql_students) or die(mysql_error());
                                while($rw_students=mysql_fetch_array($qry_students)){
                            
                        ?> 
                           <tr class="student_name">
                               <td id='student_name'><?php echo $rw_students['student_name'];?></td>
                               <td id='student_name'><?php echo $rw_students['student_class_roll'];?></td>
                               <td id='student_name'><?php
							   		$qry_sec = mysql_query("SELECT `section_name` FROM tbl_section WHERE section_id='".$rw_students['student_section']."'") or die(mysql_error());
									$rw_sec = mysql_fetch_assoc($qry_sec);
							    echo $rw_sec['section_name'];
								
								?></td>
                               <td id='student_name'><?php
							   		$qry_shift = mysql_query("SELECT `shift_name` FROM tbl_shift WHERE shift_id='".$rw_students['student_shift']."'") or die(mysql_error());
									$rw_shift = mysql_fetch_assoc($qry_shift);
							    echo $rw_shift['shift_name'];
							  
								
								?></td>
                              <?php
                                 $qry_subject1 = mysql_query("SELECT `subject_id`, `subject_name` FROM tbl_subject WHERE class_id='".$current_class."'") or die(mysql_error());
                                    while($rw_subject1=mysql_fetch_array($qry_subject1)){
                                        
                                    $qry_mark = mysql_query("SELECT * FROM tbl_full_marks WHERE student_name='".$rw_students['student_id']."' AND class_name='".$current_class."' AND subject_name='".$rw_subject1['subject_id']."' AND term_name='".$term_name."' AND exam_year='".$promote_session."'") or die(mysql_error());	
                                    $rw_mark = mysql_fetch_assoc($qry_mark);
                                        
                                ?>
                                <td><?php echo $rw_mark['integration']; ?></td>
                                
                                <?php } ?>
                                <td><?php
                                    $qry_cgpa = mysql_query("SELECT *,SUM(subject_gpa) as TotalSUM FROM tbl_full_marks WHERE student_name='".$rw_students['student_id']."' AND class_name='".$current_class."' AND term_name='".$term_name."' AND exam_year='".$promote_session."'")or die(mysql_error());
                                    $rw_cgpa = mysql_fetch_assoc($qry_cgpa);
                                 echo round(($rw_cgpa['TotalSUM']/$rw_promote_class['num_of_subject']),2); 
                                ?></td>
                           </tr> 
                        <?php }?>
                        </tbody>
                    </table>
                </div>   
                   <div class="form-actions center"><!--Begin form-actions-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-offset-3 col-md-9">
                                                   <button type="button" class="btn red" id="promotion_frm-comment" onclick="print_content();">&nbsp;Print tabulation Sheet</button>                    
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

	<script type="text/javascript">


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

	



