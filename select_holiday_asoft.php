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

                          <form method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                            <div class="form-group">
                                  <div class="form-group">
                                	<label class="control-label col-md-3">Upload *.XLSX</label>
                                    <div class="col-md-7">
                                      <input type="file" name="file"  /><br/><input type="submit" value="Parse" />
                                    
                                    </div>
                                </div>
                             </form>
                           <!-- END FORM-->   
                        </div>
                    </div>
        		
                </div><!--tab_0-->
 <?php
					

						ini_set('max_execution_time',300);
						
						if (isset($_FILES['file'])) {
							
							require_once "req/simplexlsx.class.php";
							
							$xlsx = new SimpleXLSX( $_FILES['file']['tmp_name'] );
							
							echo '<h1>Parsing Result</h1>';
							echo '<table border="1" cellpadding="3" style="border-collapse: collapse">';
							
							list($cols,) = $xlsx->dimension();
							
							foreach( $xlsx->rows() as $k => $r) {
						//		if ($k == 0) continue; // skip first row
								echo '<tr>';
								for( $i = 0; $i < $cols; $i++){
									echo '<td>'.( (isset($r[$i])) ? $r[$i] : '&nbsp;' ).'</td>';
									if($i == 0) { $unique_code =  $r[$i]; }
									if($i == 1) { $entry_date =  $r[$i]; }
									if($i == 2) { $attendance =  $r[$i]; }
								}

											
											$sql_holiday_insertion = "INSERT INTO `tbl_attendance`(`unique_code`, `entry_date`, `attendance`) VALUES ('".$unique_code."', '".date("Y-m-d", strtotime($entry_date))."', '".$attendance."')";
								$rs_holiday_insertion = mysql_query($sql_holiday_insertion) or die("ERROR in Holiday Insertion :".mysql_error());
								
								$sql_holiday_teacher = "INSERT INTO `tbl_attendance_teacher`(`teacher_id`, `entry_date`, `teacher_attendance`) VALUES ('".$unique_code."', '".date("Y-m-d", strtotime($entry_date))."', '".$attendance."')";
								$rs_holiday_teacher = mysql_query($sql_holiday_teacher) or die("ERROR in Holiday Insertion :".mysql_error());
											 
											if ($rs_holiday_teacher){
											?>	
												<div class="alert alert-success">
													<button class="close" data-dismiss="alert"></button> Information added successfully.
												</div>
												<script>
													$(".form_success").hide();
													$(".form-group").slideUp();
													setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 3000);	
												</script>
											<?php 	
											}else{
											?>	
												<div class="alert alert-danger">
													<button class="close" data-dismiss="alert"></button> Error Occured, Please try again.
												</div>
												<script>
													$("#idsubmitData").show();
												</script>
											<?php  
											}
										
									

							
									
								echo '</tr>';
							}
							echo '</table>';
						}
						
						?>
               
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
<?php 
} else
{ 
?>  <script type="text/javascript">
location.replace('index.php');
</script>
	
<?php }?>
      
      
      