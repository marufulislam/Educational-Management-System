<?php
require_once('include/connect.php'); 
	
	if(@$_REQUEST['id'] && @$_REQUEST['approved'] == '1')
	{
		echo "UPDATE `tbl_attendance_teacher` SET `teacher_attendance`='1' WHERE `id` = '".$_REQUEST['id']."';";
		mysql_query("UPDATE `tbl_attendance_teacher` SET `teacher_attendance`='1' WHERE `id` = '".$_REQUEST['id']."';");
		
		$sql_approved = mysql_query("SELECT * FROM tbl_attendance_teacher where id = '".$_REQUEST['id']."'");
		$rs_approved = mysql_fetch_array($sql_approved); 
		$is_published = $rs_approved['teacher_attendance'];
		echo $is_published;
	}
	
	if(@$_REQUEST['id'] && @$_REQUEST['approved'] == '0')
	{
		
		mysql_query("UPDATE `tbl_attendance_teacher` SET `teacher_attendance`='0' WHERE `id` = '".$_REQUEST['id']."';");
		
		$sql_approved = mysql_query("SELECT * FROM tbl_attendance_teacher where id = '".$_REQUEST['id']."'");
		$rs_approved = mysql_fetch_array($sql_approved); 
		$is_published = $rs_approved['teacher_attendance'];
		
		echo $is_published;
	}
	
	
	
	
	
	
	
	
?>

