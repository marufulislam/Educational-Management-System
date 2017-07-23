<?php
require_once('include/connect.php');
require_once('include/functions.php');

 $department = $_GET['department'];
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
            <h4><i class="icon-briefcase"></i>teacher`s Attendance Report</h4>
        </div>
        <div class="widget-body">
            <div class="widget-tabs">
                <div class="tab-content">

                    <table id="" class="table table-striped table-bordered" cellspacing="0" style="text-align:center;">
                        <thead>
                        	<th>Name</th>
                       
                            <?php foreach (array_keys($arrayDays) as $someDate): ?>
                                 <th><?= $someDate; ?></th>
                            <?php endforeach; ?>
                            
                        </thead>

                        <tbody>
							<?php
							$sql_teacher = "SELECT * FROM tbl_teacher_registration WHERE department_id='".$department."'";
                            $qry_teacher = mysql_query($sql_teacher) or die(mysql_error());
							  while($rw_teacher=mysql_fetch_array($qry_teacher)){
								
							?>
                            
                                <tr class="student_name">
                                    <td id='student_name'><?php echo $rw_teacher['teacher_name'];?></td>
                                    

                                    <?php foreach (array_keys($arrayDays) as $someDate): ?>
                                    	<?php
										$date_wise = $year.'-'.$month_name.'-'.$someDate;
										
                                        $qry_attendance = mysql_query("SELECT `teacher_attendance` FROM tbl_attendance_teacher WHERE teacher_id='".$rw_teacher['teacher_id']."' AND entry_date='".$date_wise."'") or die(mysql_error());
										$rw_attendance = mysql_fetch_array($qry_attendance);
										
										
										if(mysql_num_rows($qry_attendance) == 0){ ?>
                                        <?php
                                        	$qry_holiday = mysql_query("SELECT `teacher_attendance` FROM tbl_attendance_teacher WHERE teacher_id='holiday' AND entry_date='".$date_wise."'") or die(mysql_error());
											
											if(mysql_num_rows($qry_holiday) == 0){
												echo "<td>"."X"."</td>";
												}else{echo "<td>"."H"."</td>";}
										?>	
										
										<?php }else{?>
                                        
                                        <td><?php
											if($rw_attendance['teacher_attendance'] == 1){echo "P";}
											else if($rw_attendance['teacher_attendance'] == 0){echo "A";}
											
										
										 
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


