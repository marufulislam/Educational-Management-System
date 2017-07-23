<?php
require_once('include/connect.php'); 
if(@$_REQUEST['id'] && @$_REQUEST['set'] == '1')
	{
		//echo "UPDATE `product` SET `product_isPublish`='1' WHERE `product_id` = '".$_REQUEST['id']."'";
		mysql_query("UPDATE `tbl_term` SET `isActive`='0' WHERE `term_id` = '".$_REQUEST['id']."'");
		
		$sql_approved = mysql_query("SELECT * FROM tbl_term where term_id = '".$_REQUEST['id']."'");
		$rs_approved = mysql_fetch_array($sql_approved); 
		$product_isPublish = $rs_approved['isActive'];
		echo $product_isPublish;
	}
	
	if(@$_REQUEST['id'] && @$_REQUEST['set'] == '0')
	{
		
		mysql_query("UPDATE `tbl_term` SET `isActive`='1' WHERE `term_id` = '".$_REQUEST['id']."'");
		
		$sql_approved = mysql_query("SELECT * FROM tbl_term where term_id = '".$_REQUEST['id']."'");
		$rs_approved = mysql_fetch_array($sql_approved); 
		$product_isPublish = $rs_approved['isActive'];
		echo $product_isPublish;
	}
?>