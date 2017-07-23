<?php
require_once('../include/connect.php');
require_once('../include/view.php');


if(isset($_REQUEST['temp']) == false){
	$temp = "";
}
else if(isset($_REQUEST['temp']) == true){
	$temp = $_REQUEST['temp'];
}	
	
$name = escape(isset($_POST['name'])) ?  $_POST['name'] : '';
$page_link = escape(isset($_POST['page_link'])) ?  $_POST['page_link'] : '';
$is_report = escape(isset($_POST['is_report'])) ?  $_POST['is_report'] : '';
$is_main = escape(isset($_POST['is_main'])) ?  $_POST['is_main'] : '';
$menu = escape(isset($_POST['menu'])) ?  $_POST['menu'] : '';
$icon = escape(isset($_POST['icon'])) ?  $_POST['icon'] : '';

if($temp=="Add"){
	
	$qry_having = mysql_query("SELECT * FROM `t_modules` WHERE name='".$name."' AND page_link='".$page_link."'");
	if(mysql_num_rows($qry_having) == 0){
	
		$sql = "INSERT INTO `t_modules`(`name`,`page_link`,`icon`) VALUES ('".$name."','".$page_link."','".$icon."')";
		$qry = mysql_query($sql) or die('Error: ' . mysql_error($sql));
		
		$qry_moduleid = "SELECT * FROM `t_modules` WHERE name='".$name."' AND page_link='".$page_link."'";
		$rs_moduleid = mysql_fetch_array(mysql_query($qry_moduleid)); 
		$moduleid = $rs_moduleid['moduleid'];
		
		$qry_userid = "SELECT userid FROM `user_admin` WHERE usr_code='".$_SESSION['com_cbs_aaiam_school_maruf_user_email']."'";
		$rs_userid = mysql_fetch_array(mysql_query($qry_userid)); 
		$userid = $rs_userid['userid'];
		
		$sql_user_module = "INSERT INTO `t_user_module`(`userid`, `moduleid`, `accesslevel`) VALUES ('".$userid."','".$moduleid."','Add, Edit, Delete, View')";
		$qry_user_module = mysql_query($sql_user_module) or die('Error: ' . mysql_error($sql_user_module));
		
		if($is_main == 1){
			
			$sql_hierarchy = "INSERT INTO `hierarchy` (`category`,`sub_category`) VALUES ('m','".escape($moduleid)."')";
			$rs_hierarchy = mysql_query($sql_hierarchy) or die('Error - Add main hierarchy => '.mysql_error());
			
		}else if($is_main == 0){
			
			$qry_is_M = "SELECT * FROM hierarchy WHERE sub_category = '".escape($menu)."'";
			$rs_is_M = mysql_fetch_array(mysql_query($qry_is_M)); 
			$hierarchy_id = $rs_is_M['hierarchy_id'];
			
			$sql_hierarchy = "INSERT INTO `hierarchy` (`category`,`sub_category`) VALUES ('$hierarchy_id','".escape($moduleid)."')";
			$rs_hierarchy = mysql_query($sql_hierarchy) or die('Error - Add sub hierarchy => '.mysql_error());
			
		}
	
		if ($qry){
			if($is_main == 0){
				if($is_report == 1){
					$my_file = '../'.$page_link."_asoft".'.php';
					$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
					$data = file_get_contents('../include/template_form.php');
					fwrite($handle, $data);
					fclose($handle);
					
					$my_file_submit = $page_link."_submit".'.php';
					$handle_submit = fopen($my_file_submit, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
					$data_submit = file_get_contents('../include/template_submit.php');
					fwrite($handle_submit, $data_submit);
					fclose($handle_submit);
					
				}else if($is_report == 2){
					
					$my_file = '../'.$page_link."_asoft".'.php';
					$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
					$data = file_get_contents('../include/template_report.php');
					fwrite($handle, $data);
					fclose($handle);
					
				}
			}else if($is_main == 1 && $page_link != '#'){
				
				$my_file = '../'.$page_link."_asoft".'.php';
				$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
				$data = file_get_contents('../include/template_form.php');
				fwrite($handle, $data);
				fclose($handle);
				
				$my_file_submit = $page_link."_submit".'.php';
				$handle_submit = fopen($my_file_submit, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
				$data_submit = file_get_contents('../include/template_submit.php');
				fwrite($handle_submit, $data_submit);
				fclose($handle_submit);
				
			}
		?>	
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button> Page Created successfully.
            </div>
            <script>
                $(".form_success").hide();
                $(".form-group").slideUp();
                setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 3000);	
            </script>
    	<?php  
		}
		else{
		?>	
            <div class="alert alert-danger">
                <button class="close" data-dismiss="alert"></button> Page Creation Failed.
            </div>
            <script>
                $("#idsubmitData").show();
            </script>
    	<?php  
		}
	}
	else{
	?>	
    	<div class="alert alert-danger">
            <button class="close" data-dismiss="alert"></button> Alredy In the list.
        </div>
		<script>
			$("#idsubmitData").show();	
		</script>
    <?php  
	}
}

if($temp=="Update"){
	
	$Editid = $_REQUEST['Editid'];
	
	$sql_update="UPDATE t_modules SET name='".escape($name)."',page_link='".escape($page_link)."',icon='".escape($icon)."' WHERE moduleid='".$Editid."';";	
	$rs_update=mysql_query($sql_update);
	if($rs_update){
	?>
    	<div class="alert alert-success">
            <button class="close" data-dismiss="alert"></button> Page updated successfully.
        </div>
		<script>
			$(".form_success").hide();
			$(".form-group").slideUp();
			setTimeout(function(){ window.location = '<?php echo urlroute('module_entry');?>'; }, 3000);	
		</script> 
    <?php
	}else{
	?>
    	<div class="alert alert-danger">
            <button class="close" data-dismiss="alert"></button> Error Occured.
        </div>
		<script>
			$(".form_success").hide();
			$("#idsubmitData").show();
		</script> 
    <?php	
	}
}
?>