<?php
	require_once('include/connect.php'); 
	
	
	///module enrty checking
	$sqlm = "SELECT * FROM t_user_module WHERE userid = '".@$_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id']."'";
	$rsm = mysql_query($sqlm); 
	while($rom = mysql_fetch_array($rsm)){
		$macs[$rom['moduleid']]= $rom['accesslevel'];
	}
	
	/***********************************************************************************************************************/
	
	
	$pglnk = @$_GET['view'];
	$usrid = @$_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'];
	$qry_ = mysql_query("SELECT a.accesslevel  , b.* FROM t_user_module AS a, t_modules AS b 
							WHERE a.moduleid = b.moduleid  
							AND b.page_link = '$pglnk' 
							AND a.userid = '$usrid' ");
	$rows = mysql_fetch_array($qry_);
	
	$query = mysql_query("SELECT * FROM user_admin WHERE usr_code='".@$_SESSION['com_cbs_aaiam_school_maruf_user_email']."'");
	while($row = mysql_fetch_assoc($query))
	{
		$userid = $row['userid'];
	}
	
	$acslevel = (@$_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'] == @$userid)? 'Add, Edit, Delete, View' : $rows['accesslevel'];
	
	$row_access_acs = explode(', ',$acslevel);
	/***********************************************************************************************************************/	

	
	
	require_once('include/view.php');
	
	
	
	if(isset($_SESSION['com_cbs_aaiam_school_maruf_user_email']) == true){
		if($view == '' || $view == 'login'){
			if(isset($page_link)){
			?>
            <script type="text/javascript">
			location.replace('<?php echo urlroute($page_link);?>');
			</script>
			<?php	
			}else{
			?>
            <script type="text/javascript">
			location.replace('<?php echo urlroute('home');?>');
			</script>
			<?php		
			}
			
		}
	}
	
	require_once('include/html_head.php');
?>

<!-- BEGIN BODY -->
<?php 
		if(isset($_SESSION['com_cbs_aaiam_school_maruf_user_email']))
		{
echo "<body class='page-header-fixed'>";

		}else{


echo "<body>";
		}
?>



		<?php 
		if(isset($_SESSION['com_cbs_aaiam_school_maruf_user_email']))
		{
			require_once('include/nav_header.php'); 
		}
		
		?>
	


		<?php 
		if(isset($_SESSION['com_cbs_aaiam_school_maruf_user_email']) == false)
		{
			print($content);
			
		}else{
		?>
        
		<!-- BEGIN CONTAINER -->   
       <div class="page-container">
          <!-- BEGIN SIDEBAR -->
          <?php require_once('include/nav_sidebar.php'); ?>
          <!-- END SIDEBAR -->
          		<!-- BEGIN PAGE -->
				<?php print($content); ?>	
                <!-- END PAGE -->    
           </div>
        <!-- END CONTAINER -->
        <?php	
			
		}
		
		?>


      
      
      	<?php 
		if(isset($_SESSION['com_cbs_aaiam_school_maruf_user_email']))
		{
			require_once('include/footer.php'); 
		}
		?>
        
        
<input type="hidden" name="navz" id="navz" value="<?php echo @$_GET['view']?>">
<script>
var view = jQuery('#navz').val();
jQuery.getJSON("include/navz.php?view="+view,function(data){		 
	//alert('#module_'+data.sub_category);
	jQuery('#module_'+data.sub_category).addClass('active');
	jQuery('#module_anchor_'+data.sub_category).addClass('open');
});
</script>

<style>
.progress { position:relative; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
.bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
.percent { position:absolute; display:inline-block; position:absolute; }

.close {


width: 20px;
background-repeat: no-repeat !important;
background-image: url("img/remove-icon-small.png") !important;
}


</style>

</body>
<!-- END BODY -->
</html>