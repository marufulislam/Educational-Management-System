<?php  
require_once('connect.php'); 
require_once('view.php'); 

$qry_moduleid = mysql_query("SELECT moduleid FROM t_modules WHERE page_link='".$_REQUEST['view']."'");

if(mysql_num_rows($qry_moduleid) > 0){
	$moduleid = mysql_result($qry_moduleid, 0, "moduleid");
	
	
	$qry_is_main_cat = mysql_query("SELECT category FROM `".$db."`.`hierarchy` WHERE sub_category='".$moduleid."'");
	$is_main_cat = mysql_result($qry_is_main_cat, 0, "category");
	
	if($is_main_cat == 'm'){
		echo "0";
	}else{
	
		
		$rows_ = mysql_fetch_array(mysql_query("SELECT sub_category FROM `".$db."`.`hierarchy` WHERE hierarchy_id = '".$is_main_cat."'"));
		$sub_category  = array('sub_category' =>$rows_['sub_category']);
		echo json_encode($sub_category);
	}
}else{
	$sub_category  = array('sub_category' => 0);
	echo json_encode($sub_category);
}
?>