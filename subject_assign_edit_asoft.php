<?php
$sql_Name = "SELECT name,page_link,page_caption FROM `t_modules` where page_link='".$view."'";
$qry_Name = mysql_query($sql_Name);
@$page_title = mysql_result($qry_Name, 0, "name");
@$page_link = mysql_result($qry_Name, 0, "page_link");
@$page_caption = mysql_result($qry_Name, 0, "page_caption");
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
    
            <div class="tab-content">
            	
                <div class="tab-pane active" id="tab_0">
                	<?php
					if(isset($_REQUEST['temp'])){
						if($_REQUEST['temp']=="Save" || $_REQUEST['temp']=="View"){
	
							$Editid = $_REQUEST['Editid'];
							$sql_view = "SELECT * FROM tbl_subject WHERE subject_id='$Editid';";
							$qry_view = mysql_query($sql_view) or die("Error in view ->".mysql_error());
							$rs_view = mysql_fetch_array($qry_view);
						}
					}
					?>

                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>Update Subject</div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="submit/subject_assign_edit_submit.php" method="POST" class="form-horizontal form-bordered form-label-stripped" id="form_sample_1">
                            <div class="form-body"><!--Begin form-body-->
                                <div class="form_result"></div>
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
                                    <select id="class_id" class="form-control span6 required" name="class_id">
                                           <option value="">Select an option</option>
										   <?php 
                                           $rs = mysql_query("SELECT * FROM tbl_class ORDER BY class_id ASC");
                                            while($obj = mysql_fetch_assoc($rs)) {
                                              echo "<option value = '".$obj['class_id']."'";
                                              if(@$rs_view['class_id'] == $obj['class_id']) echo "selected='selected'" ; 
                                                echo ">".$obj['class_name']."</option>";          
                                            } 
                                            ?>
                                          
                                      </select>
                                       
                                    </div>
                                </div>
                                 <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Subject Name</label>
                                    <div class="col-md-9">
                                    <input type="text" id="subject_name" class="form-control required" name="subject_name" 
                                        value="<?php if (isset($rs_view["subject_name"])) echo $rs_view["subject_name"]; ?>"/>
                                       
                                    </div>
                                </div>
                                 <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Subject Code</label>
                                    <div class="col-md-9">
                                    <input type="text" id="subject_code" class="form-control required" name="subject_code" 
                                        value="<?php if (isset($rs_view["subject_code"])) echo $rs_view["subject_code"]; ?>"/>
                                       
                                    </div>
                                </div>
                                 <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Pass Mark(Under Nine)</label>
                                    <div class="col-md-9">
                                    <input type="text" id="pass_marks_under" class="form-control required" name="pass_marks_under" 
                                        value="<?php if (isset($rs_view["pass_marks_under"])) echo $rs_view["pass_marks_under"]; ?>"/>
                                       
                                    </div>
                                </div>
                                 <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Creative Pass Mark</label>
                                    <div class="col-md-9">
                                    <input type="text" id="cr_pass_marks" class="form-control required" name="cr_pass_marks" 
                                        value="<?php if (isset($rs_view["cr_pass_marks"])) echo $rs_view["cr_pass_marks"]; ?>"/>
                                       
                                    </div>
                                </div>
                                 <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Obj Pass Mark</label>
                                    <div class="col-md-9">
                                    <input type="text" id="ob_pass_marks" class="form-control required" name="ob_pass_marks" 
                                        value="<?php if (isset($rs_view["ob_pass_marks"])) echo $rs_view["ob_pass_marks"]; ?>"/>
                                       
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
        	</div><!--tab-content-->
        </div><!--tabbable tabbable-custom boxless-->
        
    </div><!--col-md-12-->
</div> <!-- END PAGE option-->

</div><!-- END PAGE CONTENT-->


<script src="assets/scripts/form-validation.js"></script> 
<script type="text/javascript" src="assets/plugins/sheepit/jquery.sheepit.min.js"></script>

<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();
	
});
$('#event_cloning').sheepIt({separator: ''});
</script>
<?php 
} else
{ 
?>  <script type="text/javascript">
location.replace('index.php');
</script>
	
<?php }?>

<?php /*?> <input type="text" id="subject_name" class="form-control required" name="subject_name" 
 value="<?php if (isset($rs_view["subject_name"])) echo $rs_view["subject_name"]; ?>"/><?php */?>
      
      
      