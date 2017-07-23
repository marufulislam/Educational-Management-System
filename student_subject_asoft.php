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
                <li class="active"><a href="#tab_0" data-toggle="tab">Form Actions</a></li>
                <li><a href="#tab_1" data-toggle="tab">List</a></li>
            </ul>
    
            <div class="tab-content">
            	
                <div class="tab-pane active" id="tab_0">
                	<?php
					if(isset($_REQUEST['temp'])){
						if($_REQUEST['temp']=="Save" || $_REQUEST['temp']=="View"){
	
							$Editid = $_REQUEST['Editid'];
							$sql_view = "SELECT * FROM student_sub_assign WHERE sub_assign_id='$Editid'";
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
                                            
                                            $sql_delete="DELETE FROM student_sub_assign WHERE sub_assign_id='".$Deleteid."'";
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
                                  <label class="control-label col-md-3">Class</label>
                                  <div class="col-md-9">
                                  	 <select id="student_class" class="form-control span6 required" name="class_id" onchange="change_select_box(this.id,'tbl_section','tbl_section')">

                                    <option value="">Select a Class</option>
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
                                    <label class="control-label col-md-3">Section Name</label>
                                    <div class="col-md-9">
                                       <select id="tbl_section" class="form-control span6 required" name="sec_id">
                                            <option value="">---Select an option---</option>
                                       </select>
                                    </div>
                                </div>
                                
                               
                                 <!---------------------->
                                <div class="form-group">
                                  <label class="control-label col-md-3">Shift</label>
                                  <div class="col-md-9">
                                    <select id="tbl_shift" class="form-control span6 required" name="shift_id">
                                     <option value="">Select a Shift</option>
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
                                 <!---------------------->
                                <div class="form-group">
                                  <label class="control-label col-md-3">Group</label>
                                  <div class="col-md-9">
                                     <select id="tbl_group" class="form-control span6 required" name="group_id" onchange="change_student_box(this.id,'tbl_student_info','tbl_student_info')">
                                      <option value="">Select a Ggroup</option>
                                     
                                          <?php 
                                           $rs = mysql_query("SELECT * FROM tbl_group ORDER BY group_id ASC");
                                            while($obj = mysql_fetch_assoc($rs)) {
                                              echo "<option value = '".$obj['group_id']."'";
                                              if(@$rs_view['group_id'] == $obj['group_id']) echo "selected='selected'" ; 
                                                echo ">".$obj['group_name']."</option>";          
                                            } 
                                            ?>
                                      
                                     </select>
                                   </div>
                                </div>
                                
                                 
                                 <!---------------------->
                                <div class="form-group">
                                    <label class="control-label col-md-3">Student Name</label>
                                    <div class="col-md-9">
                                       <select multiple="" id="tbl_student_info" class="form-control span6 required" name="student_id">
                                       </select>
                                    </div>
                                </div>
                                 <!---------------------->
                                 <div class="form-group">
                               <label class="control-label col-md-3 ">Subject Selection</label>  
                                 <div class="col-md-9">
                                  <label class="radio">
								   <input type="radio" class= "toggle required" id="individual" name="optionsRadios1" value="1" />
									  Single subject selection
								  </label>
                                  <label class="radio">
                                   <input type="radio" id="all_student" class="category_id toggle" name="optionsRadios1" value="2"/>						  All subject selection
								  </label>
                                  
                                
                                  
                                  
                                    
                                  
                                     </div>
                                  </div>
                                 
                                 <div id="single_wise" class="form-group" <?php echo "style='display:none'";?>>
                                    <label class="control-label col-md-3">Subject Assign</label>
                                    <div class="col-md-9">
                                    
                                     <select id="subject_name" class="form-control span6" name="subject_name">
                                     <option value="">Select a Subject</option>
									  <?php 
                                       $rs = mysql_query("SELECT * FROM tbl_subject ORDER BY subject_id ASC");
                                        while($obj = mysql_fetch_assoc($rs)) {
                                          echo "<option value = '".$obj['subject_id']."'";
                                          if(@$rs_view['subject_id'] == $obj['subject_id']) echo "selected='selected'" ; 
                                            echo ">".$obj['subject_name']."</option>";          
                                        } 
                                        ?>
                                    </select>
                                     
                                    </div>
                                </div>
                                 
                              <div id="multiple_wise" class="form-group" <?php echo "style='display:none'";?>>
                                    <label class="control-label col-md-3">Subject Assign</label>
                                    <div class="col-md-9">
                                    <?php
									$i=0;
									 $qry_sub=mysql_query("SELECT * FROM tbl_subject") or die(mysql_error());
									 while($rw_sub=mysql_fetch_array( $qry_sub)){
										 $pk_sub = $rw_sub['subject_id'];
									$i++;	
									?>
                                   
                                   
                                      <label class="checkbox">
                                       <input type="checkbox" value="<?php echo $rw_sub['subject_id'];?>" class="span6 m-wrap " id="subject_id[<?php echo $pk_sub;?>]" name="subject_id[<?php echo $pk_sub;?>]" />
                                      	 <?php echo $rw_sub['subject_name'];?>
                                      </label>
                                      <?php }?>              
                                            
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
                
                <div class="tab-pane" id="tab_1">
                
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>Form for <?php echo $page_title;?></div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                           
                           <form action="" method="POST" class="form-horizontal form-bordered form-label-stripped" id="form_sample_1">
                            
                         
                            <div class="form-body"><!--Begin form-body-->
                                <div class="form_result">  <!--Form Result-->    </div>
                                <div class="alert alert-danger display-hide form_danger">
                                    <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide form_success">
                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful!
                                </div>
                                
                             <!---------------------->
                               <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-2">
                                   <div class="form-group">
                                      <label class="">Class</label>
                                        <select multiple="" id="classs_name" class="form-control required" name="classs_name">
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

                                   <div class="col-md-2">
                                          <div class="form-group">
                                           <label>Section</label>
                                             <!-- <select multiple="" id="tbl_section" class="form-control required" name="section_name">
                                          
                                            </select>-->
                                            <select multiple="" id="tbln_section" class="form-control span6 required" name="sectionn_name"> 
                                           
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_section ORDER BY section_id ASC");
                                                while($obj = mysql_fetch_assoc($rs)) {
                                                  echo "<option value = '".$obj['section_id']."'";
                                                  if(@$rs_view['section_id'] == $obj['section_id']) echo "selected='selected'" ; 
                                                    echo ">".$obj['section_name']."</option>";          
                                                } 
                                                ?>
                                          
                                        </select> 
                                       </div>
                                    </div>
                                     
                                   <!--/span-->
                                    <div class="col-md-2">
                                      <div class="form-group">
                                       <label>Shift </label>
                                      <!-- <select multiple="" id="tbl_shift" class="form-control required" name="shift_name">

                                            </select>--> 
                                            
                                        <select multiple="" id="tblt_shift" class="form-control span6 required" name="shiftt_name">
                                         
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
                                   <div class="col-md-2">
                                      <div class="form-group">
                                      <label>Group</label>
                                       <select multiple="" id="tblp_group" class="form-control span6 required" name="groupp_name" onchange="change_student_box1(this.id,'tbl_studentt','tbl_student_info')">
                                         
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_group ORDER BY group_id ASC");
                                                while($obj = mysql_fetch_assoc($rs)) {
                                                  echo "<option value = '".$obj['group_id']."'";
                                                  if(@$rs_view['group_id'] == $obj['group_id']) echo "selected='selected'" ; 
                                                    echo ">".$obj['group_name']."</option>";          
                                                } 
                                                ?>
                                          
                                        </select> 

                                       </div>
                                     </div>
                                     
                                     
                                     <div class="col-md-3">
                                      <div class="form-group">
                                           <label>Student Name</label>
                                           <select multiple="" id="tbl_studentt" class="form-control span6 required" name="student_name">
                                            </select> 
                                          </div>
                                     </div>
                                     
                                   <!--/span-->
                                     </div>
                                    </div> 

                               

                               <br />
                                <!---------------------->
                                <div class="form-actions right"><!--Begin form-actions-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-offset-3 col-md-9">
                                             <button type="button" class="btn green" onclick="getScriptPage('output_div','text_content','0')" value="Search"><span>Search</span></button>
                                           
                                                <button type="reset" class="btn red"><i class="icon-remove"></i>&nbsp;reset</button>                
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
        
        <div id="order"></div>
        
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
function getScriptPage(div_id,content_id)
	{
		if (!$('#tblp_group').val()) {
            alert("Please select group name");
	  }

	   else if(!$('#tbl_studentt').val()){
		   alert("Please select student name");
		  }
	  else {	
		
		subject_id = div_id;
	//	content = document.getElementById(content_id).value;
		var dataString = 'student_name='+jQuery('#tbl_studentt').val()+'&class_name='+jQuery('#classs_name').val()+'&section_name='+jQuery('#tbln_section').val()+'&group_name='+jQuery('#tblp_group').val()+'&shift_name='+jQuery('#tblt_shift').val();
		//http.open("GET", "req_commission_report.php?" +dataString, true);
		//http.onreadystatechange = handleHttpResponse;
		//http.send(null);
		$( "#order").load( "subject_list.php?" +dataString, function() {
			  //alert( dataString );
			  //$('#widget_tab ul').idTabs(); 
			//alert( "Load was performed." );  
			});
			
	  }
	}
</script>

<script>
$('#all_student').click(function () {
	
    if ($(this).is(':checked')) {
		$("#multiple_wise").slideDown();
		$("#single_wise").slideUp();
		


    } else {

		$("#single_wise").slideUp();
		$("#multiple_wise").slideUp();


    }
});

$('#individual').click(function () {
	
    if ($(this).is(':checked')) {

		$("#single_wise").slideDown();
		$("#multiple_wise").slideUp();


    } else {

		$("#single_wise").slideUp();
		$("#multiple_wise").slideUp();


    }
});
</script>

 
<?php 
} else
{ 
?>  <script type="text/javascript">
location.replace('index.php');
</script>
	
<?php }?>
      
      
      