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
$group_name = escape(isset($_POST['group_name'])) ?  $_POST['group_name'] : '';

$exam_year = escape(isset($_POST['exam_year'])) ?  $_POST['exam_year'] : '';
$term_name = escape(isset($_POST['term_name'])) ?  $_POST['term_name'] : '';
$student_name = escape(isset($_POST['student_name'])) ?  $_POST['student_name'] : '';

//print_r($_POST);
//exit();

if($temp == "Add"){?>
 <script>

   window.open('req_student_marksheet.php?class_name=<?php echo $class_name;?>&section_name=<?php echo $section_name;?>&shift_name=<?php echo $shift_name;?>&group_name=<?php echo $group_name;?>&exam_year=<?php echo $exam_year;?>&term_name=<?php echo $term_name;?>&student_name=<?php echo $student_name;?>');

 </script>

<?php } ?>