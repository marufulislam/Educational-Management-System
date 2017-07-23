<?php 

function urlroute($url){
	global $htaccess;
	if(!$htaccess){
		$url = 'index.php?view='.$url;
	}
	return $url;
}


function escape($input){
	if (get_magic_quotes_gpc()) {
		@$input = stripslashes($input);
	}
	return mysql_real_escape_string($input);
}

function dateConvert($date){
	$req_date = explode("/",$date);
	return @$dt = "$req_date[2]-$req_date[1]-$req_date[0]";
}

function numFormat($num){
	return number_format((float)$num,'2','.','');
}


function name($email){
	$sql = "SELECT username FROM user_admin WHERE usr_code = '$email'";
	$qry = mysql_query($sql) or die ("Error in name selection at header".mysql_error());
	$rs = mysql_fetch_array($qry);
	return $rs['username'];
}

function company_info($variable){
$sql = mysql_query("SELECT ".$variable." FROM req_company ORDER BY iCompanyId DESC Limit 0,1") or die(mysql_error());
if(mysql_num_rows($sql) > 0){
$row = mysql_fetch_array($sql);
$val = $row[$variable];
}else{
$val = 'Error Occured!!!';
}
return $val;
}
function usd_bdt()
{
    $q = "SELECT * FROM `currency_format` ORDER BY currency_id DESC LIMIT 0,1";

    $result = mysql_query($q) or die("Error in  selection".mysql_error());
    
    $rs = mysql_fetch_array($result);
	return $rs['currency_name'];
    
}
function generate_table($tbl_option){
	$explode = explode(',',$tbl_option);
	
	$sql_user_admin = "SELECT * FROM user_admin";
    $qry_user_admin = mysql_query($sql_user_admin);
    while($rowc = mysql_fetch_array($qry_user_admin)){
		
	}
	
}

function getExtension($str) {
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	$l = strlen($str) - $i;
	$ext = substr($str, $i+1, $l);
	return $ext;
}



function random_num($n){
	//$uniqid = uniqid(php_uname($_SESSION['com_cbs_aaiam_school_maruf_user_email_session_id']), true);
	return substr(number_format(time() * rand(),0,'',''),0,$n);
	//return substr(base_convert(md5($uniqid), 16, 10) , $n);
}


function resize($path,$uf,$width,$height,$userfile_size,$userfile_type,$prefix,$img_width){
	/*--------resize image-----------*/
	
	$ext = getExtension($uf);
	
	$size = $img_width; // the imagewidth
	$filedir = 'temp/'; // the directory for the original image
	$thumbdir = 'temp/thumbs/'; // the directory for the resized image

	$userfile_name =str_replace(" ", "",$uf);
	$userfile_tmp = str_replace(" ", "",$uf);
	
	$prod_img = $filedir.$userfile_name;
    $prod_img_thumb = $thumbdir.$prefix.$userfile_name;

	$sizes = getimagesize($prod_img);
    $aspect_ratio = $sizes[1]/$sizes[0];
	
	if ($sizes[1] <= $size){
		$new_width = $sizes[0];
		$new_height = $sizes[1];
	}else{
		$new_height = $size;
		$new_width = abs($new_height/$aspect_ratio);
	}
	$destimg=ImageCreateTrueColor($new_width,$new_height)or die('Problem In Creating image');
	
	switch($ext){
		case "jpg":
		case "jpeg":
		case "JPG":
		case "JPEG":
			$srcimg=ImageCreateFromJPEG($prod_img)or die('Problem In opening Source Image');
			break;
		case "PNG":
		case "png":
			$srcimg = imageCreateFromPng($prod_img)or die('Problem In opening Source Image');
			imagealphablending($destimg, false);
			$colorTransparent = imagecolorallocatealpha($destimg, 0, 0, 0, 0x7fff0000);
			imagefill($destimg, 0, 0, $colorTransparent);
			imagesavealpha($destimg, true);
			break;
		case "BMP":
		case "bmp":
			$srcimg = imageCreateFromBmp($prod_img)or die('Problem In opening Source Image');
			break;
		case "GIF":
		case "gif":
			$srcimg = imageCreateFromGif($prod_img)or die('Problem In opening Source Image');
			break;
		default:
			$srcimg=ImageCreateFromJPEG($prod_img)or die('Problem In opening Source Image');
	}
	
	if(function_exists('imagecopyresampled')){
		imagecopyresampled($destimg,$srcimg,0,0,0,0,$new_width,$new_height,imagesX($srcimg),imagesY($srcimg))or die('Problem In resizing');
	}else{
		Imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,imagesX($srcimg),imagesY($srcimg))or die('Problem In resizing');
	}
	
	 // Saving an image
	switch(strtolower($ext)){
		case "jpg":
		case "jpeg":
			ImageJPEG($destimg,$prod_img_thumb,90) or die('Problem In saving');
			break;
		case "png":
			imagepng($destimg,$prod_img_thumb) or die('Problem In saving');
			break;
		case "bmp":
			imagewbmp($destimg, $prod_img_thumb)or die('Problem In saving');
			break;
		case "gif":
			imagegif($destimg,$prod_img_thumb) or die('Problem In saving');
			break;
		default:
			// if image format is unknown, and you whant save it as jpeg, maybe you should change file extension
			imagejpeg($destimg,$prod_img_thumb,90) or die('Problem In saving');
	}
	
}


