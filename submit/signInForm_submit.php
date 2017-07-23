<?php
require_once('../include/connect.php');
require_once('../include/view.php');
//print_r($_POST);
//exit;
@$submit=$_POST['submit'];
@$email = escape($_POST['email']);
@$password = escape($_POST['password']);
$exist ="";
$wrongpass="";
/*if(isset($_POST['submit'])){*/
	if((isset($email)) && (isset($password)))
	{
		if($email&&$password)
		{	
			$query = mysql_query("SELECT * FROM user_admin WHERE usr_code='$email'");
			@$numrows = mysql_num_rows($query);
			//echo $numrows;
		
			if($numrows!=0)
			{
				while($row = mysql_fetch_assoc($query))
				{
						$dbemail = $row['usr_code'];
						$dbpassword = $row['password'];
						$userid = $row['userid'];
						$role = $row['role'];
				}
					
				if($email==$dbemail && md5($password)==$dbpassword)
				{
					$_SESSION['com_cbs_aaiam_school_maruf_user_email'] = $email;
					$_SESSION['com_cbs_aaiam_lschool_maruf_loggedin_user_id'] = $userid;
					$_SESSION['com_cbs_aaiam_school_maruf_loggedin_user_role'] = $role;
					$_SESSION['com_cbs_aaiam_school_maruf_user_email_session_id']=session_id();
					$year = time() + 31536000;
					if(isset($_POST['remember'])) {
						setcookie('com_cbs_aaiam_school_maruf_user_email_remember_me', $_POST['email'], $year);
					}
					elseif(!isset($_POST['remember'])) {
						if(isset($_COOKIE['com_cbs_aaiam_school_maruf_user_email_remember_me'])) {
							$past = time() - 100;
							setcookie('com_cbs_aaiam_school_maruf_user_email_remember_me','gone', $past);
						}
					}

				?>	
					<script type="text/javascript">
						window.location.href = ("<?php echo urlroute('home'); ?>");				
					</script>
					
				<?php
                
                }
				else
				{
					
				?>
                    <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert"></button>
                        <strong>Error:</strong> Invalid Credentials!
                    </div>  
				<?php	
					//@$wrongpass = "Incorrect password!";
					//echo '<font color="red">'.$wrongpass.'</font>';
				}
			}
			else
			{
			?>
                <div class="alert alert-danger">
                        <button class="close" data-dismiss="alert"></button>
                        <strong>Error:</strong> Invalid Credentials!
                    </div> 
            <?php
			}
		}
	}
/*}*/

?>