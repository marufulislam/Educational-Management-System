<?php

$page_title = 'User Profile';
$page_link ='';
$random_number = random_num(5);
if(isset($_SESSION['com_cbs_aaiam_school_maruf_user_email']) == true){
?>
<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
		
			
			 <div class="row"> <!-- BEGIN PAGE HEADER-->
    
        <div class="col-md-12"><!-- BEGIN PAGE TITLE & BREADCRUMB-->
        
        
            <ul class="page-breadcrumb breadcrumb">
                <li><i class="icon-home"></i><a href="<?php echo urlroute('home'); ?>">Dashboard</a><i class="icon-angle-right"></i></li>
                
                <li><?php echo $page_title;?></li>
            </ul>
        
        </div><!-- END PAGE TITLE & BREADCRUMB-->
    
    </div><!-- END PAGE HEADER-->

			<!-- BEGIN PAGE CONTENT-->
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable-line tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
								Overview </a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">
								Account </a>
							</li>
							
							
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
                            	
                                 <?php
                                                $userid = $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'] ;
												$sql_profile = "SELECT * FROM user_admin WHERE userid='".$userid."'";
												$qry_profile = mysql_query($sql_profile);
                                				while($row_profile= mysql_fetch_array($qry_profile)){
													$fullname = $row_profile['username'] ;
													$userdate = $row_profile['userdate'] ;
													$mobile = $row_profile['mobile'] ;
													$address = $row_profile['address'] ;
													$dob = $row_profile['dob'] ;
													$avatar = 'img/avatar/thumbs/small'.$row_profile['avatar'] ;
													
                                			?>
                            
                            
								<div class="row">
									<div class="col-md-3">
										<ul class="list-unstyled profile-nav">
                                        <?php if ($row_profile['avatar'] !=''){?>
											<li>
												<img src="<?php echo $avatar; ?>" class="img-responsive" alt=""/>
												
											</li>
                                            <?php }else{ ?>
                                            	 <img src="img/200px.png" alt=""/>
                                            
                                            <?php } ?>
										
										</ul>
									</div>
									<div class="col-md-9">
										<div class="row">
											<div class="col-md-8 profile-info">
												<h1><?php echo $fullname; ?></h1>
												<p>
													 <?php echo $address; ?>
												</p>
												<p>Joined :
													<a>
													<?php echo date('d M Y',strtotime($userdate));  ?> </a>
												</p>
												<ul class="list-inline">
													<?php if ($dob !=''){?>
													<li>
														<i class="fa fa-calendar"></i> <?php echo date('d-M-Y',strtotime($dob)); ?>
													</li>
                                                    <?php } ?>
													
                                                    <?php if ($dob !=''){?>
													<li>
														<i class="fa fa-phone"></i> <?php echo $mobile; ?>
													</li>
                                                    <?php } ?>
												</ul>
											</div>
											
										</div>
									
										
									</div>
								</div>
                                
                                <?php } ?>
							</div>
							<!--tab_1_2-->
							<div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									<div class="col-md-3">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li>
												<a data-toggle="tab" href="#tab_1-1">
												<i class="fa fa-cog"></i> Personal info </a>
												<span class="after">
												</span>
											</li>
											
											<li class="active">
												<a data-toggle="tab" href="#tab_3-3">
												<i class="fa fa-lock"></i> Change Password </a>
											</li>
											
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
                                          <!---------User Profile----------->
											<div id="tab_1-1" class="tab-pane">
											<form action="submit/user_management_update_submit.php" method="POST" class="form-horizontal form-bordered" id="form_sample_1">
                                            
                                            
                                  <div class="form_result">
									<?php
                                    if(isset($_REQUEST['temp'])){
                                        if($_REQUEST['temp']=="Delete"){
                                    
                                            $Deleteid = $_REQUEST['Deleteid'];
											
											$query = mysql_query("SELECT `avatar` FROM `user_admin` WHERE userid = '".$Deleteid."'");		
											$sPhoto = mysql_result($query, 0, "avatar");
											
											$path1 = 'img/avatar/'.$sPhoto;
											if(file_exists($path1) == true && $sPhoto != "") unlink($path1);
												
											$path2 = 'img/avatar/thumbs/small'.$sPhoto;
											if(file_exists($path2) == true && $sPhoto != "") unlink($path2);
                                            
                                            $sql_delete="UPDATE user_admin SET avatar='' WHERE userid='$Deleteid'";	
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
														window.location = '<?php echo urlroute('profile');?>';
													}, 3000);	
												</script>
                                                <?php
                                            }
                                            
                                        }
                                    }
                                    ?>
                                </div>
                                       
                                            <div class="Metronic-alerts alert alert-danger fade in display-hide">
                                                <button class="close" data-dismiss="alert"></button>You have some form errors. Please check below.
                                            </div>
                                            <div class="alert alert-success display-hide form_success">
                                                <button class="close" data-dismiss="alert"></button>Your form validation is successful!
                                            </div>
                                                
                                               <?php
                                                $userid = $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'] ;
												$sql_user_admin = "SELECT * FROM user_admin WHERE userid='".$userid."'";
												$qry_user_admin = mysql_query($sql_user_admin);
                                				while($rowc = mysql_fetch_array($qry_user_admin)){
													$pk = $rowc['userid'] ;
                                			?>
												
													<div class="form-group">
														<label class="control-label">Name<span class="required">*</span></label>
														<input type="text" id="fullname" class="form-control required" name="fullname" <?php if(isset($rowc['username'])) echo' value="'.$rowc['username'].'"';?> placeholder="Usesr Name" />
													</div>
                                                    
                                                    <div class="form-group">
														<label class="control-label">Username<span class="required">*</span></label>
														<input type="text" id="usr" class="form-control required" name="usr" <?php if(isset($rowc['usr_code'])) echo' value="'.$rowc['usr_code'].'"';?> placeholder="User Code" />
													</div>
													
													<div class="form-group">
														<label class="control-label">Mobile Number<span class="required">*</span></label>
														<input type="text" id="mobile" class="form-control required" name="mobile" <?php if(isset($rowc['mobile'])) echo' value="'.$rowc['mobile'].'"';?> placeholder="Mobile Number" />
													</div>
                                                    
                                                    <div class="form-group">
														<label class="control-label">Address</label>
														<textarea class="form-control autosizeme" rows="4" name="address" placeholder="Address..." data-autosize-on="true" style="overflow-y: hidden; resize: horizontal; height: 94px;" onfocus='this.select()'><?php if (isset($rowc['address'])) { echo htmlspecialchars($rowc['address']);} ?></textarea>
													</div>
                                                    
                                                     <div class="form-group">
                                                   		 <label class="control-label">Date Of Birth</label>
                                                    	
                                                          <input type="text" id="dob" class="form-control required date-picker" name="dob" 
        value="<?php if (isset($rowc["dob"])) echo $rowc["dob"]; ?>"/>
        
                                                       </div>
                                                
                                                 <!--------------------------->
                                                 
                                                 <div class="form-group">
           										 <label class="control-label">Profile Photo</label>
                                                 </div>
                                                  <div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
														
															<?php
                                                            
                                                            @$path = 'img/avatar/'.@$rowc["avatar"];
                                                            if(@$rowc["avatar"] != "" && file_exists($path)==true)
                                                            {
                                                            ?>
                                                           
                                                            
                                                            <img src="img/avatar/thumbs/small<?php echo $rowc["avatar"];?>" />
                                                    
                                                            <br />
                                                            <?php
                                                            }else{
                                                            
                                                            ?>
                                                            <img src="img/200px.png" alt=""/>
                                                            <?php } ?>                  
                                                            
           
                                                            
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															</div>
															<div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Select image 
                                                                
                                                                </span>
																<span class="fileinput-exists">
																Change </span>
																 <input type="file" name="image" id="image" class="form-control"/>
                                   								 <input name="ph" type="hidden" id="ph">
                                                                 
                                    
																</span>
                                                                
                                                                <?php
                                                            
                                                            @$path = 'img/avatar/'.@$rowc["avatar"];
                                                            if(@$rowc["avatar"] != "" && file_exists($path)==true)
                                                            {
                                                            ?>
                                                                 <a onclick="return confirm('Do you want to Delete?')"  href="<?php echo urlroute('profile'); ?>&Deleteid=<?php echo $pk;?>&temp=Delete" class="btn default fileinput-new ">
                                                                
                                                               
																Remove </a>
                                                                
                                                                <?php } ?>

                            
                           		
															</div>
														</div>
                                                        
                                                         
                                                                
                                                        
														<div class="clearfix margin-top-10">
															<span class="label label-danger">
															NOTE! </span>
															<span>    <div id="statusPhoto"></div>
															Max image size 400*300px</span>
														</div>
													</div>
                                                    
                                                     <input type="hidden" id="image_width" name="image_width" value="1200">
                               						 <input type="hidden" id="image_height" name="image_height" value="800">
                                                     <input type="hidden" id="random_number" name="random_number" <?php if(isset($random_number)) echo' value="'.$random_number.'"';?>>
                                                
                                                  <!--------------------------->
                                                
													
													
													<div class="margiv-top-10">
                                              	
                                                                <button type="submit" class="btn green" name="temp" value="Update"><i class="icon-pencil"></i>&nbsp;Update</button> 
                                                         
														 <button type="reset" class="btn red" onclick="javascript:location.replace('<?php echo urlroute($page_link); ?>')">
                                                            <i class="icon-remove"></i>&nbsp;Cancel
                                                            </button>                        
													</div>
                                                    <?php } ?>
												</form>
											</div>    <!--------End User Profile----------->
											
											
                                            <!---------Change Password----------->
                                            <div id="tab_3-3" class="tab-pane active">
												 <form action="submit/change_password_submit.php" method="POST" class="form-horizontal form-bordered form-label-stripped" id="form_sample_2" enctype="multipart/form-data" >
                                                  
                                                  <div class="form_result"> </div>
                                       
                                            <div class="Metronic-alerts alert alert-danger fade in display-hide">
                                                <button class="close" data-dismiss="alert"></button>You have some form errors. Please check below.
                                            </div>
                                            <div class="alert alert-success display-hide form_success">
                                                <button class="close" data-dismiss="alert"></button>Your form validation is successful!
                                            </div>
                                                 
                                                 
													<div class="form-group">
														<label class="control-label">Current Password</label>
														<input type="password" id="old_password" class="form-control required" name="old_password" value="<?php if (isset($rs_view["old_password"])) echo $rs_view["old_password"]; ?>"/>
													</div>
													<div class="form-group">
														<label class="control-label">New Password</label>
														 <input type="password" id="new_password" class="form-control required" name="new_password" value="<?php if (isset($rs_view["new_password"])) echo $rs_view["new_password"]; ?>"/>
													</div>
													<div class="form-group">
														<label class="control-label">Re-type New Password</label>
														 <input type="password" id="retype_password" class="form-control required" name="retype_password" value="<?php if (isset($rs_view["retype_password"])) echo $rs_view["retype_password"]; ?>" equalto="#new_password"/>
													</div>
													<div class="margin-top-10">
														 <button type="submit" class="btn green" name="temp" id="idsubmitData" value="change"><i class="icon-plus"></i>&nbsp;Change Password</button>
														  <button type="reset" class="btn red"><i class="icon-remove"></i>&nbsp;Cancel</button>
													</div>
												</form>
											</div><!---------End Change Password----------->
											
										</div>
									</div>
									<!--end col-md-9-->
								</div>
							</div>
							<!--end tab-pane-->
							
							<!--end tab-pane-->
							
							<!--end tab-pane-->
						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
        
   <div class="clearfix">
</div>
     


<link href="assets/pages/css/profile-old.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script> 
<script src="assets/scripts/form-validation.js"></script> 
<script src="assets/scripts/useravatar.js"></script> 

<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();
	handleDatePickers();
});
</script>
<?php
}else{
?>    

<script type="text/javascript">
location.replace('index.php');
</script>
<?php
}
?>
     