function resizeProjects($path,$uf,$width,$height,$userfile_size,$userfile_type,$prefix,$img_width){
	/*--------resize image-----------*/
	
	$ext = getExtension($uf);
	
	$size = $img_width; // the imagewidth
	$filedir = 'submit/temp/'; // the directory for the original image
	$thumbdir = 'submit/temp/thumbs/'; // the directory for the resized image

	$userfile_name =str_replace(" ", "",$uf);
	$userfile_tmp = str_replace(" ", "",$uf);
	
	$prod_img = $filedir.$userfile_name;
    $prod_img_thumb = $thumbdir.$prefix.$userfile_name;

	$sizes = getimagesize($prod_img);
    $aspect_ratio = $sizes[1]/$sizes[0];
	
	if ($sizes[1] <= $size){
		$new_width = $sizes[0];
		$new_height = $sizes[1];
	}else{
		$new_height = $size;
		$new_width = abs($new_height/$aspect_ratio);
	}
	$destimg=ImageCreateTrueColor($new_width,$new_height)or die('Problem In Creating image');
	
	switch($ext){
		case "jpg":
		case "jpeg":
		case "JPG":
		case "JPEG":
			$srcimg=ImageCreateFromJPEG($prod_img)or die('Problem In opening Source Image');
			break;
		case "PNG":
		case "png":
			$srcimg = imageCreateFromPng($prod_img)or die('Problem In opening Source Image');
			imagealphablending($destimg, false);
			$colorTransparent = imagecolorallocatealpha($destimg, 0, 0, 0, 0x7fff0000);
			imagefill($destimg, 0, 0, $colorTransparent);
			imagesavealpha($destimg, true);
			break;
		case "BMP":
		case "bmp":
			$srcimg = imageCreateFromBmp($prod_img)or die('Problem In opening Source Image');
			break;
		case "GIF":
		case "gif":
			$srcimg = imageCreateFromGif($prod_img)or die('Problem In opening Source Image');
			break;
		default:
			$srcimg=ImageCreateFromJPEG($prod_img)or die('Problem In opening Source Image');
	}
	
	if(function_exists('imagecopyresampled')){
		imagecopyresampled($destimg,$srcimg,0,0,0,0,$new_width,$new_height,imagesX($srcimg),imagesY($srcimg))or die('Problem In resizing');
	}else{
		Imagecopyresized($destimg,$srcimg,0,0,0,0,$new_width,$new_height,imagesX($srcimg),imagesY($srcimg))or die('Problem In resizing');
	}
	
	 // Saving an image
	switch(strtolower($ext)){
		case "jpg":
		case "jpeg":
			ImageJPEG($destimg,$prod_img_thumb,90) or die('Problem In saving');
			break;
		case "png":
			imagepng($destimg,$prod_img_thumb) or die('Problem In saving');
			break;
		case "bmp":
			imagewbmp($destimg, $prod_img_thumb)or die('Problem In saving');
			break;
		case "gif":
			imagegif($destimg,$prod_img_thumb) or die('Problem In saving');
			break;
		default:
			// if image format is unknown, and you whant save it as jpeg, maybe you should change file extension
			imagejpeg($destimg,$prod_img_thumb,90) or die('Problem In saving');
	}
	
}

function isToken($token)
{
    if (isset($token) && $token) {
        //verification values in BD
        $query = "SELECT userid FROM user_admin WHERE uniqueToken='".escape($token)."'";
        $sql = mysql_query($query) or die('Error in token selection--> '.mysql_error());
        if (mysql_num_rows($sql) > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function generateUniqueToken($number)
{
    $arr = array('a', 'b', 'c', 'd', 'e', 'f',
                 'g', 'h', 'i', 'j', 'k', 'l',
                 'm', 'n', 'o', 'p', 'r', 's',
                 't', 'u', 'v', 'x', 'y', 'z',
                 'A', 'B', 'C', 'D', 'E', 'F',
                 'G', 'H', 'I', 'J', 'K', 'L',
                 'M', 'N', 'O', 'P', 'R', 'S',
                 'T', 'U', 'V', 'X', 'Y', 'Z',
                 '1', '2', '3', '4', '5', '6',
                 '7', '8', '9', '0');
    $token = "";
    for ($i = 0; $i < $number; $i++) {
        $index = rand(0, count($arr) - 1);
        $token .= $arr[$index];
    }

    if (isToken($token)) {
        return generateUniqueToken($number);
    } else {
        return $token;
    }
}

function tbl_data_conditional($data,$pk,$col,$tbl){
	$sql = "SELECT $col FROM `$tbl` WHERE $pk='".$data."'";
	$qry = mysql_query($sql) or die ("Error in $col selection at $tbl --> ".mysql_error());
	$rs = mysql_fetch_array($qry);
	return $rs[$col];
}

// Function to get an array of days
function getDays($month, $year){
   // Start of Month
   $start = new DateTime("{$year}-{$month}-01");
   $month = $start->format('F');

   // Prepare results array
   $results = array();

   // While same month
   while($start->format('F') == $month){
      // Add to array
      $day              = $start->format('l');
      $date             = $start->format('j');
      $results[$date]   = $day;

      // Next Day
      $start->add(new DateInterval("P1D"));
   }

   // Return results
   return $results;
}
?>