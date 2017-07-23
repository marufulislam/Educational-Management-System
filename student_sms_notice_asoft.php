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

                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>Form for <?php echo $page_title;?></div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="submit/<?php echo $page_link;?>_submit.php" method="POST" class="form-horizontal form-bordered form-label-stripped" id="form_sample_1">
                            <div class="form-body"><!--Begin form-body-->
                                <div class="form_result"> </div>
                                <div class="alert alert-danger display-hide form_danger">
                                    <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-hide form_success">
                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful!
                                </div>
                                
                                <!---------------------->
                              <div class="form-group">
                               <label class="control-label col-md-3 ">SMS for student</label>  
                                 <div class="col-md-9">
                                  <label class="radio">
								   <input type="radio" class= "toggle required" id="individual" name="optionsRadios1" value="1" />
									  Individual
								  </label>
                                  <label class="radio">
                                   <input type="radio" id="all_student" class="category_id toggle required" name="optionsRadios1" value="2"/>						  All Student
								  </label>
                                  <label class="radio">
                                   <input type="radio" id="class_wise" class="category_id toggle required" name="optionsRadios1" value="3"/>						  Class Wise
								  </label>
                                
                                  <label class="radio">
                                   <input type="radio" id="shift_wise" class="toggle required" name="optionsRadios1" value="4"/>						  Shift Wise
								  </label>
                                  
                                   <label class="radio">
                                   <input type="radio" id="teacher_option" class="toggle required" name="optionsRadios1" value="5"/>						  Teacher
								  </label> 
                                  
                                     </div>
                                  </div>
                            <!--------------------------------------------->          
                                <div class="form-group" id="individual1" <?php echo "style='display:none'";?>>
                                 <label class="control-label col-md-3 ">Mobile Number</label>  
                                 <div class="col-md-9">
								<input type="text" name="number" id="number1" placeholder="mobile number"class="form-control required"/>
                                 </div>
                               </div>
                               
                           <!--------------------------------------------->          
                                <div class="form-group" id="class_name1" <?php echo "style='display:none'";?>>
                                 <label class="control-label col-md-3 ">Select Class</label>  
                                 <div class="col-md-9">
                                  <select id="class_name" class="form-control span6 required" name="class_name">
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
                           <!--------------------------------------------->
                           
                            <div class="form-group" id="student_class1" <?php echo "style='display:none'";?>>
                                 <label class="control-label col-md-3 ">Student Class</label>  
                                 <div class="col-md-9">
                                 
                                 <select id="student_class" class="form-control span6 required" name="student_class">
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
                                <div class="form-group" id="tbl_section1" <?php echo "style='display:none'";?>>
                                 <label class="control-label col-md-3 ">Student Section</label>  
                                 <div class="col-md-9">
                                 
                                  <select id="tbl_section" class="form-control span6 required" name="tbl_section">
                                    <option value="">Select an option</option>
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
                               
                               
                                 
                                <div class="form-group" id="tbl_shift1" <?php echo "style='display:none'";?>>
                                 <label class="control-label col-md-3 ">Select Shift</label>  
                                 <div class="col-md-9">
                                 
                                  <select id="tbl_shift" class="form-control span6 required" name="tbl_shift">
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
                                 
                               
                                  
                               
                               
                               
                                <div class="form-group">
                                 <label class="control-label col-md-3 ">Message</label>  
                                 <div class="col-md-9">
 									<input type="text" name="message" id="" placeholder="message" class="form-control required"/>                                
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
                
				<!--here start tab 1 -->

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

<script>

$('#all_student').click(function () {
	
    if ($(this).is(':checked')) {
		$("#number1 :input").prop('disabled',true);
		$("#tbl_shift :input").prop('disabled',true);
		$("#student_class :input").prop('disabled',true);
		$("#tbl_section :input").prop('disabled',true);
		$("#class_name :input").prop('disabled',true);
		$("#individual1").slideUp();
		$("#tbl_shift1").slideUp();
		$("#student_class1").slideUp();
		$("#tbl_section1").slideUp();
		$("#class_name1").slideUp();

    } else {
		$("#number1 :input").prop('disabled',true);
		$("#tbl_shift :input").prop('disabled',true);
		$("#student_class :input").prop('disabled',true);
		$("#tbl_section :input").prop('disabled',true);
		$("#class_name :input").prop('disabled',true);
		$("#individual1").slideUp();
		$("#tbl_shift1").slideUp();
		$("#student_class1").slideUp();
		$("#tbl_section1").slideUp();
		$("#class_name1").slideUp();

    }
});

