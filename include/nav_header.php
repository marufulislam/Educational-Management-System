<!-- BEGIN HEADER -->   
<div class="header navbar navbar-inverse navbar-fixed-top">
  	<!-- BEGIN TOP NAVIGATION BAR -->
        <div class="header-inner">
        	<!-- BEGIN LOGO -->  
           <a class="navbar-brand" href="#" target="_blank">
            <img src="img/login-logo.png" alt="logo" class="img-responsive" style="height:25px"/>
            </a>

        	<!-- END LOGO -->
        	<!-- BEGIN RESPONSIVE MENU TOGGLER --> 
            <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            	<img src="assets/img/menu-toggler.png" alt="" />
            </a> 
        	<!-- END RESPONSIVE MENU TOGGLER -->
        	<!-- BEGIN TOP NAVIGATION MENU -->
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown user">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                		
                        <?php
				
						$sql_view = "SELECT * FROM user_admin WHERE usr_code='".@$_SESSION['com_cbs_aaiam_school_maruf_user_email']."'";
						$qry_view = mysql_query($sql_view) or die("Error in view ->".mysql_error());
						$rs_view = mysql_fetch_array($qry_view);
						@$path = 'img/user/'.@$rs_view["image"];
						if(@$rs_view["image"] != "" && file_exists($path)==true){
							$thumbs  = 'img/user/thumbs/small'.@$rs_view["image"];
						}else{
							$thumbs  = 'assets/img/avatar.png';
						}
						?>
                        <img alt="" src="<?php echo $thumbs;?>" height="29"/>
               	 		<span class="username"><?php echo name($_SESSION['com_cbs_aaiam_school_maruf_user_email']);?></span>
                		<i class="icon-angle-down"></i>
                	</a>
                    <ul class="dropdown-menu">
                    	<li><a href="<?php echo urlroute('profile'); ?>"><i class="icon-user"></i> My Profile</a></li>
                    	<!--<li><a href="page_calendar.html"><i class="icon-calendar"></i> My Calendar</a></li>
                    	<li><a href="inbox.html"><i class="icon-envelope"></i> My Inbox <span class="badge badge-danger">3</span></a></li>
                    	<li><a href="#"><i class="icon-tasks"></i> My Tasks <span class="badge badge-success">7</span></a></li>-->
                    	
                        <li class="divider"></li>
                        
                    	<li><a href="javascript:;" id="trigger_fullscreen"><i class="icon-move"></i> Full Screen</a></li>
                    	<!--<li><a href="<?php //echo urlroute('lock'); ?>"><i class="icon-lock"></i> Lock Screen</a></li>-->
                    	<li><a href="<?php echo urlroute('logout'); ?>"><i class="icon-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
        	<!-- END TOP NAVIGATION MENU -->
        </div>
  <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->


<div class="clearfix"></div>