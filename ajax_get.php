 <?php 
require_once('include/connect.php'); 

if(isset($_GET['id']) && isset($_GET['tbl'])){
	if($_GET['tbl'] == 'tbl_section'){ 
		$classId = $_GET['id'];
		
		$sql = "SELECT * FROM `tbl_section` WHERE `class_id` = '$classId'";
		$rw = mysql_query($sql);
		$count = mysql_num_rows($rw);
		if($count==0){
			$selectName  = array('selectName' => -1);
		}else{
			while($row = mysql_fetch_array($rw)){
				$selectName[$row['section_id']] = $row['section_name'];
			}
		}	
		echo json_encode($selectName);
	}


}

if(isset($_GET['class_id']) && isset($_GET['tbl'])){
	if($_GET['tbl'] == 'tbl_subject'){ 
		$classId = $_GET['class_id'];
		
		$sql = "SELECT * FROM `tbl_subject` WHERE `class_id` = '$classId'";
		$rw = mysql_query($sql);
		$count = mysql_num_rows($rw);
		if($count==0){
			$selectName  = array('selectName' => -1);
		}else{
			while($row = mysql_fetch_array($rw)){
				$selectName[$row['subject_id']] = $row['subject_name'];
			}
		}	
		echo json_encode($selectName);
	}


}

if(isset($_GET['id']) && isset($_GET['cl_id']) && isset($_GET['tbl'])){
	if($_GET['tbl'] == 'tbl_shift'){ 
		$classId = $_GET['cl_id'];
		$sectionId = $_GET['id'];
		
		$sql = "SELECT * FROM `tbl_shift` WHERE `class_id` = '$classId' AND `section_id` = '$sectionId'";
		$rw = mysql_query($sql);
		$count = mysql_num_rows($rw);
		if($count==0){
			$selectName  = array('selectName' => -1);
		}else{
			while($row = mysql_fetch_array($rw)){
				$selectName[$row['shift_id']] = $row['shift_name'];
			}
		}	
		echo json_encode($selectName);
	}


}

if(isset($_GET['id']) && isset($_GET['cl_id']) && isset($_GET['sec_id']) && isset($_GET['tbl'])){
	if($_GET['tbl'] == 'tbl_group_assign'){ 
		$classId = $_GET['cl_id'];
		$sectionId = $_GET['sec_id'];
		$shiftId = $_GET['id'];
		
		$sql = "SELECT * FROM `tbl_group_assign` WHERE `class_name` = '$classId' AND `section_name` = '$sectionId' AND `shift_name` = '$shiftId'";
		$rw = mysql_query($sql);
		$count = mysql_num_rows($rw);
		if($count==0){
			$selectName  = array('selectName' => -1);
		}else{
			while($row = mysql_fetch_array($rw)){
				$selectName[$row['group_id']] = $row['group_name'];
			}
		}	
		echo json_encode($selectName);
	}


}



if(isset($_GET['id']) && isset($_GET['cl_id']) && isset($_GET['sec_id']) && isset($_GET['shift_id']) && isset($_GET['tbl'])){ 
	if($_GET['tbl'] == 'tbl_student_info'){
		$group_id = $_GET['id'];
		$class_id = $_GET['cl_id'];
		$section_id = $_GET['sec_id'];
		$shift_id = $_GET['shift_id'];
	
		$sql = "SELECT * FROM `tbl_student_info` WHERE `student_class` = '$class_id' AND `student_section` = '$section_id' AND `student_group` = '$group_id' AND `student_shift` = '$shift_id' ORDER BY student_class_roll ASC";
		$rw = mysql_query($sql);
		$count = mysql_num_rows($rw);
		if($count==0){
			$selectName  = array('selectName' => -1);
		}else{
			while($row = mysql_fetch_array($rw)){
				$selectName[$row['student_id']] = $row['student_name'].'&nbsp;&nbsp;'.'('.$row['student_class_roll'].')';
			}
		}	
		echo json_encode($selectName);
	}
	

}

if(isset($_GET['teacher_id'])){ 
	if($_GET['tbl'] == 'tbl_teacher_salary'){
		$teacher_id = $_GET['teacher_id'];

	
		$sql = "SELECT `total` FROM `tbl_teacher_salary` WHERE `teacher_id` = '$teacher_id'";
		$rw = mysql_query($sql);
		$count = mysql_num_rows($rw);
		if($count==0){
			$selectName  = array('selectName' => -1);
		}else{
			while($row = mysql_fetch_array($rw)){
				$selectName[$row['total']] = $row['total'];
			}
		}	
		echo json_encode($selectName);
	}
	

}

if(@$_REQUEST['id'] && @$_REQUEST['set'] == '1')
	{
		//echo "UPDATE `product` SET `product_isPublish`='1' WHERE `product_id` = '".$_REQUEST['id']."'";
		mysql_query("UPDATE `tbl_term_sector` SET `isActive`='0' WHERE `term_sector_id` = '".$_REQUEST['id']."'");
		
		$sql_approved = mysql_query("SELECT * FROM tbl_term_sector where term_sector_id = '".$_REQUEST['id']."'");
		$rs_approved = mysql_fetch_array($sql_approved); 
		$product_isPublish = $rs_approved['isActive'];
		echo $product_isPublish;
	}
	
	if(@$_REQUEST['id'] && @$_REQUEST['set'] == '0')
	{
		
		mysql_query("UPDATE `tbl_term_sector` SET `isActive`='1' WHERE `term_sector_id` = '".$_REQUEST['id']."'");
		
		$sql_approved = mysql_query("SELECT * FROM tbl_term_sector where term_sector_id = '".$_REQUEST['id']."'");
		$rs_approved = mysql_fetch_array($sql_approved); 
		$product_isPublish = $rs_approved['isActive'];
		echo $product_isPublish;
	}


if(isset($_GET['id']) && isset($_GET['tbl'])){
	if($_GET['tbl'] == 'tbl_term_sector'){ 
		$term_id = $_GET['id'];
		
		$sql = "SELECT * FROM `tbl_term_sector` WHERE `term_id` = '$term_id'";
		$rw = mysql_query($sql);
		$count = mysql_num_rows($rw);
		if($count==0){
			$selectName  = array('selectName' => -1);
		}else{
			while($row = mysql_fetch_array($rw)){
				$selectName[$row['term_sector_id']] = $row['sector_name'];
			}
		}	
		echo json_encode($selectName);
	}


}




?>