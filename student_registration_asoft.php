<?php
$sql_Name = "SELECT name,page_link,page_caption FROM `t_modules` where page_link='".$view."'";
$qry_Name = mysql_query($sql_Name);
$page_title = mysql_result($qry_Name, 0, "name");
$page_link = mysql_result($qry_Name, 0, "page_link");
$page_caption = mysql_result($qry_Name, 0, "page_caption");
$page_meta_key = "";
$page_meta_desc = "";
$random_number = random_num(5);
$uniqueToken = generateUniqueToken(10);
if(isset($_SESSION['com_cbs_aaiam_school_maruf_user_email']) == true)
{
	
date_default_timezone_set('Asia/Dhaka');
$cur_date = date('d/m/Y');
?>
<div class="page-content"><!-- BEGIN PAGE CONTENT-->        

    <?php /*?><div class="row"> <!-- BEGIN PAGE HEADER-->
    
        <div class="col-md-12"><!-- BEGIN PAGE TITLE & BREADCRUMB-->
        
        	<h3 class="page-title"><?php echo $page_title;?> <small><?php echo $page_caption;?></small></h3>
        
            <ul class="page-breadcrumb breadcrumb">
                <li><i class="icon-home"></i><a href="<?php echo urlroute('home'); ?>">Dashboard</a><i class="icon-angle-right"></i></li>
                
                <li><?php echo $page_title;?></li>
            </ul>
        
        </div><!-- END PAGE TITLE & BREADCRUMB-->
    
    </div><?php */?><!-- END PAGE HEADER-->
 
 
 
 

<div class="row"> <!-- BEGIN PAGE Option-->
    <div class="col-md-12">
    
        <div class="tabbable tabbable-custom boxless">
        
            <ul class="nav nav-tabs">
                 <li class="<?php if(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View") {echo "";} else{echo "active";}?>"><a href="#tab_0" data-toggle="tab">List</a></li>
                <li class="<?php if(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View") {echo "active";} else{echo "";}?>"><a href="#tab_1" data-toggle="tab">Add New</a></li>
            </ul>
    
            <div class="tab-content">
            	
                <div class="tab-pane <?php if(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View") {echo "";} else{echo "active";}?>" id="tab_0">
                	<div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>List for <?php echo $page_title;?></div>
                        </div>
                        <div class="portlet-body  flip-scroll">
                            <!-- BEGIN FORM-->
                            <form action=""  class="form-horizontal form-bordered" id="formIDdel" method="post" enctype="multipart/form-data">
                    
                            <table class="table table-bordered table-striped table-condensed flip-content" id="sample_1">
                                <thead class="flip-content">
                                    <tr>
                                     <th>ID</th>
                                        <th>Student</th>
                                        <th>Roll</th>
                                        <!--<th>Father name</th>
                                        <th>Mother Name</th>-->
                                       
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Group</th>
                                        <th>Shift</th>
                                        <th>Session</th>
                                         <th>Phone</th>
                                        <th>Student Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_user_admin = "SELECT * FROM `tbl_student_info` ORDER BY student_class_roll ASC";
                                $qry_user_admin = mysql_query($sql_user_admin);
                                while($row = mysql_fetch_array($qry_user_admin)){
									$pk = $row['student_id'];
                                ?>
                                <tr>
                                 <td><?php echo $pk;?></td>
                        <td><?php echo $row['student_name'];?></td>
                         <td><?php echo $row['student_class_roll'];?></td>
                       <?php /*?> <td><?php echo $row['student_father_name'];?></td>
                        <td><?php echo $row['student_mother_name'];?></td><?php */?>
                        
                        
                        <td>
                         <?php
			               $qry_al = mysql_query("SELECT `class_name` FROM `tbl_class` WHERE `class_id`='".$row['student_class']."'") or die(mysql_error());
						  $row_al = mysql_fetch_array($qry_al);
						  echo $row_al['class_name'];?>
                        </td>
                        <td>
                         <?php
						  $qry_sub = mysql_query("SELECT `section_name` FROM `tbl_section` WHERE `section_id`='".$row['student_section']."'") or die(mysql_error());
						  $row_sub = mysql_fetch_array($qry_sub);
						  echo $row_sub['section_name'];?>
                        </td>
                        
                         <td>
                         <?php
							$qry_ad = mysql_query("SELECT `group_name` FROM tbl_group where `group_id`='".$row['student_group']."'") or die (mysql_error());
							$row_ad = mysql_fetch_array($qry_ad);
						  echo $row_ad['group_name'];?>
                        </td>
                       
                        <td>
                         <?php
							$qry_ad = mysql_query("SELECT `shift_name` FROM tbl_shift where `shift_id`='".$row['student_shift']."'") or die (mysql_error());
							$row_ad = mysql_fetch_array($qry_ad);
						  echo $row_ad['shift_name'];?>
                        </td>
                        
                         <td>
                         <?php
							$qry_ad = mysql_query("SELECT `session_name` FROM tbl_session where `session_id`='".$row['student_session']."'") or die (mysql_error());
							$row_ad = mysql_fetch_array($qry_ad);
						  echo $row_ad['session_name'];?>
                        </td>
                        <td><?php echo $row['student_home_number'];?></td>
                        <td><a href="../images/student/<?php echo $row["student_image"];?>" class="html5lightbox" title=""><img src="../images/student/thumbs/small<?php echo $row["student_image"];?>" alt="<?php echo $row['student_image']?>" width="64" height="64" class="thumbnail"/></a></td>
                                    <td>
                                    <?php if(@$row_access_acs[3] == 'View') {?>
                                        <a 
                                        href="<?php echo urlroute($page_link); ?>&Editid=<?php echo $pk;?>&temp=View"
                                        class="btn btn-xs blue">
                                        <i class="icon-search"></i>
                                        </a>
                                    <?php }?>
                                    
                                    <?php if(@$row_access_acs[1] == 'Edit') {?>
                                        <a onclick="return confirm('Do you want to Edit?')" 
                                        href="<?php echo urlroute($page_link); ?>&Editid=<?php echo $pk;?>&temp=Save"
                                        class="btn btn-xs green">
                                        <i class="icon-edit"></i>
                                        </a>
                                    <?php }?>
                                    
                                    <?php if(@$row_access_acs[2] == 'Delete') {?>
                                        <a 	onclick="return confirm('Do you want to Delete?')" 
                                        href="<?php echo urlroute($page_link); ?>&Deleteid=<?php echo $pk;?>&temp=Delete" 
                                        class="btn btn-xs red">
                                        <i class="icon-trash"></i>
                                        </a>
                                    <?php }?>
                                    </td>
                                </tr>
                                <?php } ?>   
                                </tbody>
                            </table>    
                            
                            </form>
                            <!-- END FORM-->  
                        </div>
                    </div>
        		
                </div><!--tab_0-->
                
                <div class="tab-pane <?php if(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View") {echo "active";} else{echo "";}?>" id="tab_1">
                	<?php
					if(isset($_REQUEST['temp'])){
						if($_REQUEST['temp']=="Save" || $_REQUEST['temp']=="View"){
	
							$Editid = $_REQUEST['Editid'];
							$sql_view = "SELECT * FROM tbl_student_info WHERE student_id='$Editid';";
							$qry_view = mysql_query($sql_view) or die("Error in view ->".mysql_error());
							$rs_view = mysql_fetch_array($qry_view);
						}
					}
					?>

                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>Form for <?php echo $page_title;?></div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="submit/<?php echo $page_link;?>_submit.php" method="POST" class="form-horizontal form-bordered form-label-stripped" id="form_sample_1">
                            <div class="form-body"><!--Begin form-body-->
                                <div class="form_result">
									<?php
                                    if(isset($_REQUEST['temp'])){
                                        if($_REQUEST['temp']=="Delete"){
                                    
                                            $Deleteid = $_REQUEST['Deleteid'];
											
											$query = mysql_query("SELECT * FROM tbl_student_info WHERE student_id = '".$Deleteid."'");		
											$sPhoto = mysql_result($query, 0, "image");
											
											$path1 = '../images/student/'.$sPhoto;
											if(file_exists($path1) == true && $sPhoto != "") unlink($path1);
												
											$path2 = '../images/student/thumbs/small'.$sPhoto;
											if(file_exists($path2) == true && $sPhoto != "") unlink($path2);
                                            
                                            $sql_delete="DELETE FROM tbl_student_info WHERE student_id='".$Deleteid."'";
                                            $rs_delete=mysql_query($sql_delete);
                                            if($rs_delete){
												?>
                                                <div class="alert alert-success form_success" style="display:block !important">
                                                    <button class="close" data-dismiss="alert"></button> Information Deleted successfully.
                                                </div>
                                                <script>
													$(".form_success").hide();
													$(".form-group").slideUp();
													setTimeout(function(){ 
														$('.alert-success').slideUp('slow');
														window.location = '<?php echo urlroute($page_link);?>';
													}, 3000);	
												</script>
                                                <?php
                                            }
                                            
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="alert alert-danger display-hide form_danger">
                                    <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide form_success">
                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful!
                                </div>
                                
                           <!---------------------->
                                
                          <p style="font-size:25px;">A.Personal Details</p><hr />
                            <div class="row">
                                  <div class="col-md-12">
                                   <div class="col-md-12">
                                      <div class="form-group">
                                     <label>Official Name (as in Birth Registration or in the Passport) <span style="color:red;">* </span></label>
                                      <input type="text" id="student_name" class="form-control required" name="student_name" 
                        value="<?php if (isset($rs_view["student_name"])) echo $rs_view["student_name"]; ?>"/>
                                        
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   </div>                                   
                                </div>
                            <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                       <label>Date of Birth(yyyy-mm-dd) <span style="color:red;">* </span></label>
                                       
                                          <input type="text" id="datepicker" class="form-control required" name="student_birth" value="<?php if (isset($rs_view["student_birth"])) echo $rs_view["student_birth"]; ?>"  readonly="readonly" onchange="calculateAge(this.value)"/>
                                        
   
                                      </div>
                                   </div>
                                   <!--/span-->
                                   <div class="col-md-4">
                                          <div class="form-group">
                                           <label>Age</label>
                                            <input type="text" id="student_age" class="form-control" name="student_age" 
                        value="<?php if (isset($rs_view["student_age"])) echo $rs_view["student_age"]; ?>"/>
                                          </div>
                                        </div>
                                   <!--/span-->
                                    <div class="col-md-4">
                                      <div class="form-group">
                                      <label>Place of Birth</label>
                                    	<select id="student_birth_place" class="form-control span6" name="student_birth_place">
                                            <option value="">Select an option</option>
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_districts ORDER BY id ASC");
                                                while($obj = mysql_fetch_assoc($rs)) {
                                                  echo "<option value = '".$obj['name']."'";
                                                  if(@$rs_view['student_birth_place'] == $obj['name']) echo "selected='selected'" ; 
                                                    echo ">".$obj['name']."</option>";          
                                                } 
                                                ?>
										</select>

                                       </div>
                                     </div>
                                   <!--/span-->
                                     </div>
                                    </div>
                            <div class="row">
                                 <div class="col-md-12">
                                       <div class="col-md-4">
                                          <div class="form-group">
                                          <label>Nationality</label>
                                          <select id="student_nationality" class="form-control span6" name="student_nationality">
                                            <option value="">Select an option</option>
                                            <option value="Bangladeshi" <?php if(@$rs_view['student_nationality'] == 'Bangladeshi') echo "selected='selected'" ;?>>Bangladeshi</option>		
                                          </select>
                                    
                                          </div>
                                       </div>
                                       <!--/span-->
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label>Religion</label>
                                             <select id="student_religion" class="form-control span6" name="student_religion">
                                               
                                                <option value="Islam" <?php if(@$rs_view['student_religion'] == 'Islam') echo "selected='selected'" ;?>>Islam</option>		
                                         	 </select>
                                            
                                          </div>
                                       </div>
                                       <!--/span-->

                                        <div class="col-md-4">
                                          <div class="form-group">
                                           <label>Gender</label>
                                           <select id="student_gender" class="form-control span6" name="student_gender">
                                                <option value="">Select an option</option>
                                                <option value="Male" <?php if(@$rs_view['student_gender'] == 'Male') echo "selected='selected'" ;?>>Male</option>
                                                <option value="Female" <?php if(@$rs_view['student_gender'] == 'Female') echo "selected='selected'" ;?>>Female</option>
                                               
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                        <!--/span-->
                                    </div>
                            <div class="row">
                                   <div class="col-md-12">
                                     <div class="form-group">
                                    <div class="col-md-12">
                                    <label>Student Image <span style="color:red;">* </span></label>
                                    <?php
                                    if(@$_REQUEST['temp']=="Save"||@$_REQUEST['temp']=="View"){
                                    @$path = '../images/student/'.@$rs_view["student_image"];
                                    if(@$rs_view["student_image"] != "" && file_exists($path)==true)
                                    {
                                    ?>
                                    <p>
                                    <button type="button" class="btn">Uploaded File :&nbsp;&nbsp; <strong> <?php echo $rs_view["student_image"];?></strong> </button>
                                    <img src="../images/student/thumbs/small<?php echo $rs_view["student_image"];?>" width="128" height="128" />
                                    </p>
                                    <br />
                                    <?php
                                    }
                                    }
                                    ?>
                                    <?php
                                    if(@$_REQUEST['temp']==""||@$_REQUEST['temp']=="Save"){
                                    ?>
                                    <input type="file" name="image" id="image" class="form-control <?php if(@$_REQUEST['temp']=="") echo "required";?>"/>
                                    <input name="ph" type="hidden" id="ph">
                                    <div class="progress">
                                    	<div class="bar"></div >
                                    	<div class="percent">0%</div >
                                    </div>
                                    <div id="statusPhoto"></div>
                                                                
									<?php
                                    }
                                    ?>
                                    </div>
                                </div>
                                <input type="hidden" id="image_width" name="image_width" value="1200">
                                <input type="hidden" id="image_height" name="image_height" value="800">

                                   </div>
                                   <!--/span-->                                    
                                </div>
                           <!---------------------->     
                          <p style="font-size:25px;">B.Student Address</p><hr />
                            <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-6">
                                    <div class="form-group">
                                     <label>Present Address</label>
                                     <input type="text" id="student_pre_address" class="form-control" name="student_pre_address"                              value="<?php if (isset($rs_view["student_pre_address"])) echo $rs_view["student_pre_address"]; ?>"/>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-6">
                                      <div class="form-group">
                                       <label>Permanent Address</label>
                                       <input type="text" id="student_per_address" class="form-control" name="student_per_address"                                  value="<?php if (isset($rs_view["student_per_address"])) echo $rs_view["student_per_address"]; ?>"/>
                                      </div>
                                   </div>  
                                  </div>                                 
                                </div>
                            <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                       <label>Emergency Contact Name</label>
                                       <input type="text" id="student_emmergency_cont_name" class="form-control" name="student_emmergency_cont_name" value="<?php if (isset($rs_view["student_emmergency_cont_name"])) echo $rs_view["student_emmergency_cont_name"]; ?>"/>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Relation</label>
                                          <input type="text" id="student_emmergency_cont_relation" class="form-control" name="student_emmergency_cont_relation" value="<?php if (isset($rs_view["student_emmergency_cont_relation"])) echo $rs_view["student_emmergency_cont_relation"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Number</label>
                                         <input type="tel" id="student_emmergency_cont_number" class="form-control" name="student_emmergency_cont_number" value="<?php if (isset($rs_view["student_emmergency_cont_number"])) echo $rs_view["student_emmergency_cont_number"]; ?>" onkeypress="return moneyKeyPress(event.which?event.which:event.keyCode)"/>
                                      </div>
                                   </div> 
                                   </div>                                
                                </div>
                            <!---------------------->    
                          <p style="font-size:25px;">C.Parents Information</p><hr />
                            <div class="row">
                                   <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Father's Name</label>
                                         <input type="text" id="student_father_name" class="form-control" name="student_father_name" value="<?php if (isset($rs_view["student_father_name"])) echo $rs_view["student_father_name"]; ?>"/>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Mother's Name</label>
                                          <input type="text" id="student_mother_name" class="form-control" name="student_mother_name" value="<?php if (isset($rs_view["student_mother_name"])) echo $rs_view["student_mother_name"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Father's Occupation</label>
                                          <input type="text" id="student_father_occupation" class="form-control" name="student_father_occupation" value="<?php if (isset($rs_view["student_father_occupation"])) echo $rs_view["student_father_occupation"]; ?>"/>
                                      </div>
                                   </div>
                                   </div>                                 
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Mother's Occupation</label>
                                          <input type="text" id="student_mother_occupation" class="form-control" name="student_mother_occupation" value="<?php if (isset($rs_view["student_mother_occupation"])) echo $rs_view["student_mother_occupation"]; ?>"/>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Father's Education</label>
                                         <input type="text" id="student_father_education" class="form-control" name="student_father_education" value="<?php if (isset($rs_view["student_father_education"])) echo $rs_view["student_father_education"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Mother's Education</label>
                                         <input type="text" id="student_mother_education" class="form-control" name="student_mother_education" value="<?php if (isset($rs_view["student_mother_education"])) echo $rs_view["student_mother_education"]; ?>"/>
                                      </div>
                                   </div> 
                                  </div>                                
                                </div>
                            <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Father's Email</label>
                                        <input type="text" id="student_father_email" class="form-control" name="student_father_email" value="<?php if (isset($rs_view["student_father_email"])) echo $rs_view["student_father_email"]; ?>"/>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Mother's Email</label>
                                        <input type="text" id="student_mother_email" class="form-control" name="student_mother_email" value="<?php if (isset($rs_view["student_mother_email"])) echo $rs_view["student_mother_email"]; ?>"/>
                                      </div>
                                   </div>  
                                    <div class="col-md-4">
                                      <div class="form-group">
                                         <label>SMS/Contact number</label>
                                        <input type="text" id="student_home_number" class="form-control" name="student_home_number" value="<?php if (isset($rs_view["student_home_number"])) echo $rs_view["student_home_number"]; ?>" onkeypress="return moneyKeyPress(event.which?event.which:event.keyCode)"/>
                                      </div>
                                   </div>
                                  </div>
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label>Father's Contact(Home)</label>
                                         <input type="text" id="student_father_number" class="form-control" name="student_father_number" value="<?php if (isset($rs_view["student_father_number"])) echo $rs_view["student_father_number"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label>Mother's Contact(Home)</label>
                                         <input type="text" id="student_mother_number" class="form-control" name="student_mother_number" value="<?php if (isset($rs_view["student_mother_number"])) echo $rs_view["student_mother_number"]; ?>"/>
                                      </div>
                                   </div>
                                  </div>                                 
                                </div>
                            <?php /*?><div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                    <div class="col-md-12">
                                    <label>Parent's Image 1</label>
                                    <?php
                                    if(@$_REQUEST['temp']=="Save"||@$_REQUEST['temp']=="View"){
                                    @$path = '../images/parents/'.@$rs_view["student_parents_image1"];
                                    if(@$rs_view["student_parents_image1"] != "" && file_exists($path)==true)
                                    {
                                    ?>
                                    <p>
                                    <button type="button" class="btn">Uploaded File :&nbsp;&nbsp; <strong> <?php echo $rs_view["student_parents_image1"];?></strong> </button>
                                    <img src="../images/parents/thumbs/small<?php echo $rs_view["student_parents_image1"];?>" width="128" height="128" />
                                    </p>
                                    <br />
                                    <?php
                                    }
                                    }
                                    ?>
                                    <?php
                                    if(@$_REQUEST['temp']==""||@$_REQUEST['temp']=="Save"){
                                    ?>
                                    <input type="file" name="image" id="image" class="form-control "/>
                                    <input name="ph" type="hidden" id="ph">
                                    <div class="progress">
                                    	<div class="bar"></div >
                                    	<div class="percent">0%</div >
                                    </div>
                                    <div id="statusPhoto"></div>
                                                                
									<?php
                                    }
                                    ?>
                                    </div>
                                </div>
                                   </div>  
                                   
                                   <div class="col-md-6">
                                     <div class="form-group">
                                    <div class="col-md-12">
                                    <label>Parent's Image 2</label>
                                    <?php
                                    if(@$_REQUEST['temp']=="Save"||@$_REQUEST['temp']=="View"){
                                    @$path = '../images/parents/'.@$rs_view["student_parents_image2"];
                                    if(@$rs_view["student_parents_image2"] != "" && file_exists($path)==true)
                                    {
                                    ?>
                                    <p>
                                    <button type="button" class="btn">Uploaded File :&nbsp;&nbsp; <strong> <?php echo $rs_view["student_parents_image2"];?></strong> </button>
                                    <img src="../images/parents/thumbs/small<?php echo $rs_view["student_parents_image2"];?>" width="128" height="128" />
                                    </p>
                                    <br />
                                    <?php
                                    }
                                    }
                                    ?>
                                    <?php
                                    if(@$_REQUEST['temp']==""||@$_REQUEST['temp']=="Save"){
                                    ?>
                                    <input type="file" name="image" id="image" class="form-control "/>
                                    <input name="ph" type="hidden" id="ph">
                                    <div class="progress">
                                    	<div class="bar"></div >
                                    	<div class="percent">0%</div >
                                    </div>
                                    <div id="statusPhoto"></div>
                                                                
									<?php
                                    }
                                    ?>
                                    </div>
                                </div>
                                   </div> 
                                  </div>                                 
                                </div><?php */?>
                           <!---------------------->
                          <p style="font-size:25px;">D.Siblings Particular</p><hr />
                            <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Name</label>
                                          <input type="text" id="student_sibling_age1" class="form-control" name="student_sibling_age1" value="<?php if (isset($rs_view["student_sibling_age1"])) echo $rs_view["student_sibling_age1"]; ?>"/>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Age</label>
                                        <input type="text" id="student_sibling_age1" class="form-control" name="student_sibling_age1" value="<?php if (isset($rs_view["student_sibling_age1"])) echo $rs_view["student_sibling_age1"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                   <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Grade</label>
                                        <input type="text" id="student_sibling_grade1" class="form-control" name="student_sibling_grade1" value="<?php if (isset($rs_view["student_sibling_grade1"])) echo $rs_view["student_sibling_grade1"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                    <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Current School</label>
                                        <input type="text" id="student_sibling_currentschool1" class="form-control" name="student_sibling_currentschool1" value="<?php if (isset($rs_view["student_sibling_currentschool1"])) echo $rs_view["student_sibling_currentschool1"]; ?>"/>
                                      </div>
                                   </div> 
                                  </div>                                 
                                </div>
                            <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Name</label>
                                       <input type="text" id="student_sibling_name2" class="form-control" name="student_sibling_name2" value="<?php if (isset($rs_view["student_sibling_name2"])) echo $rs_view["student_sibling_name2"]; ?>"/>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Age</label>
                                        <input type="text" id="student_sibling_age2" class="form-control" name="student_sibling_age2" value="<?php if (isset($rs_view["student_sibling_age2"])) echo $rs_view["student_sibling_age2"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                   <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Grade</label>
                                        <input type="text" id="student_sibling_grade2" class="form-control" name="student_sibling_grade2" value="<?php if (isset($rs_view["student_sibling_grade2"])) echo $rs_view["student_sibling_grade2"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                    <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Current School</label>
                                        <input type="text" id="student_sibling_currentschool2" class="form-control" name="student_sibling_currentschool2" value="<?php if (isset($rs_view["student_sibling_currentschool2"])) echo $rs_view["student_sibling_currentschool2"]; ?>"/>
                                      </div>
                                   </div> 
                                   </div>                                
                                </div>
                            <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Name</label>
                                          <input type="text" id="student_sibling_name3" class="form-control" name="student_sibling_name3" value="<?php if (isset($rs_view["student_sibling_name3"])) echo $rs_view["student_sibling_name3"]; ?>"/>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Age</label>
                                          <input type="text" id="student_sibling_age3" class="form-control" name="student_sibling_age3" value="<?php if (isset($rs_view["student_sibling_age3"])) echo $rs_view["student_sibling_age3"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                   <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Grade</label>
                                           <input type="text" id="student_sibling_grade3" class="form-control" name="student_sibling_grade3" value="<?php if (isset($rs_view["student_sibling_grade3"])) echo $rs_view["student_sibling_grade3"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                    <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Current School</label>
                                           <input type="text" id="student_sibling_currentschool3" class="form-control" name="student_sibling_currentschool3" value="<?php if (isset($rs_view["student_sibling_currentschool3"])) echo $rs_view["student_sibling_currentschool3"]; ?>"/>
                                      </div>
                                   </div> 
                                  </div>                                
                                </div>
                            <!---------------------->    

                                <p style="font-size:25px;">E. Medical Condition</p><hr />
                                <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                         <label>Medical Condition</label>
                                         <input type="text" id="student_med_condition" class="form-control" name="student_med_condition" value="<?php if (isset($rs_view["student_med_condition"])) echo $rs_view["student_med_condition"]; ?>"/>
                                      </div>
                                   </div>  
                                    <div class="col-md-6">
                                      <div class="form-group">
                                         <label>Blood Group</label>
                                 <select id="student_blood_group" class="form-control span6" name="student_blood_group">
                                                <option value="">Select an option</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB−">AB−</option>
                                                <option value="B+">B+</option>
                                                <option value="B−">B−</option>
                                                <option value="A+">A+</option>
                                                <option value="A−">A−</option>
                                                <option value="O+">O+</option>
                                                <option value="O−">O−</option>
                                       </select>

                                      </div>
                                   </div>
                                  </div>  
                                </div>
                                
                                 <p style="font-size:25px;">F.Academic Information</p><hr />
                                <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Class <span style="color:red;">* </span></label>
                                           <select id="student_class" class="form-control span6 required" name="student_class" onchange="change_select_box(this.id,'tbl_section','tbl_section')">
                                          <option value="">Select an option</option>
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_class ORDER BY class_id ASC");
                                                while($obj = mysql_fetch_assoc($rs)) {
                                                  echo "<option value = '".$obj['class_id']."'";
                                                  if(@$rs_view['student_class'] == $obj['class_id']) echo "selected='selected'" ; 
                                                    echo ">".$obj['class_name']."</option>";          
                                                } 
                                                ?>
                                          
                                        </select> 

                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Section <span style="color:red;">* </span></label>
                                         
                                         
                                        <select id="tbl_section" class="form-control required span6" name="student_section" onchange="change_subject_box(this.id,'tbl_subject','tbl_subject')">
                                            <option value="">---Select an option---</option>
                                       </select>
                                         
                                         
                                         
                                      </div>
                                   </div>  
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label>Shift</label>
                                         <select id="tbl_shift" class="form-control span6" name="student_shift">
                                         <option value="">Select an option</option>
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_shift ORDER BY shift_id ASC");
                                                while($obj = mysql_fetch_assoc($rs)) {
                                                  echo "<option value = '".$obj['shift_id']."'";
                                                  if(@$rs_view['student_shift'] == $obj['shift_id']) echo "selected='selected'" ; 
                                                    echo ">".$obj['shift_name']."</option>";          
                                                } 
                                                ?>
                                          
                                        </select>
                                      </div>
                                   </div>
                                </div>
                                </div>
                                <div class="row"> 
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                       <label>Group</label>
                                       <select id="student_group" class="form-control span6" name="student_group"> 									
                                       		<option value="">Select an option</option>
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_group ORDER BY group_id ASC");
                                                while($obj = mysql_fetch_assoc($rs)) {
                                                 echo "<option value = '".$obj['group_id']."'";
                                                 if(@$rs_view['student_group'] == $obj['group_id']) echo "selected='selected'" ; 
                                                 echo ">".$obj['group_name']."</option>";          
                                                } 
                                                ?>
                                        </select> 

                                       
                                      </div>
                                   </div>
                                   
                                   <div id="row_dim">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Optional Subject</label>
                                         
                                         <select id="tbl_subject" class="form-control span6" name="optional_sub">
                                            <option value="">---Select an option---</option>
                                       </select>
                                      </div>
                                   </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Session</label>
                                         <select id="student_session" class="form-control span6" name="student_session">
                                          <option value="">Select an option</option>
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_session ORDER BY session_id ASC");
                                               while($obj = mysql_fetch_assoc($rs)) {
                                                echo "<option value = '".$obj['session_id']."'";
                                               if(@$rs_view['student_session'] == $obj['session_id']) echo "selected='selected'" ; 
                                                    echo ">".$obj['session_name']."</option>";          
                                                } 
                                                ?>
                                          
                                        </select> 
                                      </div>
                                   </div>  
                                    <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Class Roll</label>
                                          <input type="text" id="student_class_roll" class="form-control" name="student_class_roll" value="<?php if (isset($rs_view["student_class_roll"])) echo $rs_view["student_class_roll"]; ?>"/> 
                                      </div>
                                   </div>
                                  </div>
                                </div>
                                
                                <p style="font-size:25px;">G. Financial Aid Details</p><hr />
                                <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Financial Aid</label>
                                        <select class="form-control" name="student_financial_aid" id="student_financial_aid">
                                                    <option value="">Select</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select> 
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Admission Fee Aid</label>
                                         <input type="text" id="student_addmission_fee_aid" class="form-control" name="student_addmission_fee_aid" value="<?php if (isset($rs_view["student_addmission_fee_aid"])) echo $rs_view["student_addmission_fee_aid"]; ?>"/> 
                                      </div>
                                   </div>  
                                    <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Tuition Fee Aid</label>
                                         <input type="text" id="student_tution_fee_aid" class="form-control" name="student_tution_fee_aid" value="<?php if (isset($rs_view["student_tution_fee_aid"])) echo $rs_view["student_tution_fee_aid"]; ?>"/> 
                                      </div>
                                   </div>
                                  </div>
                                </div>
                                 <p style="font-size:25px;">H.Note (If necessary)</p><hr />
                                  <div class="row">
                                   <div class="col-md-12">
                                   <div class="col-md-12">
                                      <div class="form-group">
                                         <label>Note</label>
                                         <input type="text" id="student_note" class="form-control" name="student_note" value="<?php if (isset($rs_view["student_note"])) echo $rs_view["student_note"]; ?>"/> 
                                      </div>
                                   </div>
                                   <!--/span--> 
                                 </div> 
                                 </div>     
                             <br />
                             
                             
                              <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>">
                                <input type="hidden" id="random_number" name="random_number" <?php if(isset($random_number)) echo' value="'.$random_number.'"';?>>
                                 <input type="hidden" id="" name="testfile" <?php if(isset($uniqueToken)) echo' value="'.$uniqueToken.'"';?>>
                                
                                <input type="hidden" id="page_link" name="page_link" <?php if(isset($page_link)) echo' value="'.$page_link.'"';?>>
                                
                   				<input type="hidden" id="Editid" name="Editid" <?php if(isset($_REQUEST['Editid'])) echo' value="'.$_REQUEST['Editid'].'"';?>>
                                <!---------------------->
                                <div class="form-actions right"><!--Begin form-actions-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-offset-3 col-md-9">
											<?php
                                            if(@$_REQUEST['temp'] == "" && @$row_access_acs[0]=='Add') {
                                            ?>
                                                <button type="submit" class="btn green" name="temp" id="idsubmitData" value="Add"><i class="icon-plus"></i>&nbsp;Add</button>
                                                <button type="reset" class="btn red"><i class="icon-remove"></i>&nbsp;Cancel</button>
                                            <?php
                                            } 
                                            if(@$_REQUEST['temp']=="Save" && @$row_access_acs[1]=='Edit') {
                                            ?>	
                                                <button type="submit" class="btn blue" name="temp" id="idsubmitData" value="Update"><i class="icon-pencil"></i>&nbsp;Update</button> 
                                                <button type="reset" class="btn red"><i class="icon-remove"></i>&nbsp;Cancel</button>
                                            <?php } ?>    
											<img src="assets/img/input-spinner.gif" class="gap-right15" id="loader" style="display:none">
                                            <?php
                                            if(@$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View"){
                                            ?>
                                            <button type="button" class="btn green" onclick="window.location='<?php echo urlroute($page_link); ?>'"><i class="icon-back"></i>&nbsp;Back</button>    
                                            <?php	
                                            }
                                            ?>                       
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End form-actions-->
                            </div>  <!--End form-body--> 
                            </form>
                            <!-- END FORM-->  
                        </div>
                    </div>
                    
                	
                
                </div><!--tab_1-->
                
                
        	</div><!--tab-content-->
        </div><!--tabbable tabbable-custom boxless-->
        
    </div><!--col-md-12-->
</div> <!-- END PAGE option-->

</div><!-- END PAGE CONTENT-->


<script src="assets/scripts/form-validation.js"></script> 
<script src="http://malsup.github.com/jquery.form.js"></script> 
<script src="assets/scripts/imageUpload.js"></script> 
<link rel="stylesheet" href="assets/css/pikaday.css" />
<script src="assets/scripts/pikaday.js" type="text/javascript"></script>
<script>

	var picker = new Pikaday(
	{
		field: document.getElementById('datepicker'),
		firstDay: 1,
		minDate: new Date('2000-01-01'),
		maxDate: new Date('2020-12-31'),
		yearRange: [2000,2020]
	});

</script>
<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();
	
$(function() {
    $('#row_dim').hide(); 
});

});



