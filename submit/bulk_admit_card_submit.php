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
$class_name = escape(isset($_POST['class_name'])) ?  $_POST['class_name'] : '';
$section_name = escape(isset($_POST['section_name'])) ?  $_POST['section_name'] : '';
$shift_name = escape(isset($_POST['shift_name'])) ?  $_POST['shift_name'] : '';
$term_name = escape(isset($_POST['term_name'])) ?  $_POST['term_name'] : '';
$exam_name = escape(isset($_POST['exam_name'])) ?  $_POST['exam_name'] : '';

//print_r($_POST);
//exit();

if($temp == "Add"){?>
 <script>

   window.open('req_admitcard.php?class_name=<?php echo $class_name;?>&section_name=<?php echo $section_name;?>&shift_name=<?php echo $shift_name;?>&term_name=<?php echo $term_name;?>&exam_name=<?php echo $exam_name;?>');

 </script>

<?php } ?>