$('#individual').click(function () {
	
    if ($(this).is(':checked')) {
		$("#number1 :input").prop('disabled',false);
		$("#tbl_shift :input").prop('disabled',true);
		$("#student_class :input").prop('disabled',true);
		$("#tbl_section :input").prop('disabled',true);
		$("#class_name :input").prop('disabled',true);
		$("#individual1").slideDown();
		$("#tbl_shift1").slideUp();
		$("#student_class1").slideUp();
		$("#tbl_section1").slideUp();
		$("#class_name1").slideUp();

    } else {
		$("#number1 :input").prop('disabled',true);
		$("#tbl_shift :input").prop('disabled',true);
		$("#student_class :input").prop('disabled',true);
		$("#tbl_section :input").prop('disabled',true);
		$("#class_name :input").prop('disabled',true);
		$("#individual1").slideUp();
		$("#tbl_shift1").slideUp();
		$("#student_class1").slideUp();
		$("#tbl_section1").slideUp();
		$("#class_name1").slideUp();

    }
});

$('#shift_wise').click(function () {
	
    if ($(this).is(':checked')) {
		$("#number1 :input").prop('disabled',true);
		$("#student_class :input").prop('disabled',false);
		$("#tbl_shift :input").prop('disabled',false);
		$("#tbl_section :input").prop('disabled',false);
		$("#class_name :input").prop('disabled',true);
		$("#individual1").slideUp();
		$("#tbl_shift1").slideDown();
		$("#student_class1").slideDown();
		$("#tbl_section1").slideDown();
		$("#class_name1").slideUp();

    } else {
		$("#class_name :input").prop('disabled',true);
		$("#number1 :input").prop('disabled',true);
		$("#student_class :input").prop('disabled',true);
		$("#tbl_shift :input").prop('disabled',true);
		$("#tbl_section :input").prop('disabled',true);
		$("#class_name1").slideUp();
		$("#individual1").slideUp();
		$("#tbl_shift1").slideDown();
		$("#student_class1").slideUp();
		$("#tbl_section1").slideUp();

    }
});

$('#class_wise').click(function () {
	
    if ($(this).is(':checked')) {
		$("#class_name :input").prop('disabled',false);
		$("#number1 :input").prop('disabled',true);
		$("#tbl_shift :input").prop('disabled',true);
		$("#student_class :input").prop('disabled',true);
		$("#tbl_section :input").prop('disabled',true);
		$("#class_name1").slideDown();
		$("#individual1").slideUp();
		$("#tbl_shift1").slideUp();
		$("#student_class1").slideUp();
		$("#tbl_section1").slideUp();

    } else {
        $("#class_name :input").prop('disabled',true);
		$("#number1 :input").prop('disabled',true);
		$("#tbl_shift :input").prop('disabled',true);
		$("#student_class :input").prop('disabled',true);
		$("#tbl_section :input").prop('disabled',true);
		$("#class_name1").slideUp();
		$("#individual1").slideUp();
		$("#tbl_shift1").slideUp();
		$("#student_class1").slideUp();
		$("#tbl_section1").slideUp();

    }
});

$('#teacher_option').click(function () {
	
    if ($(this).is(':checked')) {
		$("#number1 :input").prop('disabled',true);
		$("#tbl_shift :input").prop('disabled',true);
		$("#student_class :input").prop('disabled',true);
		$("#tbl_section :input").prop('disabled',true);
		$("#class_name :input").prop('disabled',true);
		$("#individual1").slideUp();
		$("#tbl_shift1").slideUp();
		$("#student_class1").slideUp();
		$("#tbl_section1").slideUp();
		$("#class_name1").slideUp();

    } else {
		$("#number1 :input").prop('disabled',true);
		$("#tbl_shift :input").prop('disabled',true);
		$("#student_class :input").prop('disabled',true);
		$("#tbl_section :input").prop('disabled',true);
		$("#class_name :input").prop('disabled',true);
		$("#individual1").slideUp();
		$("#tbl_shift1").slideUp();
		$("#student_class1").slideUp();
		$("#tbl_section1").slideUp();
		$("#class_name1").slideUp();

    }
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
var change_shift_box = function(id,itemTobeloaded,tbl){
	var vl = $("#"+id).val();
	var cl_id = $("#student_class").val();

	if(vl == ''){
		$('#'+itemTobeloaded+' option:not(:first)').remove().end();
	}else{
		$.getJSON("ajax_get.php?id="+vl+'&cl_id='+cl_id+'&tbl='+tbl,function(data){
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
      
      
      