var change_select_box = function(id,itemTobeloaded,tbl){
	var vl = $("#"+id).val();
	if(vl == ''){
		$('#'+itemTobeloaded+' option:not(:first)').remove().end();
	}else{
		$.getJSON("ajax_get.php?id="+vl+'&tbl='+tbl,function(data){
			var items = []
			var p = data.selectName;
			if(p == -1){
				$('#'+itemTobeloaded).html('<option value="">No data available. Choose another.</option>');
			}else{ 
				items[0] = '<option value="">Select an option</option>';
				$.each(data, function(key, val){
					items.push('<option value="'+key+'">'+val+'</option>');								
				});
				$('#'+itemTobeloaded).html(items.join(""));
			}
		});
	}
}

var change_subject_box = function(id,itemTobeloaded,tbl){
	var vl = $("#student_class").val();
	
	if(vl == ''){
		$('#'+itemTobeloaded+' option:not(:first)').remove().end();
	}else{
		$.getJSON("ajax_get.php?class_id="+vl+'&tbl='+tbl,function(data){
			var items = []
			var p = data.selectName;
			if(p == -1){
				$('#'+itemTobeloaded).html('<option value="">No data available. Choose another.</option>');
			}else{ 
				items[0] = '<option value="">Select an option</option>';
				$.each(data, function(key, val){
					items.push('<option value="'+key+'">'+val+'</option>');								
				});
				$('#'+itemTobeloaded).html(items.join(""));
			}
		});
	}
}

var calculateAge = function(birthday) {
	
    var now = new Date();
    var past = new Date(birthday);
    var nowYear = now.getFullYear();
    var pastYear = past.getFullYear();
    var age = nowYear - pastYear;
	
	$("#student_age").val(parseFloat(age));
	//alert(student_age);
   // return age;
};




</script>
<?php 
} else
{ 
?>  <script type="text/javascript">
location.replace('index.php');
</script>
	
<?php }?>
      
      
      