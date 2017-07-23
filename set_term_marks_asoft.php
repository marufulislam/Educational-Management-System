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
                <li><a href="#tab_2" data-toggle="tab">Excel File Insert</a></li>
            </ul>
    
            <div class="tab-content">
            	
                <div class="tab-pane active" id="tab_0">
                	<?php
					if(isset($_REQUEST['temp'])){
						if($_REQUEST['temp']=="Save" || $_REQUEST['temp']=="View"){
	
							$Editid = $_REQUEST['Editid'];
							$sql_view = "SELECT * FROM tbl_term_marks WHERE term_marks_id='$Editid';";
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
                           
                          
                            
                         
                            <div class="form-body"><!--Begin form-body-->
                                <div class="form_result">
									<?php
                                    if(isset($_REQUEST['temp'])){
                                        if($_REQUEST['temp']=="Delete"){
                                    
                                            $Deleteid = $_REQUEST['Deleteid'];
                                            
                                            $sql_delete="DELETE FROM tbl_term_marks WHERE term_marks_id='".$Deleteid."'";
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
                               <div class="row">
                                 <div class="col-md-12">
                                   <div class="col-md-2">
                                      <div class="form-group">
                                      <label>Class</label>
                                        <select multiple="" id="class_name" class="form-control required" name="class_name" onchange="change_select_box(this.id,'tbl_section','tbl_section')">
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
                                   <div class="col-md-2">
                                          <div class="form-group">
                                           <label>Section</label>
                                           <select multiple="" id="tbl_section" class="form-control span6 required" name="section_name"  onchange="change_shift_box(this.id,'tbl_shift','tbl_shift')">
                                       
                                            </select> 
                                          </div>
                                        </div>
                                   <!--/span-->
                                    <div class="col-md-2">
                                      <div class="form-group">
                                      <label>Shift</label>
                                      <select multiple="" id="tbl_shift" class="form-control span6 required" name="shift_name">
                                        
                                            </select>
                                       </div>
                                     </div>
                                     
                                      <div class="col-md-2">
                                      <div class="form-group">
                                       <label>Group </label>
                                      <select multiple="" id="tbl_group" class="form-control span6 required" name="group_name">
                                          <option value="">Select an option</option>
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
                                      <label>Subject </label>
                                      <select multiple="" id="subject_name" class="form-control span6 required" name="subject_name">
                                          <option value="">Select an option</option>
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
                                     
                                      <div class="col-md-2">
                                      <div class="form-group">
                                           <label>Term Name</label>
                                            <select multiple="" id="term_name" class="form-control span6 required" name="term_name">
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
                                   <!--/span-->
                                     </div>
                                    </div> 

                               <div class="row">
                                 <div class="col-md-12">

                                      <div class="form-group">
                                      <label>Exam Year </label>
                                      <select multiple="" id="exam_year" class="form-control span6 required" name="exam_year">
                                          <option value="">Select an option</option>
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
                                  </div>
                               
                                  
                             
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
                            
                            <!-- END FORM-->  
                        </div>
                    </div>
        		
                </div>
                
				  <div id="order"></div>
                
        	</div><!--tab-content-->
        </div><!--tabbable tabbable-custom boxless-->
        
    </div><!--col-md-12-->
</div> <!-- END PAGE option-->

</div><!-- END PAGE CONTENT-->


<script type="text/javascript" src="ajax.js"></script>
<script src="assets/scripts/form-validation.js"></script> 

<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();
});


var submit_term_marks = function(){

		  var dataString = jQuery('#term_marks_frm').serialize()+'&temp='+jQuery("#term_marks_frm-comment").val();
		
        //var dataString = jQuery('#test_name_insert').serialize()+'&temp='+jQuery("#idsubmitDataTestName").val();
		//alert(dataString);
        jQuery.ajax({
            type:'POST', 
            url: 'submit/set_term_marks_submit.php',
			data: dataString,
			cache: false,
            success: function(response) {
                //alert(response);
                jQuery('.term_term').html(response);
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
	var cl_id = $("#class_name").val();

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
	   else if(!$('#subject_name').val()){
		   alert("Please select subject name");
		  }
	   else if(!$('#term_name').val()){
		   alert("Please select term name");
		  }
	   else if(!$('#exam_year').val()){
		   alert("Please select Session name");
		  }
	   else{	  	
		subject_id = div_id;
	//	content = document.getElementById(content_id).value;
		var dataString = 'class_name='+jQuery('#class_name').val()+'&section_name='+jQuery('#tbl_section').val()+'&group_name='+jQuery('#tbl_group').val()+'&shift_name='+jQuery('#tbl_shift').val()+'&subject_name='+jQuery('#subject_name').val()+'&term_name='+jQuery('#term_name').val()+'&exam_year='+jQuery('#exam_year').val();
		//http.open("GET", "req_commission_report.php?" +dataString, true);
		//http.onreadystatechange = handleHttpResponse;
		//http.send(null);
		$( "#order").load( "req_student_termmarks.php?" +dataString, function() {
			  //alert( dataString );
			  //$('#widget_tab ul').idTabs(); 
			//alert( "Load was performed." );  
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
      
      
      