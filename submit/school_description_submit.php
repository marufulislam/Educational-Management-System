<?php
require_once('../include/connect.php');
require_once('../include/view.php');


if(isset($_REQUEST['temp']) == false){
	$temp = "";
}
else if(isset($_REQUEST['temp']) == true){
	$temp = $_REQUEST['temp'];
}	

$page_link = escape(isset($_POST['page_link'])) ?  $_POST['page_link'] : '';	
$company_name = escape(isset($_POST['tComapanyName'])) ?  $_POST['tComapanyName'] : '';
$company_slogan = escape(isset($_POST['slogan'])) ?  $_POST['slogan'] : '';
$call_us = escape(isset($_POST['call_us'])) ?  $_POST['call_us'] : '';	
$website = escape(isset($_POST['website'])) ?  $_POST['website'] : '';
$photo = escape(isset($_POST['photo'])) ?  $_POST['photo'] : '';
$email = escape(isset($_POST['email'])) ?  $_POST['email'] : '';
$address = escape(isset($_POST['address'])) ?  $_POST['address'] : '';

$company_domain = escape(isset($_POST['domain'])) ?  $_POST['domain'] : '';
$paypal = escape(isset($_POST['paypal'])) ?  $_POST['paypal'] : '';	

$toll_free = escape(isset($_POST['toll_free'])) ?  $_POST['toll_free'] : '';
$local = escape(isset($_POST['local'])) ?  $_POST['local'] : '';
$fax = escape(isset($_POST['fax'])) ?  $_POST['fax'] : '';
$general_info = escape(isset($_POST['general_info'])) ?  $_POST['general_info'] : '';



$google_link = escape(isset($_POST['google_link'])) ?  $_POST['google_link'] : '';
$fb_link = escape(isset($_POST['fb_link'])) ?  $_POST['fb_link'] : '';
$twitter_link = escape(isset($_POST['twitter_link'])) ?  $_POST['twitter_link'] : '';
$linkedIn_link = escape(isset($_POST['linkedIn_link'])) ?  $_POST['linkedIn_link'] : '';

$pinterest_link = escape(isset($_POST['pinterest_link'])) ?  $_POST['pinterest_link'] : '';

$user_id = escape(isset($_POST['user_id'])) ?  $_POST['user_id'] : '';


// Create uploads directory if necessary
if(!file_exists('../../images')) mkdir('../../mol');
if(!file_exists('../../images')) mkdir('../../mol/company');
if(!file_exists('../../images/thumbs')) mkdir('../../mol/company/thumbs');

$output_dir = "../../images/".$photo;
$output_dir_thumbs = "../../images/thumbs/small".$photo;

$img = 'temp/thumbs/'.$photo;
$img_thumbs = 'temp/thumbs/small'.$photo;

if($temp == "Add"){
	
	$qry_having = mysql_query("SELECT * FROM `req_company` WHERE tComapanyName='".$company_name."'");
	if(mysql_num_rows($qry_having) == 0){
	
	
	$sql = "INSERT INTO `req_company`(`school_id`, `tComapanyName`, `slogan`, `call_us`, `website`, `sLogo`,`email`, `address`,`domain`,`paypal`, `toll_free`, `local`, `fax` ,`general_info`, `google_link`, `fb_link`,`twitter_link`,`linkedIn_link`,`pinterest_link`,`date`) VALUES ('".escape($user_id)."','".escape($company_name)."','".escape($company_slogan)."','".$call_us."', '".escape($website)."','".$photo."', '".escape($email)."', '".escape($address)."','".escape($company_domain)."', '".escape($paypal)."','".escape($toll_free)."','".escape($local)."','".escape($fax)."','".escape($general_info)."','".escape($google_link)."','".escape($fb_link)."','".escape($twitter_link)."','".escape($linkedIn_link)."','".escape($pinterest_link)."','".date('Y-m-d')."' )";
		
		
		$qry = mysql_query($sql) or die('Error in insertion : ' . mysql_error());
		
		if ($qry){
			//if($photo != ''){

				rename($img, $output_dir);
				rename($img_thumbs, $output_dir_thumbs);
			//}
		?>	
            <div class="alert alert-success">
                <button class="close" data-dismiss="alert"></button> Information added successfully.
            </div>
            <script>
                jQuery(".form_success").hide();
                jQuery(".form-group").slideUp();
                setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 3000);	
            </script>
    	<?php 	
		}else{
		?>	
            <div class="alert alert-danger">
                <button class="close" data-dismiss="alert"></button> Error Occured, Please try again.
            </div>
            <script>
                jQuery("#idsubmitData").show();
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
			jQuery("#idsubmitData").show();
			jQuery(".form_success").hide();		
		</script>
    <?php  
	}
	
}

