<?php 
require_once('include/connect.php'); 
require_once('include/functions.php'); 
//Customer's previous due
//if(isset($_GET['salesId'])){ 
    echo $vl = $_GET['vl'];
    echo $subId = $_GET['subId'];
	echo $st_id = $_GET['st_id'];
	echo $st_class = $_GET['st_class'];
	echo $st_sec = $_GET['st_sec'];
	echo $st_grp = $_GET['st_grp'];
	echo $st_shft = $_GET['st_shft'];
	
	echo $st_term = $_GET['st_term'];
	echo $st_session = $_GET['st_session'];
	


	if($vl == 2){
	$sql = mysql_query("DELETE FROM tbl_full_marks WHERE student_name='".$st_id."' AND class_name='".$st_class."' AND section_name='".$st_sec."' AND group_name='".$st_grp."' AND shift_name='".$st_shft."' AND subject_name='".$subId."' AND term_name='".$st_term."' AND exam_year='".$st_session."'") or die(mysql_error());
	
	}
?>