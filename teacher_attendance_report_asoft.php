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
		   <!-- <li><a href="#tab_1" data-toggle="tab">List</a></li>
                <li><a href="#tab_2" data-toggle="tab">Excel File Insert</a></li>-->
            </ul>
    
            <div class="tab-content">
            	
                <div class="tab-pane active" id="tab_0">
                	
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>Form for <?php echo $page_title;?></div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->

                            <div class="form-body"><!--Begin form-body-->
                                <div class="form_result"></div>
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
                                      <label>Department</label>
                                        <select id="department" class="form-control span6 required" name="department">
                                         
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_department ORDER BY department_id ASC");
                                                while($obj = mysql_fetch_assoc($rs)) {
                                                  echo "<option value = '".$obj['department_id']."'";
                                                  if(@$rs_view['department_id'] == $obj['department_id']) echo "selected='selected'" ; 
                                                    echo ">".$obj['department_name']."</option>";          
                                                } 
                                                ?>
                                          
                                        </select>    
                                       </div>
                                     </div>
                                   <!--/span-->
                                   
                                   <div class="col-md-2">
                                      <div class="form-group">
                                      <label>Select Year</label>
                                        <select id="tbl_session" class="form-control span6 required" name="tbl_session">
                                         <option value="">---Select an option---</option>
                                              <?php 
                                               $rs = mysql_query("SELECT * FROM tbl_session ORDER BY session_id ASC");
                                                while($obj = mysql_fetch_assoc($rs)) {
                                                  echo "<option value = '".$obj['session_id']."'";
                                                  if(@$rs_view['session_id'] == $obj['session_id']) echo "selected='selected'" ; 
                                                    echo ">".$obj['session_name']."</option>";          
                                                } 
                                                ?>
                                          
                                        </select>
                                       </div>
                                     </div>
                                     
                                     <div class="col-md-2">
                                      <div class="form-group">
                                      <label>Select Month</label>
                                        <select id="tbl_month" class="form-control span6 required" name="tbl_month" onchange="getScriptPage('output_div','text_content','0')">
                                            <option value="">Select an option</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                          
                                        </select>
                                       </div>
                                     </div>
                                     
                                     <div class="col-md-2">
                                      <div class="form-group">
                                      <label>Print Option</label>
                                       <button type="button" class="btn red" value="Search"><span>Print</span></button>
                                       </div>
                                     </div>
                                  </div>
                                 </div> 
                               <br />
                               
                                <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];?>">    
                             

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
<script type="text/javascript" src="assets/plugins/jquery.livequery.js"></script>

<script>
jQuery(document).ready(function() {   
 	// initiate layout and plugins
 	FormValidation.init();
	TableManaged.init();

});

</script>


<script>
	function getScriptPage(div_id,content_id){

	  if (!$('#department').val()) {
            alert("Please select Department name");
	  }

		else if(!$('#tbl_month').val()){
		   alert("Please select Date name");
		  }  
	   	else if(!$('#tbl_session').val()){
		   alert("Please select Session name");
		  } 
  	   
	  else{	  	    
		
		subject_id = div_id;
	//	content = document.getElementById(content_id).value;
		var dataString = 'department='+jQuery('#department').val()+'&session_name='+jQuery('#tbl_session').val()+'&month_name='+jQuery('#tbl_month').val();
		
		$( "#order").load( "req_teacher_attendance_report.php?" +dataString, function() {

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
      
      
      