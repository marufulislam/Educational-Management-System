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
                                        <th>Class Name</th>
                                        <th>Class Short Form</th>
                                        <th>Number of Subject</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_user_admin = "SELECT * FROM tbl_class";
                                $qry_user_admin = mysql_query($sql_user_admin);
                                while($row = mysql_fetch_array($qry_user_admin)){
									$pk = $row['class_id'];
                                ?>
                                <tr>
                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                    <td><?php echo $row['class_name']?></td>
                                    <td><?php echo $row['class_short_form']?></td>
                                    <td><?php echo $row['num_of_subject']?></td>
                                   
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
							$sql_view = "SELECT * FROM tbl_class WHERE class_id='$Editid';";
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
                                            
                                            $sql_delete="DELETE FROM tbl_class WHERE class_id='".$Deleteid."'";
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
                                    <label class="control-label col-md-3">Class Name</label>
                                    <div class="col-md-9">
                                        <input type="text" id="class_name" class="form-control required" name="class_name" 
                                        value="<?php if (isset($rs_view["class_name"])) echo $rs_view["class_name"]; ?>"/>
                                    </div>
                                </div>
                                
                                <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Class Short Form</label>
                                    <div class="col-md-9">
                                     <input type="text" id="class_short_form" class="form-control required" name="class_short_form" value="<?php if (isset($rs_view["class_short_form"])) echo $rs_view["class_short_form"]; ?>"/>
                                    </div>
                                </div>
                                 <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Numbe of subject</label>
                                    <div class="col-md-9">
                                     <input type="text" id="num_of_subject" class="form-control required" name="num_of_subject" value="<?php if (isset($rs_view["num_of_subject"])) echo $rs_view["num_of_subject"]; ?>"/>
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
                    
                	
                
                </div><!--tab_1-->
                
                
        	</div><!--tab-content-->
        </div><!--tabbable tabbable-custom boxless-->
        
    </div><!--col-md-12-->
</div> <!-- END PAGE option-->

</div><!-- END PAGE CONTENT-->


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
      
      
      