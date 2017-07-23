<?php
$sql_Name = "SELECT name,page_link,page_caption FROM `t_modules` where page_link='".$view."'";
$qry_Name = mysql_query($sql_Name);
$page_title = mysql_result($qry_Name, 0, "name");
$page_link = mysql_result($qry_Name, 0, "page_link");
$page_caption = mysql_result($qry_Name, 0, "page_caption");
$page_meta_key = "";
$page_meta_desc = "";
$random_number = random_num(5);
$cur_date = date('Y-m-d');
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
    
    <?php 
	  $qry_student = mysql_query("SELECT * FROM tbl_student_info")or die(mysql_error());
	?>
 

    <div class="row"> <!-- BEGIN PAGE Option-->
        <div class="col-md-12">
<div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>List for Attendance</div>
                            <div class="tools">
                               <p>Today student <?php echo mysql_num_rows($qry_student); ?></p>
                            </div>
                        </div>
                        <div class="portlet-body  flip-scroll">
                            <!-- BEGIN FORM-->
                            <form action=""  class="form-horizontal form-bordered" id="formIDdel" method="post" enctype="multipart/form-data">
                    
                            <table class="table table-bordered table-striped table-condensed flip-content" id="sample_1">
                                <thead class="flip-content">
                                    <tr>
                                        <th>Class</th>
                                        <th>Total Students</th>
                                        <th>Present Student</th>
                                        <th>Absent Student</th>
                                        <th>Student Graph</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_user_admin = "SELECT * FROM tbl_class";
                                $qry_user_admin = mysql_query($sql_user_admin) or die(mysql_error());;
                                while($row = mysql_fetch_array($qry_user_admin)){
									$pk = $row['class_id'];
									 $qry_student_num = mysql_query("SELECT * FROM tbl_student_info WHERE student_class = '".$pk."'")or die(mysql_error());
									 $qry_present = mysql_query("SELECT * FROM tbl_attendance WHERE class_id='".$pk."' AND entry_date='".$cur_date."' AND attendance='1'")or die(mysql_error());
									 
                                ?>
                                <tr>
                                    <td><?php echo $row['class_name'];?></td>
                                  
                                     <td><?php echo mysql_num_rows($qry_student_num);?></td>
                                     <td><?php echo $pk;?></td>
                                    <td><?php echo $pk;?></td>
                                    <td><div class="chart" data-percent="30"><?php 
										$total_student = mysql_num_rows($qry_student);
										$total_present = mysql_num_rows($qry_present);
										echo $percent = (($total_present/$total_student)*100).'%';
										
									?></div></td>
                                </tr>
                                <?php } ?>   
                                </tbody>
                            </table>    
                            
                            </form>
                            <!-- END FORM-->  
                        </div>
                    </div>
        </div>
    </div> <!-- END PAGE option-->
        
    </div><!--col-md-12-->
</div> <!-- END PAGE option-->

</div><!-- END PAGE CONTENT-->

 <script type="text/javascript" src="assets/scripts/pie_chart.js"></script>
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
$(function() {
    $('.chart').easyPieChart({
        //your configuration goes here
    });
});
});//]]> 

</script>

<?php 
} else
{ 
?>  <script type="text/javascript">
location.replace('index.php');
</script>
	
<?php }?>

  <style type="text/css">

.easyPieChart {
    position: relative;
    text-align: center;

}

.easyPieChart canvas {
    position: absolute;
    top: 0;
    left: 0;

}

.chart {
    float: left;
    margin: 10px;

}


  </style>
      
      
      