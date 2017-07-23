
<?php 
	require('functions.php');
	$htaccess = isset($_SERVER['HTACCESS']);
	
	if(@$_SESSION['com_cbs_aaiam_school_maruf_user_email'] == '')
	{
		$view = 'login';
	}
	
	//if(is_array(@$macs) && array_key_exists(@$rows['moduleid'],@$macs)){
	if(isset($_GET['view'])){
	 	@$view = $_GET['view'];
	}
	else {
	 	$view = 'login';
	}
	//echo $view;
	
	$page = $view.'_asoft.php';
	
	if(!is_file($page))
		$page = '404.php';
	ob_start();
	include($page);
	$content = ob_get_clean();
	
	
?>
