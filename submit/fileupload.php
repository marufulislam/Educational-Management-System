<?php
require_once('../include/connect.php');
require_once('../include/functions.php');


ini_set('upload_max_filesize', '700M');
ini_set('post_max_size', '16M');



$image = $_FILES["file"]["name"];
$uploadedfile = $_FILES['file']['tmp_name'];
$random_number = random_num(5);

if($image) 
{				
	$filename = stripslashes($_FILES['file']['name']);
	$extension = getExtension($filename);
	$extension = strtolower($extension);
	
	$uf = date('Ymdhis').$random_number."." .$extension;//File name eg. 200507119.ext
	
	
	$UploadDirectory	= 'temp/file/'; //Upload Directory, ends with slash & make sure folder exist

	if(move_uploaded_file($_FILES['file']["tmp_name"], $UploadDirectory . $uf )){
		?>
        <input type="hidden" name="upFile" id="upFile" value="<?php echo $uf;?>" />
        <?php				
		die('Success! File Uploaded.');
		
   	}else{
   		die('error uploading File!');
   	}
}


?>