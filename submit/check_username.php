<?php

include('../include/connect.php');
include('../include/view.php');

if(isset($_POST['email']))
{
	$email = $_POST['email'];
	//$username = mysql_real_escape_string($username);
	$sql_check = mysql_query("SELECT userid FROM user_admin WHERE usr_code='".escape($email)."'");

	if(mysql_num_rows($sql_check))
	{
		 echo 'false';
	}
	else
	{
		echo  'true';
	}

}

?>