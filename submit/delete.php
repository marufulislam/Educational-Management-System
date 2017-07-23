<?php
include('../include/connect.php');
include('../include/functions.php');
$loggedInusrId 	= $_SESSION['com_cbs_aaiam_school_maruf_user_email'];
if(isset($_GET['id'])){
	if(isset($_GET['isAssignedAgentDeleted'])){
		$Deleteid = $_REQUEST['id'];
		$sql_delete 	= 	"DELETE FROM `assigned_agent` WHERE `assigned_agent_id` = '".$Deleteid."';";
		$rs_delete		=	mysql_query($sql_delete) or die(mysql_error());
		if($rs_delete){
			echo 'deleted';
		}
	}	
}

?>