if($temp == "Update"){
	

	
	$Editid = $_REQUEST['Editid'];
	$qry_company_name = mysql_query("SELECT * FROM `req_company` WHERE iCompanyId='".$Editid."'") or die ("Error in company name selection : ".mysql_error());
	$rs_company_name = mysql_fetch_array($qry_company_name); 
	$db_company_name  = $rs_company_name['tComapanyName'];

	
	if($db_company_name != $company_name ){
		$qry_having = mysql_query("SELECT * FROM `req_company` WHERE tComapanyName ='".$company_name ."'");
		if(mysql_num_rows($qry_having) == 0){	

			
			if($photo == ''){
				$sql_update="UPDATE req_company SET tComapanyName='".escape($company_name)."',slogan='".$company_slogan."',call_us='".escape($call_us)."',website='".escape($website)."',email='".escape($email)."',address='".escape($address)."',domain='".escape($company_domain)."'	,paypal='".escape($paypal)."',toll_free='".escape($toll_free)."',local='".escape($local)."',fax='".escape($fax)."',general_info='".$general_info."',google_link='".escape($google_link)."',fb_link='".escape($fb_link)."',twitter_link='".escape($twitter_link)."',linkedIn_link='".escape($linkedIn_link)."',pinterest_link='".escape($pinterest_link)."',date='".date('Y-m-d')."' WHERE iCompanyId='".$Editid."'";
			}
			
			
			else{
					$sql_update="UPDATE req_company SET tComapanyName='".escape($company_name)."',slogan='".$company_slogan."',call_us='".escape($call_us)."',website='".escape($website)."',sLogo='".$photo."',email='".escape($email)."',address='".escape($address)."',domain='".escape($company_domain)."'	,paypal='".escape($paypal)."',toll_free='".escape($toll_free)."',local='".escape($local)."',fax='".escape($fax)."',general_info='".$general_info."',google_link='".escape($google_link)."',fb_link='".escape($fb_link)."',twitter_link='".escape($twitter_link)."',linkedIn_link='".escape($linkedIn_link)."',pinterest_link='".escape($pinterest_link)."',date='".date('Y-m-d')."' WHERE iCompanyId='".$Editid."'";	
					
					
					
				rename($img, $output_dir);
				rename($img_thumbs, $output_dir_thumbs);
				
				$db_photo = $rs_company_name['sLogo'];
				$path1 = '../../images'.$db_photo;
				$path2 = '../../images/thumbs/small'.$db_photo;
				if(file_exists($path1) == true && $db_photo != "") unlink($path1);
				if(file_exists($path2) == true && $db_photo != "") unlink($path2);	
			}
			
			
			$rs_update=mysql_query($sql_update) or die ("Error in update : ".mysql_error());
			if($rs_update){
			?>
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert"></button> Information updated successfully.
				</div>
				<script>
					jQuery(".form_success").hide();
					jQuery(".form-group").slideUp();
					setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 3000);	
				</script> 
			<?php
			}else{
			?>
				<div class="alert alert-danger">
					<button class="close" data-dismiss="alert"></button> Update failed with an error.
				</div>
				<script>
					jQuery(".form_success").hide();
					jQuery("#idsubmitData").show();
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
			jQuery("#idsubmitData").show();
			jQuery(".form_success").hide();		
		</script>
    <?php  
		}
	}else{

		if($photo == ''){
				$sql_update="UPDATE req_company SET tComapanyName='".escape($company_name)."',slogan='".$company_slogan."',call_us='".escape($call_us)."',website='".escape($website)."',email='".escape($email)."',address='".escape($address)."',domain='".escape($company_domain)."'	,paypal='".escape($paypal)."',toll_free='".escape($toll_free)."',local='".escape($local)."',fax='".escape($fax)."',general_info='".$general_info."',google_link='".escape($google_link)."',fb_link='".escape($fb_link)."',twitter_link='".escape($twitter_link)."',linkedIn_link='".escape($linkedIn_link)."',pinterest_link='".escape($pinterest_link)."',date='".date('Y-m-d')."' WHERE iCompanyId='".$Editid."'";
				
			}
			else{
					$sql_update="UPDATE req_company SET tComapanyName='".escape($company_name)."',slogan='".$company_slogan."',call_us='".escape($call_us)."',website='".escape($website)."',sLogo='".$photo."',email='".escape($email)."',address='".escape($address)."',domain='".escape($company_domain)."'	,paypal='".escape($paypal)."',toll_free='".escape($toll_free)."',local='".escape($local)."',fax='".escape($fax)."',general_info='".$general_info."',google_link='".escape($google_link)."',fb_link='".escape($fb_link)."',twitter_link='".escape($twitter_link)."',linkedIn_link='".escape($linkedIn_link)."',pinterest_link='".escape($pinterest_link)."',date='".date('Y-m-d')."' WHERE iCompanyId='".$Editid."'";	
					
					
				rename($img, $output_dir);
				rename($img_thumbs, $output_dir_thumbs);
				
				$db_photo = $rs_company_name['sLogo'];
				$path1 = '../../images'.$db_photo;
				$path2 = '../../images/thumbs/small'.$db_photo;
				if(file_exists($path1) == true && $db_photo != "") unlink($path1);
				if(file_exists($path2) == true && $db_photo != "") unlink($path2);	

			}
			
		$rs_update=mysql_query($sql_update) or die ("Error in update : ".mysql_error());
		if($rs_update){
			
			
			
		?>
			<div class="alert alert-success">
				<button class="close" data-dismiss="alert"></button> Information updated successfully.
			</div>
			<script>
				jQuery(".form_success").hide();
				jQuery(".form-group").slideUp();
				setTimeout(function(){ window.location = '<?php echo urlroute($page_link);?>'; }, 3000);	
			</script> 
		<?php
		}else{
		?>
			<div class="alert alert-danger">
				<button class="close" data-dismiss="alert"></button> Update failed with an error.
			</div>
			<script>
				jQuery(".form_success").hide();
				jQuery("#idsubmitData").show();
			</script> 
		<?php	
		}
		
	}
			
}
?>


