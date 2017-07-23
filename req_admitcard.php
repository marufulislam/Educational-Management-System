<?php
require_once('include/connect.php');
require_once('include/functions.php');

$class_name = $_GET['class_name'];
$section_name = $_GET['section_name'];
$shift_name = $_GET['shift_name'];
$term_name = $_GET['term_name'];
$exam_name = $_GET['exam_name'];

/*school information start*/
$qry_school=mysql_query("SELECT * FROM req_company") or die(mysql_error());
$rw_school=mysql_fetch_array($qry_school);

/*student information start*/
$qry_student=mysql_query("SELECT * FROM tbl_student_info WHERE `student_class`='".$class_name."' AND `student_section`='".$section_name."' AND `student_shift`='".$shift_name."'") or die(mysql_error());

/*student information start*/
$qry_cls = mysql_query("SELECT * FROM tbl_class WHERE class_id='".$class_name."'") or die(mysql_error());
$rw_cls = mysql_fetch_array($qry_cls);
 $rw_cls['class_name'];
 
/*student section start*/ 
$qry_sec = mysql_query("SELECT `section_name` FROM tbl_section WHERE section_id='".$section_name."'") or die(mysql_error());
$rw_sec = mysql_fetch_array($qry_sec);
$rw_sec['section_name'];

/*student Shift start*/ 		
$qry_sft = mysql_query("SELECT `shift_name` FROM tbl_shift WHERE shift_id='".$shift_name."'") or die(mysql_error());
$rw_sft = mysql_fetch_array($qry_sft);
$rw_sft['shift_name'];


/*Term find start*/
$qry_term=mysql_query("SELECT term_name FROM tbl_term WHERE term_id='".$term_name."'") or die(mysql_error());
$rw_term=mysql_fetch_array($qry_term);
/*Exam find start*/
$qry_exam=mysql_query("SELECT sector_name FROM tbl_term_sector WHERE term_sector_id='".$exam_name."'") or die(mysql_error());
$rw_exam=mysql_fetch_array($qry_exam);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">

        <div class="row">
        	<?php
             	while($row_student = mysql_fetch_array($qry_student)){
			?>
            <div class="col-xs-6" style="border: #f5f5f5 2px;border-style: solid;"><br>
	            <table width="100%">
	            	<td align="left"><img src="../images/<?php echo $rw_school['sLogo'];?>" height="64" width="64" />
                    </td>
	            	<td align="right"><?php echo $rw_school['tComapanyName'];?></td>
	            </table>

	            <table width="100%">
	            	<td align="left"></td>
	            	<td align="center"><b>Admit Card</b><br><?php echo $rw_term['term_name'];?><br><?php echo $rw_exam['sector_name'];?></td>
	            	<td align="right"><img src="../images/student/thumbs/small<?php echo $row_student["student_image"];?>" height="64" width="64"></td>
	            </table>

	            <table width="100%">

	            	<td align="left">Name : <?php echo $row_student["student_name"];?><br>Class : <?php echo $rw_cls['class_name'];?><br>Roll : <?php echo $row_student["student_class_roll"];?> <br>Section : <?php echo $rw_sec['section_name'];?></td>
	            	<td align="right">Shift : <?php echo $rw_sft['shift_name'];?><br>Session : <?php echo date("Y"); ?><br>
                    <?php 
						$qry_grp = mysql_query("SELECT `group_name` FROM tbl_group WHERE group_id='".$row_student["student_group"]."'") or die(mysql_error());
						$rw_grp = mysql_fetch_array($qry_grp);
						echo "Group :".$rw_grp['group_name'];
					?>			
                    </td>
	            </table><br>
            </div>
            
            <?php }?>
        </div>
             
    </div>
</body>
</html>

<style type="text/css">
	@media print {
   .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
        float: left;
   }
   .col-sm-12 {
        width: 100%;
   }
   .col-sm-11 {
        width: 91.66666667%;
   }
   .col-sm-10 {
        width: 83.33333333%;
   }
   .col-sm-9 {
        width: 75%;
   }
   .col-sm-8 {
        width: 66.66666667%;
   }
   .col-sm-7 {
        width: 58.33333333%;
   }
   .col-sm-6 {
        width: 50%;
   }
   .col-sm-5 {
        width: 41.66666667%;
   }
   .col-sm-4 {
        width: 33.33333333%;
   }
   .col-sm-3 {
        width: 25%;
   }
   .col-sm-2 {
        width: 16.66666667%;
   }
   .col-sm-1 {
        width: 8.33333333%;
   }
}
</style>
