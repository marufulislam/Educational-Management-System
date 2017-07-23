<?php
$page_title = "404 Page";
$page_caption = "Dead Link !!!";
$page_meta_key = "";
$page_meta_desc = "";
?>

<div class="page-content"><!-- BEGIN PAGE CONTENT-->        

    <div class="row"> <!-- BEGIN PAGE HEADER-->
    
        <div class="col-md-12"><!-- BEGIN PAGE TITLE & BREADCRUMB-->
        
        	<h3 class="page-title"><?php echo $page_title;?> <small><?php echo $page_caption;?></small></h3>
        
            <ul class="page-breadcrumb breadcrumb">
                <li><i class="icon-home"></i><a href="<?php echo urlroute('home'); ?>">Dashboard</a><i class="icon-angle-right"></i></li>
                
                <li><?php echo $page_title;?></li>
            </ul>
        
        </div><!-- END PAGE TITLE & BREADCRUMB-->
    
    </div><!-- END PAGE HEADER-->
 
    
    <div class="row"><!-- BEGIN PAGE Option-->
        <div class="col-md-12 page-404">
            <div class="number">404</div>
            <div class="details">
            	<h3>Oops!  You're lost.</h3>
                <p>
                We can not find the page you're looking for.<br />
                <a href="<?php echo urlroute('home'); ?>">Return home</a> or try the search bar below.
                </p>
            </div>
        </div>
    </div><!-- END PAGE option-->
    
    
    

</div><!-- END PAGE CONTENT-->

<link href="assets/css/pages/error.css" rel="stylesheet" type="text/css"/>
      