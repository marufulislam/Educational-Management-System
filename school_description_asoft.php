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

    <div class="row"> <!-- BEGIN PAGE HEADER-->
    
        <div class="col-md-12"><!-- BEGIN PAGE TITLE & BREADCRUMB-->
        
        	<h3 class="page-title"><?php echo $page_title;?> <small><?php echo $page_caption;?></small></h3>
        
            <ul class="page-breadcrumb breadcrumb">
                <li><i class="icon-home"></i><a href="<?php echo urlroute('home'); ?>">Dashboard</a><i class="icon-angle-right"></i></li>
                
                <li><?php echo $page_title;?></li>
            </ul>
        
        </div><!-- END PAGE TITLE & BREADCRUMB-->
    
    </div><!-- END PAGE HEADER--> 
 

<div class="row"> <!-- BEGIN PAGE Option-->
    <div class="col-md-12">
    
        <div class="tabbable tabbable-custom boxless">
         <?php
		$sql_about = "SELECT * FROM req_company ORDER BY `iCompanyId` DESC LIMIT 0,1 ";
		$qry_about = mysql_query($sql_about) or die("Error in about table selection".mysql_error());
		?>

        
            <ul class="nav nav-tabs">
                
                <?php
				if(mysql_num_rows($qry_about) == 0 || @$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View"){
				?>
                <li class="active"><a href="#tab_0" data-toggle="tab">Form Actions</a></li>
                	<?php
				}
				?>
               
                <li class="<?php if(mysql_num_rows($qry_about) > 0 && @$_REQUEST['temp']!="Save" ) echo "active";?>"><a href="#tab_1" data-toggle="tab">List</a></li>
            </ul>
    
            <div class="tab-content">
            <?php
    if(mysql_num_rows($qry_about) == 0 || @$_REQUEST['temp']=="Save" || @$_REQUEST['temp']=="View" || @$_REQUEST['temp']=="Delete"){
    ?>
            	
                <div class="tab-pane active" id="tab_0">
                	<?php
					if(isset($_REQUEST['temp'])){
						if($_REQUEST['temp']=="Save" || $_REQUEST['temp']=="View"){
	
							$Editid = $_REQUEST['Editid'];
							$sql_view = "SELECT * FROM req_company WHERE iCompanyId='$Editid';";
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
                            <form enctype="multipart/form-data" action="submit/<?php echo $page_link;?>_submit.php" method="POST" class="form-horizontal form-bordered form-label-stripped" id="form_sample_1">
                            <div class="form-body"><!--Begin form-body-->
                                <div class="form_result">
									<?php
                                    if(isset($_REQUEST['temp'])){
                                        if($_REQUEST['temp']=="Delete"){
                                    
                                            $Deleteid = $_REQUEST['Deleteid'];
											
											$query = mysql_query("SELECT * FROM req_company WHERE iCompanyId = '".$Deleteid."'");		
											$sPhoto = mysql_result($query, 0, "sLogo");
											
											$path1 = '../images/'.$sPhoto;
											if(file_exists($path1) == true && $sPhoto != "") unlink($path1);
												
											$path2 = '../images/thumbs/small'.$sPhoto;
											if(file_exists($path2) == true && $sPhoto != "") unlink($path2);
                                            
                                            $sql_delete="DELETE FROM req_company WHERE iCompanyId='".$Deleteid."'";
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
                                         
                                <div class="form-group">
                                    <label class="control-label col-md-3">School Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="tComapanyName" class="form-control required" name="tComapanyName" 
                                        value="<?php if (isset($rs_view["tComapanyName"])) echo $rs_view["tComapanyName"]; ?>"/>
                                    </div>
                                </div>                  
                       
                                <!---------------------->
                                         
                                <div class="form-group">
                                    <label class="control-label col-md-3">Slogan</label>
                                    <div class="col-md-9">
                                        <input type="text" id="slogan" class="form-control required" name="slogan" 
                                        value="<?php if (isset($rs_view["slogan"])) echo $rs_view["slogan"]; ?>"/>
                                    </div>
                                </div>    
                             <!---------------------->
                                         
                                <div class="form-group">
                                    <label class="control-label col-md-3">Call Us</label>
                                    <div class="col-md-9">
                                        <input type="text" id="call_us" class="form-control required" name="call_us" 
                                        value="<?php if (isset($rs_view["call_us"])) echo $rs_view["call_us"]; ?>"/>
                                    </div>
                                </div>       

  								<!---------------------->
                                         
                                <div class="form-group">
                                    <label class="control-label col-md-3">Website</label>
                                    <div class="col-md-9">
                                        <input type="text" id="website" class="form-control required" name="website" 
                                        value="<?php if (isset($rs_view["website"])) echo $rs_view["website"]; ?>"/>
                                    </div>
                                </div>  
                                <!---------------------->

                                 <div class="form-group">
                                	<label class="control-label col-md-3">Logo</label>
                                    <div class="col-md-9">
                                    <?php
                                    if(@$_REQUEST['temp']=="Save"||@$_REQUEST['temp']=="View"){
                                    @$path = '../images/'.@$rs_view["sLogo"];
                                    if(@$rs_view["sLogo"] != "" && file_exists($path)==true)
                                    {
                                    ?>
                                    <p>
                                    <button type="button" class="btn"></button>
                                    <img src="../images/<?php echo $rs_view["sLogo"];?>" height="64" />
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
                                    <span class="help-block">Image should be 82*71px</span>                             
									<?php
                                    }
                                    ?>
                                    </div>
                                </div>
								<input type="hidden" id="image_width" name="image_width" value="1024">
                                <input type="hidden" id="image_height" name="image_height" value="450">
                                
                                
                                  <!---------------------->
                                         
                                <div class="form-group">
                                    <label class="control-label col-md-3">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" id="email" class="form-control required" name="email" 
                                        value="<?php if (isset($rs_view["email"])) echo $rs_view["email"]; ?>"/>
                                    </div>
                                </div>
                                
                                    <!---------------------->
                                         
                                <div class="form-group">
                                    <label class="control-label col-md-3">Address</label>
                                    <div class="col-md-9">
                                        <input type="text" id="address" class="form-control " name="address" 
                                        value="<?php if (isset($rs_view["address"])) echo $rs_view["address"]; ?>"/>
                                    </div>
                                </div>
                          
                                <!---------------------->
                                           
                                <div class="form-group">
                                    <label class="control-label col-md-3">Domain</label>
                                    <div class="col-md-9">
                                        <input type="text" id="domain" class="form-control required" name="domain" 
                                        value="<?php if (isset($rs_view["domain"])) echo $rs_view["domain"]; ?>"/>
                                    </div>
                                </div>                  

                               <!---------------------->
                       
                                <div class="form-group">
                                    <label class="control-label col-md-3">Paypal</label>
                                    <div class="col-md-9">
                                        <input type="text" id="paypal" class="form-control required" name="paypal" 
                                        value="<?php if (isset($rs_view["paypal"])) echo $rs_view["paypal"]; ?>"/>
                                    </div>
                                </div>       
                                
                                <!---------------------->
                                           
                                <div class="form-group">
                                    <label class="control-label col-md-3">Toll Free</label>
                                    <div class="col-md-9">
                                        <input type="text" id="toll_free" class="form-control" name="toll_free" 
                                        value="<?php if (isset($rs_view["toll_free"])) echo $rs_view["toll_free"]; ?>"/>
                                    </div>
                                </div>                  
    
                                <!---------------------->
                                           
                                <div class="form-group">
                                    <label class="control-label col-md-3">Local</label>
                                    <div class="col-md-9">
                                        <input type="text" id="local" class="form-control" name="local" 
                                        value="<?php if (isset($rs_view["local"])) echo $rs_view["local"]; ?>"/>
                                    </div>
                                </div>                  

                                <!---------------------->
                                           
                                <div class="form-group">
                                    <label class="control-label col-md-3">Fax</label>
                                    <div class="col-md-9">
                                        <input type="text" id="fax" class="form-control" name="fax" 
                                        value="<?php if (isset($rs_view["fax"])) echo $rs_view["fax"]; ?>"/>
                                    </div>
                                </div>                  

               
                         
                           
                                <!---------------------->
                                           
                                <div class="form-group">
                                    <label class="control-label col-md-3">General Information</label>
                                    <div class="col-md-9">
                                        <input type="text" id="general_info" class="form-control required" name="general_info" 
                                        value="<?php if (isset($rs_view["general_info"])) echo $rs_view["general_info"]; ?>"/>
                                    </div>
                                </div>                  

                                <!---------------------->
                                           
                           
                               <!---------------------->     
                               
                                <div class="form-group">
                                    <label class="control-label col-md-3">Google+ Link</label>
                                    <div class="col-md-9">
                                        <input type="text" id="google_link" class="form-control" name="google_link" 
                                        value="<?php if (isset($rs_view["google_link"])) echo $rs_view["google_link"]; ?>"/>
                                    </div>
                                </div>  
                               <!---------------------->     
                               
                                <div class="form-group">
                                    <label class="control-label col-md-3">Facebook Link</label>
                                    <div class="col-md-9">
                                        <input type="text" id="fb_link" class="form-control" name="fb_link" 
                                        value="<?php if (isset($rs_view["fb_link"])) echo $rs_view["fb_link"]; ?>"/>
                                    </div>
                                </div> 
                                
                               <!---------------------->     
                               
                                <div class="form-group">
                                    <label class="control-label col-md-3">Twitter Link</label>
                                    <div class="col-md-9">
                                        <input type="text" id="twitter_link" class="form-control" name="twitter_link" 
                                        value="<?php if (isset($rs_view["twitter_link"])) echo $rs_view["twitter_link"]; ?>"/>
                                    </div>
                                </div>  
                                <!------------------------->
                                
                                    <div class="form-group">
                                    <label class="control-label col-md-3">Youtube Link</label>
                                    <div class="col-md-9">
                                        <input type="text" id="linkedIn_link" class="form-control" name="linkedIn_link" 
                                        value="<?php if (isset($rs_view["linkedIn_link"])) echo $rs_view["linkedIn_link"]; ?>"/>
                                    </div>
                                </div>  
                                
                                
                                    <!------------------------->
                                
                                    <div class="form-group">
                                    <label class="control-label col-md-3">pinterest Link</label>
                                    <div class="col-md-9">
                                        <input type="text" id="pinterest_link" class="form-control" name="pinterest_link" 
                                        value="<?php if (isset($rs_view["pinterest_link"])) echo $rs_view["pinterest_link"]; ?>"/>
                                    </div>
                                </div> 
                                
                                
                                <!------------------------->
                                
                                <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>">
                                
                                <input type="hidden" id="random_number" name="random_number" <?php if(isset($random_number)) echo' value="'.$random_number.'"';?>>
                                
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
        		
                </div><!--tab_0-->
                
		<?php
        }
        ?>
                

                 <div class="tab-pane <?php if(mysql_num_rows($qry_about) > 0 && @$_REQUEST['temp']!="Save" || @$_REQUEST['temp']!="View") echo "active";?>" id="tab_1">
                
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
                                        
                                      
                                        <th>Company Name</th>
                                        <th>Slogan</th>
                                        <th>Website</th>
                                        <th>Logo</th> 
                                        <th>Address</th> 
                                        <th>Domain</th> 
                                        <th>Paypal</th>     
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 
                                <?php
                                    $sql_user_admin = "SELECT * FROM req_company";
									$qry_user_admin = mysql_query($sql_user_admin);
									while($row = mysql_fetch_array($qry_user_admin)){
                        			$pk = $row['iCompanyId'];
                                ?>
                                <tr>
                                    <td><?php echo $row['tComapanyName']?></td>
                                    <td><?php echo $row['slogan']?></td>  
                                    
                                    <td><?php echo $row['website']?></td>
                                                                                                        
                                    <td>
                                    
                                    <?php
                                     if(@$row["sLogo"] != ""){
									 ?><img src="../images/<?php echo $row["sLogo"];?>" height ='64'/>
                                     
                                     <?php
									}
									?></td>                                   
                                    
                                    <td><?php echo @$row['address'];?></td>
                                    
                                     <td><?php echo $row['domain'];?></td>
                                    <td><?php echo @$row['paypal'];?></td>
                                    
                                        
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
                                    
                                 
                                    </td>
                                </tr>
                                <?php } ?>   
                                </tbody>
                            </table>    
                            
                            </form>
                            <!-- END FORM-->  
                        </div>
                    </div>
                	
                
                </div><!--tab_1-->
                
                
        	</div><!--tab-content-->
        </div><!--tabbable tabbable-custom boxless-->
        
    </div><!--col-md-12-->
</div> <!-- END PAGE option-->

</div>

<!--Image Upload script start-->
	<script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="assets/scripts/imageUpload.js"></script> 
<!--Image Upload script End-->




	<script src="assets/scripts/form-validation.js"></script> 




<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();
	
	
});
$('.delete').click(function(e) {
	var profile = '0';
	var getID = $(this).attr('id').replace('profile-','');
	$("#deleteLoader").html('<img src="assets/img/input-spinner.gif" alt="" />');
	$.post("submit/delete.php?id="+getID+"&profile="+profile, function(response){
		$("#deleteLoader").html('');
		$("#btn-"+getID).html('');$("#btn-"+getID).hide();
	});
});
</script>
<?php 
} else
{ 
?>  <script type="text/javascript">
location.replace('index.php');
</script>
	
<?php }?>
      
      