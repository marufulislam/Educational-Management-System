<?php
$sql_Name = "SELECT name,page_link,page_caption FROM `t_modules` where page_link='".$view."'";
$qry_Name = mysql_query($sql_Name);
$page_title = mysql_result($qry_Name, 0, "name");
$page_link = mysql_result($qry_Name, 0, "page_link");
$page_caption = mysql_result($qry_Name, 0, "page_caption");
$page_meta_key = "";
$page_meta_desc = "";
$random_number = random_num(5);
if(isset($_SESSION['com_cbs_aaiam_school_maruf_user_email']) == true)
{
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
                                        <th><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                        <th>Teacher OR Staff</th>
                                        <th>Contact</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_user_admin = "SELECT * FROM tbl_teacher_registration";
                                $qry_user_admin = mysql_query($sql_user_admin);
                                while($row = mysql_fetch_array($qry_user_admin)){
									$pk = $row['teacher_id'];
                                ?>
                                <tr>
                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                    <td><?php echo $row['teacher_name']?></td>
                                    <td><?php echo $row['present_contact']?></td>
                                    <td><a href="../images/teacher_staff/<?php echo $row["teacher_image"];?>" class="html5lightbox" title=""><img src="../images/teacher_staff/thumbs/small<?php echo $row["teacher_image"];?>" alt="<?php echo $row['teacher_image']?>" width="64" height="64" class="thumbnail"/></a></td> 
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
							$sql_view = "SELECT * FROM tbl_teacher_registration WHERE teacher_id='$Editid';";
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
											
											$query = mysql_query("SELECT * FROM tbl_teacher_registration WHERE teacher_id = '".$Deleteid."'");		
											$sPhoto = mysql_result($query, 0, "image");
											
											$path1 = '../images/teacher_staff/'.$sPhoto;
											if(file_exists($path1) == true && $sPhoto != "") unlink($path1);
												
											$path2 = '../images/teacher_staff/thumbs/small'.$sPhoto;
											if(file_exists($path2) == true && $sPhoto != "") unlink($path2);
                                            
                                            $sql_delete="DELETE FROM tbl_teacher_registration WHERE teacher_id='".$Deleteid."'";
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
                                     <label>Official Name (as in Birth Registration or in the Passport) </label>
                                      <input type="text" id="teacher_name" class="form-control required" name="teacher_name" 
                        value="<?php if (isset($rs_view["teacher_name"])) echo $rs_view["teacher_name"]; ?>"/>
                                        
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   </div>                                   
                                </div>
                               <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                       <label>Husband/Wife Name</label>
                                      <input type="text" id="husband_name" class="form-control" name="husband_name" 
                                    value="<?php if (isset($rs_view["husband_name"])) echo $rs_view["husband_name"]; ?>"/>
                                        
                                      </div>
                                   </div>
                                   <!--/span-->
                                   <div class="col-md-4">
                                          <div class="form-group">
                                           <label>Father's name</label>
                                            <input type="text" id="father_name" class="form-control required" name="father_name" 
                        value="<?php if (isset($rs_view["father_name"])) echo $rs_view["father_name"]; ?>"/>
                                          </div>
                                        </div>
                                   <!--/span-->
                                    <div class="col-md-4">
                                      <div class="form-group">
                                      <label>Mother's name</label>
                                      <input type="text" id="mother_name" class="form-control required" name="mother_name" 
                value="<?php if (isset($rs_view["mother_name"])) echo $rs_view["mother_name"]; ?>"/>
                                       </div>
                                     </div>
                                   <!--/span-->
                                     </div>
                                    </div>
                               <div class="row">
                                 <div class="col-md-12">
                                       <div class="col-md-4">
                                          <div class="form-group">
                                          <label>Date of Birth</label>
                                     <input type="text" id="birth_date" class="form-control required date-picker" name="birth_date" 
        value="<?php if (isset($rs_view["birth_date"])) echo $rs_view["birth_date"]; ?>"/>
                                          </div>
                                       </div>
                                       <!--/span-->
                                       <div class="col-md-4">
                                          <div class="form-group">
                                             <label>Gender</label>
                                            <select id="gender" class="form-control span6 required" name="gender">
                                                <option value="">Select an option</option>
                                               <option value="Male" <?php if(@$rs_view['gender'] == 'Male') echo "selected='selected'" ;?>>Male</option>
                                               <option value="Female" <?php if(@$rs_view['gender'] == 'Female') echo "selected='selected'" ;?>>Female</option>
                                            </select>
                                          </div>
                                       </div>
                                       <!--/span-->

                                        <div class="col-md-4">
                                          <div class="form-group">
                                           <label>Marital Status</label>
                                           <select id="marital_status" class="form-control span6 required" name="marital_status">
                                                <option value="">Select an option</option>
                                                <option value="Married" <?php if(@$rs_view['marital_status'] == 'Married') echo "selected='selected'" ;?>>Married</option>
                                                <option value="Unmarried" <?php if(@$rs_view['marital_status'] == 'Unmarried') echo "selected='selected'" ;?>>Unmarried</option>
                                               
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                        <!--/span-->
                                    </div>
                                    
                             <!---------------------->     
                             <p style="font-size:25px;">B.Permanent Address</p><hr />
                            
                            <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                       <label>Address</label>
                                       <input type="text" id="permanent_address" class="form-control required" name="permanent_address" value="<?php if (isset($rs_view["permanent_address"])) echo $rs_view["permanent_address"]; ?>"/>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Thana</label>
                                          <input type="text" id="permanent_thana" class="form-control required" name="permanent_thana" value="<?php if (isset($rs_view["permanent_thana"])) echo $rs_view["permanent_thana"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>District</label>
                                         <input type="tel" id="permanent_district" class="form-control required" name="permanent_district" value="<?php if (isset($rs_view["permanent_district"])) echo $rs_view["permanent_district"]; ?>"/>
                                      </div>
                                   </div> 
                                   </div>                                
                                </div> 
                                
                             <!---------------------->     
                             <p style="font-size:25px;">B.Present Address</p><hr />
                            
                            <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                       <label>Address</label>
                                       <input type="text" id="present_address" class="form-control required" name="present_address" value="<?php if (isset($rs_view["present_address"])) echo $rs_view["present_address"]; ?>"/>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Thana</label>
                                          <input type="text" id="present_thana" class="form-control required" name="present_thana" value="<?php if (isset($rs_view["present_thana"])) echo $rs_view["present_thana"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>District</label>
                                         <input type="tel" id="present_district" class="form-control required" name="present_district" value="<?php if (isset($rs_view["present_district"])) echo $rs_view["present_district"]; ?>"/>
                                      </div>
                                   </div> 
                                   </div>                                
                                </div> 
                                
                                <!---------------------->     
                             <p style="font-size:25px;">C.Other Information</p><hr />
                            
                            <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                       <label>Account Number</label>
                                       <input type="text" id="account_number" class="form-control required" name="account_number" value="<?php if (isset($rs_view["account_number"])) echo $rs_view["account_number"]; ?>"/>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Religion</label>
                                          <input type="text" id="religion" class="form-control required" name="religion" value="<?php if (isset($rs_view["religion"])) echo $rs_view["religion"]; ?>"/>
                                      </div>
                                   </div>  
                                   
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Nationality</label>
                                         <input type="tel" id="nationality" class="form-control required" name="nationality" value="<?php if (isset($rs_view["nationality"])) echo $rs_view["nationality"]; ?>"/>
                                      </div>
                                   </div> 
                                   </div>                                
                                </div> 
                                <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                       <label>National ID Card No.</label>
                                       <input type="text" id="national_id_card_no" class="form-control required" name="national_id_card_no" value="<?php if (isset($rs_view["national_id_card_no"])) echo $rs_view["national_id_card_no"]; ?>"/>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Blood group</label>
                                          <select class="form-control" name="blood_group" id="blood_group">
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
                                   
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>E-Mail</label>
                                         <input type="tel" id="email" class="form-control required" name="email" value="<?php if (isset($rs_view["email"])) echo $rs_view["email"]; ?>"/>
                                      </div>
                                   </div> 
                                   </div>                                
                                </div> 
                                
                                <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                       <label>Department</label>
                                      <select id="department_id" class="form-control span6 required" name="department_id">
                                            <option value="">Select Category</option>
                                            <?php
                                            $query_ = "SELECT * FROM tbl_department ORDER BY department_id ASC ";					
                                            $result_ = mysql_query($query_);
                                            while($row_ = mysql_fetch_array($result_)){
                                                $id =  $row_['department_id'];
                                                $name = $row_['department_name'];		
                                                echo "<option value = '$id'";
                                                if(@$rs_view['department_id'] == $id) echo "selected='selected'" ; 
                                                echo "> $name </option>";            
                                            }
                                            ?>  
                                        </select>
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Designation</label>
                                           <select id="designation_id" class="form-control span6 required" name="designation_id">
                                            <option value="">Select Category</option>
                                            <?php
                                            $query_ = "SELECT * FROM tbl_designation ORDER BY designation_id ASC ";					
                                            $result_ = mysql_query($query_);
                                            while($row_ = mysql_fetch_array($result_)){
                                                $id =  $row_['designation_id'];
                                                $name = $row_['designation_name'];		
                                                echo "<option value = '$id'";
                                                if(@$rs_view['designation_id'] == $id) echo "selected='selected'" ; 
                                                echo "> $name </option>";            
                                            }
                                            ?>  
                                        </select>
                                      </div>
                                   </div>  
                                   
                                   <div class="col-md-4">
                                      <div class="form-group">
                                         <label>Date of Joining</label>
                                         <input type="tel" id="joining_date" class="form-control required date-picker" name="joining_date" value="<?php if (isset($rs_view["joining_date"])) echo $rs_view["joining_date"]; ?>"/>
                                      </div>
                                   </div> 
                                   </div>                                
                                </div>
                                
                                <div class="row">
                                  <div class="col-md-12">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                     <label>Contact Number </label>
                                     <input type="text" id="present_contact" class="form-control required" name="present_contact" 
                        value="<?php if (isset($rs_view["present_contact"])) echo $rs_view["present_contact"]; ?>"/>
                                        
                                      </div>
                                   </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                     <label>Photo</label>
                                      <?php
                                    if(@$_REQUEST['temp']=="Save"||@$_REQUEST['temp']=="View"){
                                    @$path = '../images/teacher_staff/'.@$rs_view["teacher_image"];
                                    if(@$rs_view["teacher_image"] != "" && file_exists($path)==true)
                                    {
                                    ?>
                                    <p>
                                    <button type="button" class="btn">Uploaded File :&nbsp;&nbsp; <strong> <?php echo $rs_view["teacher_image"];?></strong> </button>
                                    <img src="../images/teacher_staff/thumbs/small<?php echo $rs_view["teacher_image"];?>" width="128" height="128" />
                                    </p>
                                    <br />
                                    <?php
                                    }
                                    }
                                    ?>
                                    <?php
                                    if(@$_REQUEST['temp']==""||@$_REQUEST['temp']=="Save"){
                                    ?>
                                    <input type="file" name="image" id="image" class="form-control"/>
                                    <input name="ph" type="hidden" id="ph">
                                    <div class="progress">
                                    	<div class="bar"></div >
                                    	<div class="percent">0%</div >
                                    </div>
                                    <div id="statusPhoto"></div>
                                                                
									<?php
                                    }
                                    ?>
                                      <input type="hidden" id="image_width" name="image_width" value="1200">
                                <input type="hidden" id="image_height" name="image_height" value="800">   
                                      </div>
                                   </div>
                                   <!--/span--> 
                                   </div>                                   
                                </div>      
                                    
                           <!----------------------> 
                           
                            <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>">    
                                <input type="hidden" id="random_number" name="random_number" <?php if(isset($random_number)) echo' value="'.$random_number.'"';?>>
                                
                                <input type="hidden" id="page_link" name="page_link" <?php if(isset($page_link)) echo' value="'.$page_link.'"';?>>
                                
                   				<input type="hidden" id="Editid" name="Editid" <?php if(isset($_REQUEST['Editid'])) echo' value="'.$_REQUEST['Editid'].'"';?>>
                                <br />
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

<script src="http://malsup.github.com/jquery.form.js"></script> 
<script src="assets/scripts/imageUpload.js"></script> 
<script src="assets/scripts/form-validation.js"></script> 


<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();
	handleDatePickers();
});
</script>
<?php 
} else
{ 
?>  <script type="text/javascript">
location.replace('index.php');
</script>
	
<?php }?>
      
      
      