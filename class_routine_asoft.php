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
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Shift</th>
                                        <th>Day</th>
                                        <th>Start Time</th>
                                        <th>Start Time</th>
                                        <th>Subject</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_user_admin = "SELECT * FROM tbl_student_routine";
                                $qry_user_admin = mysql_query($sql_user_admin);
                                while($row = mysql_fetch_array($qry_user_admin)){
									$pk = $row['id'];
                                ?>
                                <tr>
                                    <td><?php
									  $qry_class=mysql_query("SELECT `class_name` FROM `tbl_class` WHERE `class_id` = '".$row['class_id']."'") or die(mysql_error());
									  $row_class = mysql_fetch_array($qry_class);
									  echo $row_class['class_name'];
									
									 
									 ?></td>
                                    <td><?php
									$qry_section=mysql_query("SELECT `section_name` FROM `tbl_section` WHERE `section_id` = '".$row['section_id']."'") or die(mysql_error());
									  $row_section = mysql_fetch_array($qry_section);
									  echo $row_section['section_name'];
									
									 ?></td>
                                    <td><?php
									$qry_shift=mysql_query("SELECT `shift_name` FROM `tbl_shift` WHERE `shift_id` = '".$row['shift_id']."'") or die(mysql_error());
									  $row_shift = mysql_fetch_array($qry_shift);
									  echo $row_shift['shift_name'];
									
									 ?></td>
                                    <td><?php echo $row['day'];?></td>
                                    <td><?php echo $row['start_time']?></td>
                                    <td><?php echo $row['end_time']?></td>
                                    <td><?php echo $row['subject_id']?></td>
                   
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
							$sql_view = "SELECT * FROM tbl_student_routine WHERE id='$Editid';";
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
                                            
                                            $sql_delete="DELETE FROM tbl_student_routine WHERE id='".$Deleteid."'";
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
                                <p style="font-size:25px;">Create Student Routine</p><hr />
                              	<div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-4">
                                      <div class="form-group">
                                       <label>Class</label>
                                        <select id="student_class" class="form-control span6 required" name="class_name" onchange="change_select_box(this.id,'tbl_section','tbl_section')">
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
                                   <!--/span-->
                                   <div class="col-md-4">
                                          <div class="form-group">
                                           <label>Section</label>
                                            <select id="tbl_section" class="form-control span6 required" name="section_name" onchange="change_subject_box(this.id,'tbl_subject','tbl_subject')">
                                                <option value="">---Select an option---</option>
                                           </select>
                                          </div>
                                        </div>
                                   <!--/span-->
                                    <div class="col-md-4">
                                      <div class="form-group">
                                      <label>Shift</label>
                                    	<select id="tbl_shift" class="form-control span6" name="student_shift">
                                         <option value="">Select an option</option>
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_shift ORDER BY shift_id ASC");
                                                while($obj = mysql_fetch_assoc($rs)) {
                                                  echo "<option value = '".$obj['shift_id']."'";
                                                  if(@$rs_view['shift_id'] == $obj['shift_id']) echo "selected='selected'" ; 
                                                    echo ">".$obj['shift_name']."</option>";          
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
                                   <div class="col-md-3">
                                      <div class="form-group">
                                       <label>Day</label>
                                         <select id="day" class="form-control" name="day">
                                         	<option value="">Select a day</option>
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_weeks ORDER BY id ASC");
                                                while($obj = mysql_fetch_assoc($rs)) {
                                                  echo "<option value = '".$obj['day']."'";
                                                  if(@$rs_view['day'] == $obj['day']) echo "selected='selected'" ; 
                                                    echo ">".$obj['day']."</option>";          
                                                } 
                                                ?>
                                        </select>
                                      </div>
                                   </div>
                                   <!--/span-->
                                   <div class="col-md-3">
                                          <div class="form-group">
                                           <label>Start Time</label>
                                            <input type="text" class="form-control" placeholder="Select Time" name="start_time" id="timepicker.[1]" value="<?php if (isset($rs_view["start_time"])) echo $rs_view["start_time"]; ?>"/>
                                           
                                          </div>
                                        </div>
                                   <!--/span-->
                                    <div class="col-md-3">
                                      <div class="form-group">
                                      <label>End Time</label>
                                    	 <input type="text" id="timepicker.[2]" class="form-control" name="end_time" placeholder="End Time" value="<?php if (isset($rs_view["end_time"])) echo $rs_view["end_time"]; ?>"/>
                                       </div>
                                     </div>
                                   <!--/span-->
                                   <div class="col-md-3">
                                      <div class="form-group">
                                      <label>Subject</label>
                                    	<select id="tbl_subject" class="form-control span6 required" name="subject">
                                            <option value="">---Select an option---</option>
                                       </select>
                                       </div>
                                     </div>
                                     </div>
                                    </div>
                                    
                                
                                <br />
                                 
                                
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
    <link rel="stylesheet" href="timepic/jquery.ui.timepicker.css" type="text/css" />
    <link rel="stylesheet" href="timepic/ui-1.10.0/ui-lightness/jquery-ui-1.10.0.custom.min.css" type="text/css" />
    <script type="text/javascript" src="timepic/ui-1.10.0/jquery.ui.core.min.js"></script>
    <script type="text/javascript" src="timepic/jquery.ui.timepicker.js?v=0.3.3"></script>
<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();
});

$(document).ready(function() {
	$('#timepicker\\.\\[1\\]').timepicker( {
		showAnim: 'blind'
	} );

});

$(document).ready(function() {
	$('#timepicker\\.\\[2\\]').timepicker( {
		showAnim: 'blind'
	} );

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
</script>
<?php 
} else
{ 
?>  <script type="text/javascript">
location.replace('index.php');
</script>
	
<?php }?>
      
      
      