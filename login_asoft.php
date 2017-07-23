<?php
$page_title = "login";
$page_meta_key = "";
$page_meta_desc = "";
if(isset($_SESSION['com_cbs_aaiam_school_maruf_user_email']) == false){
?>
<div class="login">
	<!-- BEGIN LOGO -->
    <div class="logo"><img src="img/login-logo.png" width="250" alt="Shikkhangon Events" /></div>
	<!-- END LOGO -->
	
    <!-- BEGIN LOGIN -->
    <div class="content">
    	<!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        	<h3 class="form-title">Login to your account</h3>
            
        
        	<div class="signInForm_result">
            <div class="alert alert-danger display-hide">
            	<button class="close" data-dismiss="alert"></button>
            	You have some form errors.
            </div>
            
            </div>
            
            <div class="form-group">
            	<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            	<label class="control-label visible-ie8 visible-ie9">Username</label>
            	<div class="input-icon">
            		<i class="icon-user"></i>
            		<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="email" value=""/>
            	</div>
            </div>
            
            <div class="form-group">
            	<label class="control-label visible-ie8 visible-ie9">Password</label>
                <div class="input-icon">
                	<i class="icon-lock"></i>
                	<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" value=""/>
                </div>
            </div>
            
            <div class="form-actions">
            	<label class="checkbox">
            		<input type="checkbox" name="remember" value="1" <?php if(isset($_COOKIE['com_cbs_aaiam_school_maruf_user_email_remember_me'])) { echo 'checked="checked"'; }?>/> Remember me
            	</label>
                <button type="submit" class="btn blue pull-right">
                	Login <i class="m-icon-swapright m-icon-white"></i>
                </button>            
            </div>
        
        
        </form>
    	<!-- END LOGIN FORM -->        
    
    </div>
	<!-- END LOGIN -->
    
    <!-- BEGIN COPYRIGHT -->
    <div class="copyright">
    	Workhouse &copy; admin panel
    </div>
    <!-- END COPYRIGHT -->

</div>


<!-- Begin PAGE LEVEL STYLES -->
<link href="assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>

<script src="assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script src="assets/scripts/login-soft.js" type="text/javascript"></script>   

<script>
    jQuery(document).ready(function() {     
        Login.init();
    });
</script>
<!-- END PAGE LEVEL STYLES -->

<?php
}
?>