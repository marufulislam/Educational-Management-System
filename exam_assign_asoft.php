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
                                        <th>Term Name</th>
                                        <th>Terms Exam Name</th>
                                         <th>Exam Marks</th>
                                        
                                         <!--<th>Same as percent</th>-->
                                         <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_user_admin = "SELECT * FROM tbl_term_sector";
                                $qry_user_admin = mysql_query($sql_user_admin);
                                while($row = mysql_fetch_array($qry_user_admin)){
									$pk = $row['term_sector_id'];
									$isPublish = $row['isActive'];
                                ?>
                                <tr>
                                    <td><input type="checkbox" class="checkboxes" value="1" /></td>
                                    <td>
                                     <?php 
									  $qry_sub = mysql_query("SELECT `term_name` FROM `tbl_term` WHERE `term_id`='".$row['term_id']."'") or die(mysql_error());
						  $row_sub = mysql_fetch_array($qry_sub);
						  echo $row_sub['term_name'];?>
									
                                    </td>
                                    <td><?php echo $row['sector_name']?></td>
                                    <td><?php echo $row['exam_marks']?></td>
                                   
                                <?php /*?>    <td align="center"><span id="like-loader1<?php  echo $pk;?>">&nbsp;</span> <span id="like-panel-for-product-publish<?php  echo $pk;?>">
								    	<?php if($isPublish == 1){?>
                                    	<a href="javascript: void(0)"  id="active_product_publish-<?php  echo $pk;?>" class="active_product_publish btn default"><span class="label label-sm label label-sm label-success">
											same</span></a>
                                   	 	<?php } else {?>
                                    	<a href="javascript: void(0)" id="deactive_product_publish-<?php  echo $pk;?>" class="deactive_product_publish btn default"><span class="label label-sm label label-sm label-danger">
											different</span></a>
                                    	<?php } ?>
                                    	</span>
                                    </td>    <?php */?>
                                   
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
							$sql_view = "SELECT * FROM tbl_term_sector WHERE term_sector_id='$Editid';";
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
                                            
                                            $sql_delete="DELETE FROM tbl_term_sector WHERE term_sector_id='".$Deleteid."'";
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
                                    <label class="control-label col-md-3">Term Name</label>
                                    <div class="col-md-9">
                                       <select id="term_id" class="form-control span6 required" name="term_id">
                                          <option value="">Select an option</option>
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_term ORDER BY term_id ASC");
                                                while($obj = mysql_fetch_assoc($rs)) {
                                                  echo "<option value = '".$obj['term_id']."'";
                                                  if(@$rs_view['term_id'] == $obj['term_id']) echo "selected='selected'" ; 
                                                    echo ">".$obj['term_name']."</option>";          
                                                } 
                                                ?>
                                          
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Exam Name</label>
                                    <div class="col-md-9">
                                       <input type="text" id="sector_name" class="form-control required" name="sector_name" 
                                        value="<?php if (isset($rs_view["sector_name"])) echo $rs_view["sector_name"]; ?>"/>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-md-3">Exam Marks</label>
                                    <div class="col-md-9">
                                       <input type="text" id="exam_marks" class="form-control required" name="exam_marks" 
                                        value="<?php if (isset($rs_view["exam_marks"])) echo $rs_view["exam_marks"]; ?>"/>
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
<script src="assets/scripts/jquery.livequery.js"></script> 

<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();
});
$('.active_product_publish').livequery("click",function(e){	
			var active = '1';
			var getID = $(this).attr('id').replace('active_product_publish-','');
			$("#like-loader1"+getID).html('<img src="assets/img/input-spinner.gif" alt="" />');
			$.post("ajax_get.php?id="+getID+"&set="+active, function(response){
				$('#like-panel-for-product-publish'+getID).html('<a href="javascript: void(0)" id="deactive_product_publish-'+getID+'" class="deactive_product_publish btn default"><span class="label label-sm label label-sm label-danger">different</span></a>');
				$("#like-loader1"+getID).html('');
			});
		});
		
$('.deactive_product_publish').livequery("click",function(e){
			var deactive = '0';	
			var getID = $(this).attr('id').replace('deactive_product_publish-','');
			$("#like-loader1"+getID).html('<img src="assets/img/input-spinner.gif" alt="" />');
			$.post("ajax_get.php?id="+getID+"&set="+deactive, function(response){
				$('#like-panel-for-product-publish'+getID).html('<a href="javascript: void(0)" id="active_product_publish-'+getID+'" class="active_product_publish btn default"><span class="label label-sm label label-sm label-success">same</span></a>');
				$("#like-loader1"+getID).html('');
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
      
      
      