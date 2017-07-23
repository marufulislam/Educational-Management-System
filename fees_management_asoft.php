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
		   <!-- <li><a href="#tab_1" data-toggle="tab">List</a></li>-->

            </ul>
    
            <div class="tab-content">
            	
                <div class="tab-pane active" id="tab_0">
                
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>Form for <?php echo $page_title;?></div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                           
                           <form action="submit/<?php echo $page_link;?>_submit.php" method="POST" class="form-horizontal form-bordered form-label-stripped" id="form_sample_1">
                            
                         
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
                                   <div class="col-md-1">
                                   <div class="form-group">
                                      <label class="">Class</label>
                                        <select multiple="" id="class_name" class="form-control required" name="class_name" onchange="change_sction_box(this.id,'tbl_section','tbl_section')">
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

                                   <div class="col-md-1">
                                          <div class="form-group">
                                           <label>Section</label>
                                             <select multiple="" id="tbl_section" class="form-control required" name="section_name">
                                          
                                            </select>
                                           
                                       </div>
                                    </div>
                                     
                                   <!--/span-->
                                    <div class="col-md-2">
                                      <div class="form-group">
                                       <label>Shift </label>
                                      <!-- <select multiple="" id="tbl_shift" class="form-control required" name="shift_name">

                                            </select>--> 
                                            
                                        <select multiple="" id="tbl_shift" class="form-control span6 required" name="shift_name">
                                         
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
                                       <select multiple="" id="tbl_group" class="form-control span6 required" name="group_name" onchange="change_student_box(this.id,'tbl_student_info','tbl_student_info')">
                                         
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
                                     <div class="col-md-2">
                                      <div class="form-group">
                                      <label>Session</label>
                                      <select multiple="" id="exam_year" class="form-control span6 required" name="exam_year">
                                          
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_session ORDER BY session_id ASC");
                                                while($obj = mysql_fetch_assoc($rs)) {
                                                  echo "<option value = '".$obj['session_id']."'";
                                                  if(@$rs_view['exam_year_id'] == $obj['session_id']) echo "selected='selected'" ; 
                                                    echo ">".$obj['session_name']."</option>";          
                                                } 
                                                ?>
                                          
                                        </select>
                                       </div>
                                     </div>
                                     
                                     
                                     
                                     
                                     <div class="col-md-4">
                                      <div class="form-group">
                                           <label>Student Name</label>
                                           <select multiple="" id="tbl_student_info" class="form-control span6 required" name="student_name">
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
                                                <button type="reset" class="btn red"><i class="icon-remove"></i>&nbsp;Cancel</button>
  
											<img src="assets/img/input-spinner.gif" class="gap-right15" id="loader" style="display:none">                    
                                            </div>
                                        </div>
                                    </div>
                                </div><!--End form-actions-->
                            </div>  <!--End form-body--> 
                            </form>
                            <!-- END FORM-->  
                        </div>
                    </div>
        		
                </div>
                
				  <div id="order"></div>
                
                <!--here are code-->
                
                
        	</div><!--tab-content-->
        </div><!--tabbable tabbable-custom boxless-->
        
    </div><!--col-md-12-->
</div> <!-- END PAGE option-->

</div><!-- END PAGE CONTENT-->

<script src="assets/scripts/form-validation.js"></script> 
<script>

  function getScriptPage(div_id,content_id)
	{
	  if (!$('#class_name').val()) {
            alert("Please select class name");
	  }
	   else if(!$('#tbl_section').val()){
		   alert("Please select section name");
		  }
	   else if(!$('#tbl_shift').val()){
		   alert("Please select shift name");
		  } 
	   else if(!$('#tbl_group').val()){
		   alert("Please select group name");
		  }

	   else if(!$('#exam_year').val()){
		   alert("Please select Session name");
		  }	  	   
	  else{	  	    
		
		subject_id = div_id;
	//	content = document.getElementById(content_id).value;
		var dataString = 'class_name='+jQuery('#class_name').val()+'&section_name='+jQuery('#tbl_section').val()+'&group_name='+jQuery('#tbl_group').val()+'&shift_name='+jQuery('#tbl_shift').val()+'&tbl_student_info='+jQuery('#tbl_student_info').val()+'&exam_year='+jQuery('#exam_year').val();
		//http.open("GET", "req_commission_report.php?" +dataString, true);
		//http.onreadystatechange = handleHttpResponse;
		//http.send(null);
		
		
		$( "#order").load( "req_student_fees.php?" +dataString, function() {
			  //alert( dataString );
			  //$('#widget_tab ul').idTabs(); 
			//alert( "Load was performed." );  
			});
	  }
	}	
	
	
var change_sction_box = function(id,itemTobeloaded,tbl){
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
	
var change_student_box = function(id,itemTobeloaded,tbl){
	var vl = $("#"+id).val();
	var cl_id = $("#class_name").val();
	var sec_id = $("#tbl_section").val();
	var shift_id = $("#tbl_shift").val();
	
	   if (!$('#class_name').val()) {
           alert("Please select class name");
	  }
	   else if(!$('#tbl_section').val()){
		   alert("Please select section name");
		  }
	   else if(!$('#tbl_shift').val()){
		   alert("Please select shift name");
		  }
	  else {	  

	if(vl == ''){
		$('#'+itemTobeloaded+' option:not(:first)').remove().end();
	}else{
		$.getJSON("ajax_get.php?id="+vl+'&cl_id='+cl_id+'&sec_id='+sec_id+'&shift_id='+shift_id+'&tbl='+tbl,function(data){
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
}	

</script>

<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();
});

var submitForm_investigation = function(){

		  var dataString = jQuery('#student_fees_frm').serialize()+'&temp='+jQuery("#student_fees_frm-comment").val();
		
        //var dataString = jQuery('#test_name_insert').serialize()+'&temp='+jQuery("#idsubmitDataTestName").val();
		//alert(dataString);
        jQuery.ajax({
            type:'POST', 
            url: 'submit/set_fees_student_submit.php',
			data: dataString,
			cache: false,
            success: function(response) {
                //alert(response);
                jQuery('.frm_fees_result').html(response);
				jQuery("#loaderTestName").hide();
            },
            error: function(jqXHR, exception) {
            //alert(dataString);
                  if (jqXHR.status === 0) {
                      alert('Not connect.\n Verify Network.');
                      jQuery('#idsubmitDataTestName').show();jQuery('#loader').slideUp();
                  } else if (jqXHR.status == 404) {
                      alert('Requested page not found. [404]');
                      jQuery('#idsubmitDataTestName').show();jQuery('#loader').slideUp();
                  } else if (jqXHR.status == 500) {
                      alert('Internal Server Error [500].');
                      jQuery('#idsubmitDataTestName').show();jQuery('#loader').slideUp();
                  } else if (exception === 'parsererror') {
                      alert('Requested JSON parse failed.');
                      jQuery('#idsubmitDataTestName').show();jQuery('#loader').slideUp();
                  } else if (exception === 'timeout') {
                      alert('Time out error.');
                      jQuery('#idsubmitDataTestName').show();jQuery('#loader').slideUp();
                  } else if (exception === 'abort') {
                      alert('Ajax request aborted.');
                      jQuery('#idsubmitDataTestName').show();jQuery('#loader').slideUp();
                  } else {
                      alert('Uncaught Error.\n' + jqXHR.responseText);
                      jQuery('#idsubmitDataTestName').show();jQuery('#loader').slideUp();
                  }
              }
        });
 
    return false;
	 
	  
}

</script>




<?php 
} else
{ 
?>  <script type="text/javascript">
location.replace('index.php');
</script>
	
<?php }?>
      
      
      