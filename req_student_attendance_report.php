<?php
require_once('include/connect.php');
require_once('include/functions.php');

 $class_name = $_GET['class_name'];
 $section_name = $_GET['section_name'];
 $shift_name = $_GET['shift_name'];
 $session_name = $_GET['session_name'];
 $month_name = $_GET['month_name'];
 
$qry_session = mysql_query("SELECT `session_name` FROM tbl_session WHERE `session_id`='".$session_name."'") or die(mysql_error());
 $rw_session = mysql_fetch_assoc($qry_session);
 $year = $rw_session['session_name'];
 
 $arrayDays = getDays($month_name, $session_name);
?>

<div class="col-md-12">
    <!-- BEGIN FORM widget-->
    <div class="widget box">
        <div class="blue widget-title blue">
            <h4><i class="icon-briefcase"></i>Student`s Attendance Report</h4>
        </div>
        <div class="widget-body">
            <div class="widget-tabs">
                <div class="tab-content">

                    <table id="" class="table table-striped table-bordered" cellspacing="0" style="text-align:center;">
                        <thead>
                         	<th>Roll</th>
                        	<th>Name</th>
                       
                            <?php foreach (array_keys($arrayDays) as $someDate): ?>
                                 <th><?= $someDate; ?></th>
                            <?php endforeach; ?>
                            
                        </thead>

                        <tbody>
							<?php
							$sql_student = "SELECT * FROM tbl_student_info WHERE student_class='".$class_name."' AND student_section='".$section_name."' AND student_shift='".$shift_name."'";
                            $qry_student = mysql_query($sql_student) or die(mysql_error());
							  while($rw_student=mysql_fetch_array($qry_student)){
								
							?>
                            
                                <tr class="student_name">
                                	<td id='student_name'><?php echo $rw_student['student_class_roll'];?></td>
                                    <td id='student_name'><?php echo $rw_student['student_name'];?></td>
                                    

                                    <?php foreach (array_keys($arrayDays) as $someDate): ?>
                                    	<?php
										$date_wise = $year.'-'.$month_name.'-'.$someDate;
										
                                        $qry_attendance = mysql_query("SELECT `attendance` FROM tbl_attendance WHERE unique_code='".$rw_student['testfile']."' AND entry_date='".$date_wise."'") or die(mysql_error());
										$rw_attendance = mysql_fetch_array($qry_attendance);
										
										
										if(mysql_num_rows($qry_attendance) == 0){ ?>
                                        <?php
                                        	$qry_holiday = mysql_query("SELECT `attendance` FROM tbl_attendance WHERE unique_code='holiday' AND entry_date='".$date_wise."'") or die(mysql_error());
											
											if(mysql_num_rows($qry_holiday) == 0){
												echo "<td>"."X"."</td>";
												}else{echo "<td>"."H"."</td>";}
										?>	
										
										<?php }else{?>
                                        
                                        <td><?php
											if($rw_attendance['attendance'] == 1){echo "P";}
											else if($rw_attendance['attendance'] == 0){echo "A";}
											
										
										 
										 ?></td>
                                        
                                        <?php }?>
                                        
                                    <?php endforeach; ?>
                                    
                                </tr> 
                           <?php }?>




                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- END FORM widget-->
</div>


