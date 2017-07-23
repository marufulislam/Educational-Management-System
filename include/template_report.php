<?php
$sql_Name = "SELECT name,page_link,page_caption FROM `t_modules` where page_link='".$view."'";
$qry_Name = mysql_query($sql_Name);
$page_title = mysql_result($qry_Name, 0, "name");
$page_link = mysql_result($qry_Name, 0, "page_link");
$page_caption = mysql_result($qry_Name, 0, "page_caption");
$page_meta_key = "";
$page_meta_desc = "";
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
        
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_0" data-toggle="tab">Form Actions</a></li>
                <li><a href="#tab_1" data-toggle="tab">List</a></li>
            </ul>
    
            <div class="tab-content">
            	
                <div class="tab-pane active" id="tab_0">
                	<?php
					if(isset($_REQUEST['temp'])){
						if($_REQUEST['temp']=="Save" || $_REQUEST['temp']=="View"){
	
							$Editid = $_REQUEST['Editid'];
							$sql_view = "SELECT * FROM t_modules WHERE moduleid='$Editid';";
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
                                <div class="form_result"></div>
                                <div class="alert alert-danger display-hide form_danger">
                                    <button class="close" data-dismiss="alert"></button>You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide form_success">
                                    <button class="close" data-dismiss="alert"></button>Your form validation is successful!
                                </div>
                                
                                <!---------------------->
                                <div class="form-group">
                                  	<label class="control-label col-md-3">Default Date Ranges</label>
                                  	<div class="col-md-4">
                                     	<div class="input-group" id="defaultrange">
                                        	<input type="text" class="form-control">
                                        	<span class="input-group-btn">
                                        	<button class="btn default date-range-toggle" type="button"><i class="icon-calendar"></i></button>
                                        	</span>
                                     	</div>
                                  	</div>
                               	</div>

                                
                                
                                
                   				<input type="hidden" id="Editid" name="Editid" <?php if(isset($_REQUEST['Editid'])) echo' value="'.$_REQUEST['Editid'].'"';?>>
                                <!---------------------->
                                <div class="form-actions right"><!--Begin form-actions-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-offset-3 col-md-9">
                                                <?php
                                                if(@$_REQUEST['temp']=="" && @$row_access_acs[0]=='Add') {
                                                ?>
                                                    <button type="submit" class="btn green" name="temp" id="idsubmitData" value="Add"><i class="icon-plus"></i>&nbsp;Add</button>
                                                <?php
                                                } 
                                                if(@$_REQUEST['temp']=="Save" && @$row_access_acs[1]=='Edit') {
                                                ?>	
                                                    <button type="submit" class="btn blue" name="temp" id="idsubmitData" value="Update"><i class="icon-pencil"></i>&nbsp;Update</button> 
                                                <?php } ?>    
                                                <img src="assets/img/input-spinner.gif" class="gap-right15" id="loader" style="display:none">
                                                <button type="reset" class="btn red" onclick="javascript:location.replace('<?php echo urlroute($page_link); ?>')">
                                                <i class="icon-remove"></i>&nbsp;Cancel
                                                </button>                        
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
                
                <div class="tab-pane" id="tab_1">
                
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
                                        <th>Full name</th>
                                        <th>Username</th>
                                        <th>Role</th>
                                        <th>Joined</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_user_admin = "SELECT * FROM user_admin";
                                $qry_user_admin = mysql_query($sql_user_admin);
                                while($rowc = mysql_fetch_array($qry_user_admin)){
                                ?>
                                <tr>
                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                    <td><?php echo $rowc['username']?></td>
                                    <td><a href="mailto:<?php echo $rowc['email']?>"><?php echo $rowc['email']?></a></td>
                                    
                                    <td><?php echo $rowc['role']?></td>
                                     <td class="center"><?php echo date('jS F, Y',strtotime($rowc['userdate']))?></td>
                                    <td>
                                    <?php if(@$row_access_acs[3] == 'View') {?>
                                        <a 
                                        href="<?php echo urlroute($page_link); ?>&Editid=<?php echo $rowc['userid']; ?>&temp=View"
                                        class="btn btn-xs blue">
                                        <i class="icon-search"></i>
                                        </a>
                                    <?php }?>
                                    
                                    <?php if(@$row_access_acs[1] == 'Edit') {?>
                                        <a onclick="return confirm('Do you want to Edit?')" 
                                        href="<?php echo urlroute('user_management'); ?>&Editid=<?php echo $rowc['userid']; ?>&temp=Save"
                                        class="btn btn-xs green">
                                        <i class="icon-edit"></i>
                                        </a>
                                    <?php }?>
                                    
                                    <?php if(@$row_access_acs[2] == 'Delete' && $rowc['role'] !='superadmin') {?>
                                        <a 	onclick="return confirm('Do you want to Delete?')" 
                                        href="<?php echo urlroute('user_management'); ?>&Deleteid=<?php echo $rowc['userid']; ?>&temp=Delete" 
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

</div><!-- END PAGE CONTENT-->

<link rel="stylesheet" type="text/css" href="assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" /> 
<script src="assets/scripts/form-validation.js"></script> 
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script> 
<script src="assets/scripts/handleDateRangePickers.js"></script> 
<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();
	handleDateRangePickers();
	
});
</script>

      