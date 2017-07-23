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

            </ul>
    
            <div class="tab-content">
            	
                <div class="tab-pane active" id="tab_0">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>Form for <?php echo $page_title;?></div>
                        </div>
                        <div class="portlet-body form">
                            <!-- BEGIN FORM-->
                            <form action="" method="POST" class="form-horizontal form-bordered form-label-stripped" id="form_sample_1">
                            <div class="form-body"><!--Begin form-body-->
                                <!---------------------->
                                <div class="row">
                                 <div class="col-md-12">
                                 	<div class="col-md-4">
                                      <div class="form-group">
                                      <label>Select Class</label>
                                        <select id="current_class" class="form-control span6 required" name="current_class">
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
                                     
                                    <div class="col-md-4">
                                      <div class="form-group">
                                      <label>Select Term</label>
                                        <select id="term_name" class="form-control span6 required" name="term_name">
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
                                   <div class="col-md-4">
                                      <div class="form-group">
                                      <label>Select Session</label>
                                        <select id="promote_session" class="form-control span6 required" name="promote_session">
                                         <option value="">Select an option</option>
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
                                   <!--/span-->
                                     
                                  </div>
                                 </div>
                                 <br />
                                <!---------------------->
                                <div class="form-actions right"><!--Begin form-actions-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-offset-3 col-md-9">
												<button type="button" class="btn btn-info" onclick="getScriptPage('output_div','text_content','0')">Manage Tabulation</button>          
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
				<div id="order"></div>
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

function getScriptPage(div_id,content_id){

	  if (!$('#current_class').val()) {
            alert("Please select Class");
	  }
		else if(!$('#term_name').val()){
		   alert("Please select Term");
		  }  
	   	else if(!$('#promote_session').val()){
		   alert("Please select Session");
		  }

  	   
	  else{	  	    
		
		subject_id = div_id;
	//	content = document.getElementById(content_id).value;
		var dataString = 'current_class='+jQuery('#current_class').val()+'&term_name='+jQuery('#term_name').val()+'&promote_session='+jQuery('#promote_session').val();
		
		$( "#order").load( "req_tabulation.php?" +dataString, function() {

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
      
      
      