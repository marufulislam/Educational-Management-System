<?php

@session_start();
require_once('include/functions.php');

unset($_SESSION['com_cbs_aaiam_school_maruf_user_email']);

?>
	
<script>location.replace('<?php echo urlroute('login'); ?>');</script>


 