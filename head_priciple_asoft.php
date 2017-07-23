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
		$sql_about = "SELECT * FROM tbl_principal_message ORDER BY `message_id` DESC LIMIT 0,2";
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
							$sql_view = "SELECT * FROM tbl_principal_message WHERE message_id='$Editid';";
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
											
											$query = mysql_query("SELECT * FROM tbl_principal_message WHERE message_id = '".$Deleteid."'");		
											$sPhoto = mysql_result($query, 0, "image");
											
											$path1 = '../images/head_principle/'.$sPhoto;
											if(file_exists($path1) == true && $sPhoto != "") unlink($path1);
												
											$path2 = '../images/head_principle/thumbs/small'.$sPhoto;
											if(file_exists($path2) == true && $sPhoto != "") unlink($path2);
                                            
                                            $sql_delete="DELETE FROM tbl_principal_message WHERE message_id='".$Deleteid."'";
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
                             <label class="control-label col-md-3">Massage type</label>
                             <div class="col-md-9">
                                <select class="form-control" name="type" id="type" required="">
                                    <option value="">Select</option>
                                    <option value="1" <?php if(@$rs_view['type'] == 1) echo "selected='selected'" ;?>>Head Teacher Message</option>
                                    <option value="2" <?php if(@$rs_view['type'] == 2) echo "selected='selected'" ;?>>Chairman Message</option>
                                    
                                    
                                </select>
                                    </div>
                                </div>
                                
                                <!---------------------->
                             <div class="form-group">
                             <label class="control-label col-md-3">Name</label>
                             <div class="col-md-9">
                                 <textarea rows="4" cols="20" id="principal_name" class="form-control required " name="principal_name"><?php if (isset($rs_view["principal_name"])) echo $rs_view["principal_name"]; ?></textarea>
                                    </div>
                                </div>
                                
                                 
                                <!------------------------->
                                
                                 <div class="form-group">
                             <label class="control-label col-md-3">Picture</label>
                             <div class="col-md-9">
                                 <?php
                                    if(@$_REQUEST['temp']=="Save"||@$_REQUEST['temp']=="View"){
                                    @$path = '../images/head_principle/'.@$rs_view["principal_image"];
                                    if(@$rs_view["principal_image"] != "" && file_exists($path)==true)
                                    {
                                    ?>
                                    <p>
                                    <button type="button" class="btn">Uploaded File :&nbsp;&nbsp; <strong> <?php echo $rs_view["principal_image"];?></strong> </button>
                                    <img src="../images/head_principle/thumbs/small<?php echo $rs_view["principal_image"];?>" width="128" height="128" />
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
                                    <span class="help-block"> <strong>Image should be jpg format</strong></span>  
                                                                
									<?php
                                    }
                                    ?>
                                    </div>
                                </div>
                                
                                <!------------------------->
                                <input type="hidden" id="image_width" name="image_width" value="1200">
                                <input type="hidden" id="image_height" name="image_height" value="800">
                                
                                 <!---------------------->
                                         
                             <div class="form-group">
                             <label class="control-label col-md-3">Message</label>
                             <div class="col-md-9">
                                 <textarea rows="4" cols="20" id="principal_message" class="form-control required ckeditor" name="principal_message"><?php if (isset($rs_view["principal_message"])) echo $rs_view["principal_message"]; ?></textarea>
                                    </div>
                                </div>
                                
                                
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
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                 
                               <?php
                                $sql_user_admin = "SELECT * FROM tbl_principal_message";
                                $qry_user_admin = mysql_query($sql_user_admin);
                                while($row = mysql_fetch_array($qry_user_admin)){
									$pk = $row['message_id'];
                                ?>
                                <tr>
                                    <td><?php echo $row['principal_name']?></td>
                                     <td><a href="../images/head_principle/<?php echo $row["principal_image"];?>" class="html5lightbox" title=""><img src="../images/head_principle/thumbs/small<?php echo $row["principal_image"];?>" alt="<?php echo $row['principal_image']?>" width="64" height="64" class="thumbnail"/></a></td> 
                                      <td><?php echo $row['principal_message']?></td>                                       
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
                                    
                                    <?php if(@$row_access_acs[22] == 'Delete') {?>
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

</script>
<?php 
} else
{ 
?>  <script type="text/javascript">
location.replace('index.php');
</script>
	
<?php }?>
      
      