<?php
$sql_Name = "SELECT name,page_link,page_caption FROM `t_modules` where page_link='".$view."'";
$qry_Name = mysql_query($sql_Name);
$page_title = mysql_result($qry_Name, 0, "name");
$page_link = mysql_result($qry_Name, 0, "page_link");
$page_caption = mysql_result($qry_Name, 0, "page_caption");
$page_meta_key = "";
$page_meta_desc = "";
if(isset($_SESSION['com_cbs_aaiam_school_maruf_user_email']) == true)
{
?>
<div class="page-content"><!-- BEGIN PAGE CONTENT-->        

    <div class="row"> <!-- BEGIN PAGE HEADER-->
    
        <div class="col-md-12"><!-- BEGIN PAGE TITLE & BREADCRUMB-->
        
        	<h3 class="page-title"><?php echo $page_title;?> <small><?php echo $page_caption;?></small></h3>
        </div><!-- END PAGE TITLE & BREADCRUMB-->
    
    </div><!-- END PAGE HEADER-->
    <div class="row"> <!-- BEGIN PAGE Option-->
        <div class="col-md-12">
<div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption"><i class="icon-reorder"></i>Action Form</div>
                            <div class="tools">
                              
                            </div>
                        </div>
                        <div class="portlet-body  flip-scroll">
                            <!-- BEGIN FORM-->
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat blue">
                                        <div class="visual">
                                            <i class="fa fa-briefcase fa-icon-medium"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number">
                                               SCHOOL INFORMATION
                                            </div>
                                           <!-- <div class="desc">
                                                 ALL INFORMATION ABOUT SCHOOL
                                            </div>-->
                                        </div>
                                        <a class="more" href="#">
                                             View more <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat yellow">
                                        <div class="visual">
                                            <i class="fa fa-briefcase fa-icon-medium"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number bdt">
                                                TEACHER & STUFF MANAGEMENT
                                            </div>
                                           <!-- <div class="desc">
                                                 Lifetime Sales
                                            </div>-->
                                        </div>
                                        <a class="more" href="#">
                                             View more <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat green">
                                        <div class="visual">
                                            <i class="fa fa-briefcase fa-icon-medium"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number bdt">
                                                STUDENT SETUP
                                            </div>
                                           <!-- <div class="desc">
                                                 Lifetime Sales
                                            </div>-->
                                        </div>
                                        <a class="more" href="#">
                                             View more <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat green">
                                        <div class="visual">
                                            <i class="fa fa-briefcase fa-icon-medium"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number bdt">
                                                RESULT MANAGEMENT
                                            </div>
                                            
                                        </div>
                                        <a class="more" href="#">
                                             View more <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat blue">
                                        <div class="visual">
                                            <i class="fa fa-briefcase fa-icon-medium"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number bdt">
                                                SMS ALERT
                                            </div>
                                            
                                        </div>
                                        <a class="more" href="#">
                                             View more <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat yellow">
                                        <div class="visual">
                                            <i class="fa fa-briefcase fa-icon-medium"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number bdt">
                                               &nbsp; FEES MANAGEMENT
                                            </div>
                                            
                                        </div>
                                        <a class="more" href="#">
                                             View more <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat yellow">
                                        <div class="visual">
                                            <i class="fa fa-briefcase fa-icon-medium"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number bdt">
                                               ATTENDANCE MANAGEMENT
                                            </div>
                                            
                                        </div>
                                        <a class="more" href="#">
                                             View more <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat green">
                                        <div class="visual">
                                            <i class="fa fa-briefcase fa-icon-medium"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number bdt">
                                              OTHER INFO
                                            </div>
                                            
                                        </div>
                                        <a class="more" href="#">
                                             View more <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="dashboard-stat blue">
                                        <div class="visual">
                                            <i class="fa fa-briefcase fa-icon-medium"></i>
                                        </div>
                                        <div class="details">
                                            <div class="number bdt">
                                              OTHER OPTION
                                            </div>
                                            
                                        </div>
                                        <a class="more" href="#">
                                             View more <i class="m-icon-swapright m-icon-white"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- END FORM-->  
                        </div>
                    </div>
        </div>
    </div> <!-- END PAGE option-->

</div><!-- END PAGE CONTENT-->
 
<?php
}else{
?>    

<script type="text/javascript">
location.replace('index.php');
</script>
<?php
}
?>
      